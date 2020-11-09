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

use Arrayy\Arrayy;
use System\{
	Cache,
	Config\Data,
	Tools
};
class Config
{
	public
		$cache,
		$tools;
	private
		$config;

	public function __construct(Tools $tools, Cache $cache)
	{
		$this->tools = $tools;
		$this->cache = $cache;
		$config = static function($self)
		{
			if ($cache  = $self->cache->LoadCache('configs', APP_CACHE_PATH . 'configs'))
				$config = $cache;
			else
			{
				$config = $self->tools->LoadConfigFromDir("*", [APP_CONFIG_PATH . 'system' . DS]);
				if (isset($config['cache']['configs']))
				{
					$cache = $config['cache'];
					if (isset($cache['configs']['enable']) && $cache['configs']['enable'] != false)
					{
						$self->cache->create([
							"name" => "configs",
							"path" => APP_CACHE_PATH . 'configs',
							"vars" => $config,
							"time" => (isset($cache['configs']['time']) ? (int)$cache['configs']['time'] : false),
							"beautyfier" => ((isset($cache['beautyfier']) && ($cache['beautyfier'] != false)) ?? false),
						]);
					}
				}
			}	return $config;
		};
		$this->config = new Data($config($this));
	}

	public function __invoke($data=null)
	{
		return $this->config;
	}

	public function load(string $name, $path = APP_CONFIG_PATH)
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

	public function get(string $key)
	{
		return $this()->get($key);
	}

	public function set(string $key, $value)
	{
		return $this()->set($key, $value);
	}

}