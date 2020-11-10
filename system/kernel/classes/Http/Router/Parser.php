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
namespace System\Http\Router;

trait Parser
{

	/**
	 * Parse / Format standart configurations
	 *
	 * @param array {$routes}
	 *
	 * @return array
	 */
	private function parseRoutes(array $routes): array
	{
		$newRoutes = array();
		foreach($routes as $key => $val)
		{
			/** comments source file info **/
			if (preg_match("/(-info)/", $key))
				$newRoutes[$key] = $val;
			/** module pathname as index **/
			elseif (is_string($key))
			{
				$newRoutes = array_merge(
					$newRoutes,
					$this->parseSectionRoutes($key, $val)
				);
			}
		};	return $newRoutes;
	}

	/**
	 * Format section configurations
	 *
	 * @param string {$index}
	 * @param array {$routes}
	 *
	 * @return array
	 */
	private function parseSectionRoutes(string $index, array $routes): array
	{
		$section = array();
		if ($def = config('system.default module'))
			$default = $def;
		else
			$default = 'homepage';
		foreach($routes as $key => $val)
		{
			$uri        = $val[0];
			$controller = $val[1];
			$method     = isset($val[2]) ? $val[2] : ["GET"];
			/** comparing default module **/
			if ($index != $default)
			{
				$uri  = DS . $index . DS . ltrim($uri, "/");
			}
			/** clean end slash **/
			$uri = rtrim($uri, "/");
			$uri = $this->convertRegex($uri);
			$uri = empty($uri) ? "/" : $uri;
			$controller = $this->formatController($controller, $index);
			$method     = $this->formatMethod($method);
			$section[$uri]  = [
				'module'     => $index,
				//'uri'        => $uri,
				'controller' => $controller,
				'method'     => $method,
			];
		};	return $section;
	}

	/**
	 * Format controller to array
	 *
	 * @param array|string {$controller}
	 * @param string {$module}
	 *
	 * @return array
	 */
	private function formatController($controller, string $module): array
	{
		$namespace = "Controller\\" . ucfirst($module) . "\\";
		if (is_string($controller) && preg_match("#/?[@]{1}/?#", (string)$controller))
			list($class, $method) = explode("@", $controller);
			if (!empty($class) && !empty($method))
				return ['class' => $namespace . $class, 'method' => $method];
		elseif (is_array($controller) && count($controller) == 2 && isset($controller[0]) && isset($controller[1]))
			return ['class' => $namespace . $controller[0], 'method' => $controller[1]];
		else /** undefined classname **/
			return ["class" => "UNKNOWN", "method" => "UNDEFINED"];
	}

	/**
	 * Format request method to array
	 *
	 * @param array|string {$method}
	 *
	 * @return array
	 */
	private function formatMethod($method): array
	{
		if (is_array($method))
			$method = $method;
		else
			$method = explode("#", str_replace("|", "#", str_replace(",", "#", $method)));
		return array_map(function($method) {
			return trim($method);
		}, $method);
	}

	/**
	 * Replace uri to regex format
	 *
	 * @param string {$uri}
	 *
	 * @return string
	 */
	private function convertRegex(string $uri): string
	{
		if ($router = config('router'))
			return strtr($uri, $router);
		else
			return $uri;
	}

}