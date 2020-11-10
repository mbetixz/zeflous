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
namespace System\Tools;

trait Loader
{
	/** @trait System\Tools\IncludeFile **/
	use IncludeFile;

	/**
	 *
	 * @param string {$file}
	 *
	 * @return mixed|bool
	 */
	public function LoadFile(string $file)
	{
		if (file_exists($file))
			return $this->IncludeFile($file);
		else
			return false;
	}

	/**
	 * Load config file
	 *
	 * @param string {$name}
	 * @param string {$path}
	 *
	 * @return array|bool
	 */
	public function LoadConfig(string $name, string $path = APP_CONFIG_PATH . 'system' . DS)
	{
		$prefix = ".config.php";
		return $this->LoadFile($path . $name . $prefix);
	}

	/**
	 * load nultiple config file
	 *
	 * @param string {$prefix}
	 * @param array {$path}
	 *
	 * @return array
	 */
	public function LoadConfigFromDir(string $prefix, array $path = []): array
	{
		$prefix = trim(rtrim($prefix, ".config.php")) . ".config.php";
		if (empty($path))
			$path = [
				APP_CONFIG_PATH . 'system' . DS,
				APP_CONFIG_PATH . 'shared' . DS,
				APP_MODULE_PATH . '*'      . DS . 'configs' . DS,
			];
		$config = [];
		foreach($path as $dir)
			foreach(glob($dir . $prefix) as $file)
			{
				$pathinfo = pathinfo($file);
				if ($prefix != "*.config.php")
				{
					$name = str_replace(APP_CONFIG_PATH, '', $pathinfo['dirname']);
					$name = str_replace(APP_MODULE_PATH, '', $pathinfo['dirname']);
					$name = explode(DS, $name);
					$name = $name[0];
				} else
				{
					$name = str_replace(".config", "", $pathinfo['filename']);
				}
				/** Info **/
				$config["{$name}-info"] = (string) "/** Loaded from: {$file} **/";
				$config[$name] = $this->IncludeFile($file);
			};
		return $config;
	}

	/**
	 * Load cache file
	 *
	 * @param string {$name}
	 * @param string {$path}
	 *
	 * @return array|bool
	 */
	public function LoadCache(string $name, string $path = APP_CACHE_PATH)
	{
		$prefix = '.cache.php';
		$name   = trim(str_replace(":", DS, $name));
		$path   = rtrim($path, DS) . DS;
		return $this->LoadFile($path . $name . $prefix);
	}

}