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

use System\{
	Cache,
	Config\Data,
	Tools
};

class Config
{
	public
	/**
	 * @object System\Cache::class
	 */
	$cache,
	/**
	 * @object System\Tools::class
	 */
	$tools;

	private
	/**
	 * @object System\Config\Data::class
	 */
	$config;

	/**
	 * Constructor
	 *
	 * @param object {$tools}
	 * @param object {$cache}
	 */
	public function __construct(Tools $tools, Cache $cache)
	{
		$this->tools = $tools;
		$this->cache = $cache;
		$conf        = $this->tools->LoadFile(APP_CONFIG_PATH . 'system' . DS . 'cache.config.php');
		$config = static function($self, $conf)
		{
			$cache_file = APP_CACHE_PATH . 'configs' . DS . 'configs.cache.php';
			if (
				(file_exists($cache_file)) &&
				(isset($conf['configs']['enable'])) &&
				($conf['configs']['enable'] != false) &&
				(filemtime($cache_file) + $conf['configs']['time']) > time()
			) {
				$config = $self->tools->IncludeFile($cache_file);
			} else
			{
				$config = $self->tools->LoadConfigFromDir("*", [APP_CONFIG_PATH . 'system' . DS]);
				if (isset($conf['configs']['enable']) && $conf['configs']['enable'] != false)
				{
					$self->cache->create([
						"name" => "configs",
						"path" => APP_CACHE_PATH . 'configs',
						"vars" => $config,
						"time" => (isset($conf['configs']['time']) ? (int)$conf['configs']['time'] : false),
						"beautyfier" => ((isset($conf['beautyfier']) && ($conf['beautyfier'] != false)) ?? false),
					]);
				}
			}	return $config;
		};	$this->config = new Data($config($this, $conf));
	}

	/**
	 * get config data / object by invoke
	 *
	 * @param string {$data}
	 *
	 * return array|object
	 */
	public function __invoke(string $data = null)
	{
		if (null === $data)
			return $this->config;
		else
			return $this->config->get($data);
	}

	/**
	 * load config file
	 *
	 * @param string {$name}
	 * @param string {$path}
	 *
	 * @return array|bool
	 */
	public function load(string $name, string $path = APP_CONFIG_PATH)
	{
		$name  = trim(str_replace(":", DS, $name));
		if ($cache = $this->cache->LoadCache($name))
			$config = $cache;
		elseif ($file = $this->tools->LoadConfig($name))
			$config = $file;
		else
		{
			_error("Warning: Configuration file \"{$name}\" does not exists");
			return false;
		}
		return $config;
	}

	/**
	 * Get config data
	 *
	 * @param string {$key}
	 *
	 * @return array|string
	 */
	public function get(string $key)
	{
		return $this()->get($key);
	}

	/**
	 * Set config data
	 *
	 * @param string $key
	 * @param array|string
	 */
	public function set(string $key, $value)
	{
		return $this()->set($key, $value);
	}

}