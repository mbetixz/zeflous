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

use System\Tools\Cryptor;

class Sessions
{
	/**
	 * @trait System\Tools\Cryptor
	 */
	use Cryptor;

	/**
	* Set session
	*
	* @param string | $name
	* @param string | $value
	* @param int    | $type 0 = session, 1 = cookie
	* @param int    | $time if $type 1
	* @return bool
	**/
	public function set(string $name, string $value, int $type=0, $time=3600*24*30*3)
	{
		if ($type === 0)
			$_SESSION[$name] = (string)$this->encrypt($value);
		else
		{
			if (!setcookie($name, (string)$this->encrypt($value), time() + $time, "/"))
				$_COOKIE[$name] = (string)$this->encrypt($value);
		}
		return true;
	}

	/**
	* Get Session
	*
	* @param string | $name
	* @param int    | $type 0 = session, 1 = cookie
	* @return string if success null if fail
	**/
	public function get(string $name, int $type = 0):? string
	{
		if ($type === 0)
		{
			if (isset($_SESSION[$name]) && !empty($_SESSION[$name]))
				return $this->decrypt($_SESSION[$name]);
		} else
		{
			if (isset($_COOKIE[$name]) && !empty($_COOKIE[$name]))
				return $this->decrypt($_COOKIE[$name]);
		}
		return null;
	}

	/**
	* Unset/Delete session
	*
	* @param string | $name
	* @param int    | $type 0 = session, 1 = cookie
	* @return bool
	**/
	public function delete(string $name, int $type = 0): bool
	{
		if ($type === 0)
		{
			if (isset($_SESSION[$name]))
			{
				unset($_SESSION[$name]);
				return true;
			}
		} else
		{
			if (isset($_COOKIE[$name]))
			{
				setcookie($name, '', time() - 3600, "/");
				return true;
			}
		}
		return false;
	}

	/**
	 * Create session token
	 *
	 * @param string|int {$str}
	 *
	 * @return string
	 */
	public function createToken($str=null): string
	{
		if (null === $str)
			$str = random_int(0, 999999);
		$this->set("token", "token.{$str}");
		return (string) $str;
	}

	/**
	 * validate token
	 *
	 * @param string {$string}
	 *
	 * @return bool
	 */
	public function validToken(string $token): bool
	{
		if ($session = $this->get("token")) /** if token exists **/
			if (preg_match("#/?(token([\.])([0-9]{4,9}))/?#s", $session)) /** validate sessions first before compare **/
				if ("token.{$token}" === $session) /** comparing **/
					return true;
		return false;
	}

}