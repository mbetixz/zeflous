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
/**
define("APP_START", microtime(true));
**/
use System\Http\Router;
use System\Controller\Main;

require('system/bootstrap.php');

$request = new Router();
$match   = $request->route();

/**
* dump($match) for info
* [0] ROUTER STATUS
* [1] RESULT
* [2] DEBUG VARIABLES
**/
switch($match[0])
{
	case $request::FOUND:
		echo call_user_func_array($match[1][0], $match[1][1]);
		break;

	default:
		echo (new Main)->page($match[0]);
	break;
}
if (APP_DEBUG !== false && !defined("APP_BENCHMARK"))
	echo ('<div style="position:fixed;top:70%;z-index:999999;right:-50px;text-align:center;"><div style="background-color:#444;border:1px solid #555;font-size:10px;color:#fff;padding:3px 10px 3px 10px;border-top-left-radius:5px;border-top-right-radius:5px;width:auto;display:inline-block;margin:auto;transform:rotate(270deg)" align="center">Script Speed: ' . str_pad(round(microtime(true) - /** APP_START **/$_SERVER["REQUEST_TIME_FLOAT"], 3),5,0) . 's.</div></div>');
