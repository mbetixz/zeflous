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

trait Beautyfier
{

	/**
	* default is 4 space, you can use tab \t
	**/
	private static string $BeautySpace       = "    ";

	/**
	* Space {$BeautySpace} count for every sub array
	**/
	private static int    $BeautySpaceCount  = 1;

	/**
	* Bracket style you can use "array (" like var_export
	**/
	private static string $BeautyTagOpen     = "[";

	/**
	* array tag close, tag close type must be same as above
	**/
	private static string $BeautyTagClose    = "]";

	/**
	* Character enconding
	**/
	private static string $BeautyEncoding    = "UTF-8";

	/**
	* @param  int
	* @return string
	**/
	private static function BeautySpacer(int $count): string
	{
		return str_repeat(self::$BeautySpace, $count);
	}

	/**
	* @param  array
	* @return string
	**/
	private static function Beautyfier(array $vars): string
	{
		$vars    = (array) $vars;
		$count   = self::$BeautySpaceCount;
		$result  = 'return ' . /** array **/ "\r\n";
		$result .= self::BeautySpacer($count) . self::$BeautyTagOpen . "\r\n";
		foreach ($vars as $key => $val)
		{
			if (preg_match("/(-info)/", $key))
				$result .= "\r\n" . self::BeautySpacer($count) . $val;
			elseif (is_array($val))
				$result .= "\r\n" . self::BeautySpacer($count) . self::BeautyCheck($key) . " => " . self::BeautyArray($val, $count + 1) . "\r\n";
			else
				$result .= self::BeautySpacer($count) . self::BeautyCheck($key) . " => " . self::BeautyCheck($val) . "," . "\r\n";
		};
		$result .= "\r\n" . self::$BeautyTagClose . ";" . "\r\n";
		return mb_convert_encoding($result, self::$BeautyEncoding);
	}

	/**
	* @param  mixed
	* @return mixed
	**/
	private static function BeautyCheck($value)
	{
		if (is_bool($value))
			return $value !== false ? 'true' : 'false';
		elseif (is_int($value))
			return (int) $value;
		else
			return '"'. ((string) $value) . '"';
	}

	/**
	* @param  array, int
	* @return string
	**/
	private static function BeautyArray(array $vars, int $count): string
	{
		$result  = /** array **/'' . "\r\n";
		$result .= self::BeautySpacer($count) . self::$BeautyTagOpen . "\r\n";
		foreach($vars as $key => $val)
		{
			if (is_array($val) && empty($val))
				$result .= self::BeautySpacer($count + 1) . self::BeautyCheck($key) . " => " . self::$BeautyTagOpen . self::$BeautyTagClose . "," . "\r\n";
			elseif (is_array($val))
				$result .= self::BeautySpacer($count + 1) . self::BeautyCheck($key) . " => " . self::BeautyArray($val, $count + 2) . "\r\n";
			else
				$result .= self::BeautySpacer($count + 1) . self::BeautyCheck($key) . " => " . self::BeautyCheck($val) . "," . "\r\n";
		};
		$result .= self::BeautySpacer($count) . self::$BeautyTagClose . ",";
		return $result;
	}
}