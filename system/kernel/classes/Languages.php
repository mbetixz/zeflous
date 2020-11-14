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

use ReflectionProperty;
use System\{
	App,
	User,
	Tools
};

class Languages
{

	protected
	/**
	 * Default path
	 *
	 * @var string
	 */
	$dir,
	/**
	 * Default iso
	 *
	 * @var string
	 */
	$iso,
	/**
	 * language fallback
	 *
	 * @var bool
	 */
	$fallback,
	/**
	 * extension
	 *
	 * @var string
	 */
	$ext,
	/**
	 * languages data
	 *
	 * @var array
	 */
	$data = [];

	public
	/**
	 * external path
	 *
	 * @var string
	 */
	$ext_dir,
	/**
	 * current domain
	 *
	 * @var string
	 */
	$domain;

	/**
	 * Constructor
	 *
	 * @param object {$user}
	 */
	public function __construct(User $user)
	{
		$this->dir = config('languages.path');
		if ($user->isValid())
		{
			if ($iso = $user->settings()->get('locale'))
				$this->iso = $iso;
				$this->iso = config('languages.iso');
		}	unset($user);
		$this->fallback = config('languages.fallback');
		$this->ext = config('languages.ext');
		if (empty($this->data))
			$this->import(config('languages.name'));
	}

	/**
	 * Translate / Invoke class
	 *
	 * @param string|null {$data}
	 *
	 * @return string|object
	 */
	public function __invoke(string $data = null)
	{
		if (null === $data)
			return $this;
		else
			return $this->translate($data);
	}

	/**
	 * Tranlsate String
	 *
	 * @param string {$string}
	 *
	 * @return string
	 */
	public function translate(string $string, string $name = null, string $iso = null)
	{
		static $fallback = true;
		$string = filter_var($string, FILTER_SANITIZE_STRING);
		if (null === $name)
		{
			$name = config('languages.name');
			$fallback = false;
		}
		$name = (null !== $this->domain) ? $this->domain : $name;
		if (null === $iso)
			$iso = $this->iso;
		if (isset($this->data[$name]['data'][$string]))
			return $this->data[$name]['data'][$string];
		/**
		 * @fallback
		 */
		elseif ($fallback == true && isset($this->data[config('languages.name')]['data'][$string]))
			return $this->data[config('languages.name')]['data'][$string];
		elseif (config('languages.show missing') != false)
			return "[!:{$string}]";
		else
			return $string;
	}

	/**
	 * Set Domain
	 *
	 * @param string {$domain}
	 *
	 * @return bool
	 */
	public function domain(string $domain)
	{
		return $this->domain = $domain;
	}

	/**
	 * Set property
	 *
	 * @param string {$key}
	 * @param mixed {$value}
	 *
	 * @return bool
	 */
	public function set(string $key, string $value): bool
	{
		$allow = false;
		if (
			property_exists($this, $key) &&
			(strtolower($key) !== 'data')
		) {
			$rp = new ReflectionProperty($this, $key);
			if (! ($rp->isProtected() || $rp->isPrivate()))
			{
				$this->{$key} = $value;
				$allow = true;
			} else
				_error("Warning: Unable to set property ".__CLASS__."::\${$key}, class property is not callable access!!");
		}	return $allow;
	}

	/**
	 * Import language file
	 *
	 * @param string {$name}
	 * @param bool {$return}
	 *
	 * @return array|none
	 */
	public function import(string $name, $return = false)
	{
		if ($lng = App::get(Tools::class)->LoadFile($this->dir . $this->iso . DS . $name . $this->ext))
			$data = $lng;
		elseif ($lng = App::get(Tools::class)->LoadFile($this->ext_dir . $this->iso . DS . $name . $this->ext))
			$data = $lng;
		else
		{
			return _error("Error: Unable to load language file \"{$name}\" in " . App::getReferer(), 0, false);
		}
		if ($return != false)
			return $data['data'];
		else
		{
			if (isset($this->data[$name]))
				$this->data[$name] = array_merge($this->data[$name], $return);
			else
				$this->data[$name] = $data;
		}
	}

}