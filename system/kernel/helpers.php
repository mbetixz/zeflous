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
use System\{
	App,
	Config
};


/**
* Config helper
* config('parent.section.child');
* config('parent:section:child');
* config('parent->section->child');
**/
function config(string $key, $value=null)
{
	if (null === $value)
		return App::get(Config::class)()->get($key);
	else
		return App::get(Config::class)()->set($key, $value);
}

/**
* Error View
**/
function _error($error, $prev = 1, $file=true, $exit = false)
{
	/** hidden error if DEBUG is disable **/
	if (APP_DEBUG)
	{
		/**
		* trying create an logic for including style for first time only
		**/
		$already = false;
		if (! isset($GLOBALS["error"]))
			$GLOBALS["error"] = 1;
		else
			$already = true;
		$fileLine = '';
		if (APP_DEV_MODE && $file != false)
		{
			$trace = new Exception(null);
			$trace = $trace->getTrace()[$prev];
			$fileLine = "<hr/>{$trace['file']}:({$trace['line']})";
			$fileLine = str_replace(ROOT_PATH, "{home}/", $fileLine);
			unset($trace); //freeze
		}
		$style = ["",""];
		if (!$already && file_exists(__DIR__ . '/debug/debug.css'))
			$style = include __DIR__ . '/debug/debug.css';
		if (APP_SELF_ERROR)
			echo $style[0] . '<div class=__>' . $error . $fileLine . '</div>' . $style[1];
		else
			throw new Exception(filter_var($error, FILTER_SANITIZE_STRING));
		if ($exit != false)
			exit;
	}	return false;
}

/**
* variable(s) dump
**/
function dump($var)
{
	/**
	* trying create an logic for including style for first time only
	**/
	$already = false;
	if (! isset($GLOBALS["error"]))
		$GLOBALS["error"] = 1;
	else
		$already = true;
	$style  = [0 => ''];
	$output = print_r($var, true);
	$output = str_replace("\n", "<br>", $output);
	$output = str_replace(' ', '&nbsp;', $output);
	if (!$already && file_exists(__DIR__ . '/debug/debug.css'))
		$style = include __DIR__ . '/debug/debug.css';
	echo $style[0] . "<div class=___>$output</div>";
}