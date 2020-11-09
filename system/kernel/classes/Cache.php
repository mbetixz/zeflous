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

use System\Tools\{
	IncludeFile,
	Loader,
	Beautyfier
};

class Cache
{
	use
	/** @trait System\Tools\IncludeFile **/
	IncludeFile,
	/** @trait System\Tools\Loader **/
	Loader,
	/** @trait System\Tools\Beautyfer **/
	Beautyfier;

	/**
	* Comments template for cache file
	**/
	private static $cache_template = array(
		'',
		'/**',
		'** APP Version  : {APP_VERSION}',
		'**',
		'** Filename     : {NAME}',
		'** Created Time : {TIME}',
		'** Expires Time : {EXPIRES}',
		'** Beautyfier   : {BEAUTYFIER}',
		'**',
		'**/',
	);

	public function create(array $params)
	{
		if (
			isset($params['name']) &&
			isset($params['path']) &&
			isset($params['vars'])
		) {
			$cache_template = implode("\r\n", self::$cache_template);
			$cache_name     = $params['name'] . '.cache.php';
			$cache_time     = date("l, d F Y h:i:s", time());
			$cache_expires  = isset($params['time']) && ((int)$params['time'] > 1) ? date("l, d F Y h:i:s", time() + (int)$params['time']) : '-';
			$cache_beauty   = isset($params['beautyfier']) && ($params['beautyfier'] != false) ?? false;
			$cache_template = strtr(
				$cache_template,
				array(
					//' ' => "\t",
					'{NAME}'        => $cache_name,
					'{TIME}'        => $cache_time,
					'{EXPIRES}'     => $cache_expires,
					'{APP_VERSION}' => APP_VERSION,
					'{BEAUTYFIER}'  => ($cache_beauty ? 'ENABLE' : 'DISABLE'),
					)
			);
			if ($cache_beauty)
				$cache_vars = self::Beautyfier($params['vars']);
			else
				$cache_vars = var_export($params['vars'], true) . ';';
			$cache_vars = "<?php" . "\r\n" . $cache_template . "\r\n" . $cache_vars . "\r\n";
			$cache_dir  = rtrim((isset($params["cachepath"]) ? $params["cachepath"] : $params["path"]), "/");
			/**
			* Check the directory if not exists we create
			**/
			$allow = false;
			if (!is_dir($cache_dir))
			{
				if (@mkdir($cache_dir, 0777))
				{
					@chmod($cache_dir, 0777);
					$allow = true;
				}
			} else
			{
				$allow = true;
			}
			if ($allow == true)
			{
				if (!file_put_contents($cache_dir . DS . $cache_name, $cache_vars))
					_error("Warning: failed to create cache file for {$cache_name}");
				else
					return true;
			} else {
				_error("Error: Cache directory permission denied!!");
			}
		} else
			return false;
	}
}