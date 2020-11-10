<?php
/**
 * The MIT License (MIT)
 *
 * Copyright © 2019-2020 Muhammad Aris Ariyanto <mbetixz>, http://github.com/mbetixz
 *
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the “Software”), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge,
 * publish, distribute, sublicense, and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR
 * OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 *
 * This file is part of Zeflous Project <http://github.com/mbetixz/zeflous>
 *
 * @copyright  Zeflous Project
 * @link       http://github.com/mbetixz/zeflous
 * @author     Muhammad Aris Ariyanto <mbetixz> <http://github.com/mbetixz>
 * @version    See Version Text
 * @license    http://opensource.org/licenses/MIT MIT License
 */
namespace System\Http;

use System\{
	App,
	Config,
	Http\Router\Parser
};

class Router
{
	/** @trait System\Http\Router\Parser **/
	use Parser;

	private
	/** @var \System\Http\Request **/
	$request,
	/** @var Config router regex **/
	$router,
	/** @var Config routes **/
	$routes;

	const
	/** **/
	FOUND              = 302,
	/** **/
	UNAUTHORIZED       = 401,
	/** **/
	FORBIDDEN          = 403,
	/** **/
	NOT_FOUND          = 404,
	/** **/
	METHOD_NOT_ALLOWED = 405;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->request = Request::fromGlobals();
		App::set(System\Request::class, $this->request);
		$this->router  = App::get(Config::class)->load('router');
		$routes  = static function($self)
		{
			/** search cache if exists **/
			$cache_file = APP_CACHE_PATH . 'configs' . DS . 'routes.cache.php';
			if (
				(file_exists($cache_file)) &&
				(config('cache.routes.enable') != false) &&
				(filemtime($cache_file) + config('cache.routes.time')) > time()
			) {
				$routes = App::get(Config::class)->tools->IncludeFile($cache_file);
			} else
			{
				/** load all routes.config.php from modules directory **/
				$routes = App::get(Config::class)->tools->LoadConfigFromDir('routes');
				/** format confugurations **/
				$routes = $self->parseRoutes($routes);
				/** if we allow to create cache file **/
				if (config('cache.routes.enable'))
				{
					App::get(Config::class)->cache->create([
						"name" => "routes", /** target cache filename **/
						"path" => APP_CACHE_PATH . 'configs', /** target path **/
						"vars" => $routes, /** configurations **/
						"time" => config("cache.routes.time"), /** max cache time **/
						"beautyfier" => config("cache.beautyfier"), /** enable beautyfier **/
					]);
				}
			}	return $routes;
		};	$this->routes = $routes($this);
	}

	/**
	 * get matching routes from given request uri
	 *
	 * @return array
	 */
	public function route()
	{
		/** current request uri based on server path info **/
		$uri = $this->request->getServer('PATH_INFO');
		$uri = empty($uri) ? "/" : $uri;
		/** initialize data **/
		$data = [];
		/** default result **/
		$result = [self::NOT_FOUND, null];
		foreach($this->routes as $key => $param)
		{
			/** matching given request uri **/
			if (preg_match("#^/?{$key}/?$#", $uri, $match))
			{
				/** request arguments **/
				$args = array_slice($match, 1);
				/** validate request method **/
				if ($this->checkRequestMethod($param['method']))
				{
					/** check controller class if exists **/
					if ($controller = $this->checkController($param['controller']['class']))
					{
						/** check controller class method **/
						if (method_exists($controller, $param['controller']['method']))
						{
							/** check if controller method is callable **/
							if ($class = $this->checkAccessMethod([$controller, $param['controller']['method']], $param['module']))
							{
								$result = [self::FOUND, [[$class, $param['controller']['method']], $args]];
							} else
								$result = [self::FORBIDDEN, null];
						} else
							$result = [self::NOT_FOUND, null];
					} else
						$result = [self::NOT_FOUND, null];
				} else
					$result = [self::METHOD_NOT_ALLOWED, null];
			}
		};
		/** freeze **/
		$this->request = null;
		$this->router  = null;
		$this->routes  = null;
		unset($data);
		return $result;
	}

	/**
	 * Valudate request method
	 *
	 * @param array {$method}
	 *
	 * @return bool
	 */
	private function checkRequestMethod(array $method): bool
	{
		return in_array(
			$this->request->getMethod(),
			$method
		);
	}

	/**
	 * Check controller class if exists
	 *
	 * @param string {$controller}
	 *
	 * @return string|null
	 */
	private function checkController(string $controller):? string
	{
		if (class_exists($controller))
			return $controller;
		else
			return null;
	}

	/**
	 * Validate controller class method, must callable
	 *
	 * @param array {$param}
	 * @param string {$module}
	 *
	 * @return object|null
	 */
	private function checkAccessMethod(array $param, string $module)
	{
		/** create reflectioj method **/
		$ref = new \ReflectionMethod($param[0], $param[1]);
		if (!(
			$ref->isPrivate()     ||
			$ref->isAbstract()    ||
			$ref->isProtected()   ||
			$ref->isDestructor()  ||
			$ref->isConstructor()
		)) {
			/** register autoload **/
			App::register($module);
			return App::get($param[0]);
		}	return null;
	}

}