<?php
/**
* @copyright            2018-2019 mbetixz93@gmail.com
* @site                 hhtp://fb.me/mbetixz

The MIT License (MIT)

Copyright (c) 2019 mbetixz (mbetixz93@gmail.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORTOR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
**/

function smarty_modifier_benchmark(bool $time = false)
{
	if ($time !== false)
		return (round(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"], 3) + 0.3).'s';
	else
	if (APP_DEBUG !== false)
	{
		define("APP_BENCHMARK", true);
		return ('<div style="position:fixed;top:70%;z-index:999999;right:-50px;text-align:center;"><div style="background-color:#444;border:1px solid #555;font-size:10px;color:#fff;padding:3px 10px 3px 10px;border-top-left-radius:5px;border-top-right-radius:5px;width:auto;display:inline-block;margin:auto;transform:rotate(270deg)" align="center">Script Speed: ' . str_pad(round(microtime(true) - /** APP_START **/$_SERVER["REQUEST_TIME_FLOAT"], 3),5,0) . 's.</div></div>');
	}
}
