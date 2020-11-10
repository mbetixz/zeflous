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
namespace System;

use Exception;
use ReflectionClass;
use System\App\AppInterface;

class App
implements AppInterface
{
	private static

	/**
	 * Current Static Container
	 *
	 * @var array
	 */
	$container = [],

	/**
	 * Queue Container events
	 *
	 * @var array
	 */
	$events    = [],

	/**
	 * Current Module
	 *
	 * @var string|null
	 */
	$current_module;

	/**
	 * Constructur
	 *
	 * @param array {$config}
	 */
	public function __construct(array $config)
	{
		foreach($config as $type => $value)
			switch($type)
			{
				case 'container':
					if (is_array($value))
					{
						foreach($value as $key => $class)
							if (is_object($class))
								self::$container[$key] = $class;
							elseif (is_string($class) && class_exists($class))
								self::$container[$key] = self::getResolve($class, $key);
							else
								_error("Warning: no object found for container key {$key}!");
					}
					break;
				case 'events':
					if (is_array($value))
					{
						foreach($value as $key => $events)
							switch($key)
							{
								case 'before.set':
								case 'before.get':
								case 'after.set':
								case 'after.get':
									if (is_array($events))
										self::$events[$key] = $events;
									break;
								default:
									_error("Warning: Invalid keyword events for {$key}!!");
									break;
							};
					}
					break;
				default;
					continue 2;
					break;
			};
	}

	/**
	 * get static container if exists or create new
	 *
	 * @param string {$class}
	 *
	 * @return object
	 */
	public static function get(string $class)
	{
		if (isset(self::$container[$class]))
			return self::$container[$class];
		elseif (class_exists($class))
			return self::getResolve($class);
		else
			return _error("Error: Object for {$class} was not found!!");
	}

	/**
	 * Set/Add static container
	 *
	 * @param string {$alias}
	 * @paeam object {$object}
	 *
	 * @return mixed
	 */
	public static function set(string $alias, object $class)
	{
		/** check if given alias key already exists**/
		if (isset(self::$container[$alias]))
			return _error("Error: Container key {$alias} already exists!!");
		elseif (isset(self::$container[get_class($class)]))
			return _error("Error: Container object for ".get_class($class)." already exists!!");
		else
			return self::$container[$alias] = $class;
	}

	/**
	 * dump current static container & events
	 *
	 * @return array
	 */
	public static function getInfo(): array
	{
		return
		[
			"container" => self::$container,
			"events"    => self::$events,
		];
	}

	/**
	 * get referer where function called from
	 *
	 * @param int {$history}
	 *
	 * @return string
	 */
	public static function getReferer(int $history = 1): string
	{
		/** get referer class by Exception **/
		$ref  = new Exception();
		/** detect where last location called this func **/
		$ref  = $ref->getTrace()[$history];
		$file = str_replace(ROOT_PATH, DS, $ref['file']);
		/** if called by func may this class does not exists **/
		$class = isset($ref['class']) ? $ref['class'] : false;
		/** function **/
		$func = isset($ref['function']) ? $ref['function'] : false;
		/** line number **/
		$line = isset($ref['line']) ? $ref['line'] : false;
		/** details **/
		$location = $file . ' -> ' . ($class ? $class . '::' : '') . ($func ? $func . '():' : '') . ($line ? $line : '');
		unset($ref, $file, $class, $func, $line);
		return $location;
	}

	/**
	 * Register current module to other class
	 *
	 * @param string {$module}
	 *
	 * @return none|string
	 */
	public static function register(string $module)
	{
		$dir = APP_MODULE_PATH . $module . DS;
		if (is_dir($dir))
		{
			self::$current_module = $module;
			/** Languages Path **/
			App::get(Languages::class)->set("ext_dir", $dir . 'components' . DS . 'locales' . DS);
			/** Template view based on config's view **/
			if (config('view.module_use_own_configs'))
				App::get(View::class)->smarty()->addConfigDir($dir . 'configs' . DS);
			if (config('view.module_use_own_views'))
				App::get(View::class)->smarty()->setTemplateDir($dir . 'components' . DS . 'templates' . DS . 'views' . DS);
				App::get(View::class)->smarty()->addTemplateDir(config('view.smarty_config.template_dir'));
			if (config('view.module_use_own_plugins'))
				App::get(View::class)->smarty()->addPluginsDir($dir . 'components' . DS . 'templates' . DS . 'plugins' . DS);
		} else
			return _error("Error: Unable to register moduule \"{$module}\", module directory does not exists!!");
	}

	/**
	 * Auto resolve given request containee class if posible
	 *
	 * @param string {$class}
	 * @param string|null {$alias}
	 *
	 * @return object
	 */
	private static function getResolve(string $class, string $alias = null)
	{
		$reflection = new ReflectionClass($class);
		/** get default constructor if any **/
		$construct  = $reflection->getConstructor();
		/** instance result if no constructor **/
		if (is_null($construct))
			return $reflection->newInstance();
		/** get default constructor parameters **/
		$parameters = $construct->getParameters();
		$dependency = self::getDependencies($parameters);
		/** call relwction with arguments **/
		$result = $reflection->newInstanceArgs($dependency);
		if (null === $alias)
			$name = $class;
		else
			$name = $alias;
		self::$container[$name] = $result;
		/** freeze **/
		unset($reflection, $construct, $parameters, $dependency);
		return self::$container[$name];
	}

	/**
	 * Get default property dependency(s)
	 *
	 * @param array {$params}
	 *
	 * @return array
	 **/
	private static function getDependencies(array $params): array
	{
		$dependencies = [];
		foreach($params as $param)
		{
			$dependency = $param->getClass();
			if ($dependency === NULL)
			{
				if ($param->isDefaultValueAvailable())
					$dependencies[] = $param->getDfaultValue();
				else
					_error("Error: can not resolve default parameters class dependency {$param->name}");
			} else
			{
				$dependencies[] = self::get($dependency->name);
			}
		};	return $dependencies;
	}

}