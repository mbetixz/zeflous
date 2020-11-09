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
namespace System\Controller;

use System\{
	App,
	Languages,
	View
};

class Main
{
	public function page($type = 404)
	{
		$lng = App::get(Languages::class)->import('error_pages', true);
		switch($type)
		{
			case 405:
				$title   = $lng['error 405 title'];
				$code    = 405;
				$message = $lng['error 405 message'];
				break;
			case 403:
				$title   = $lng['error 403 title'];
				$code    = 403;
				$message = $lng['error 403 message'];
				break;
			default:
				$title   = $lng['error 404 title'];
				$code    = 404;
				$message = $lng['error 404 message'];
				break;
		}
		$return = App::get(View::class)
			->extends()
			->render('system:ERROR-PAGE', [
				'page_title'    => $title,
				'error_code'    => $code,
				'error_message' => $message,
			]);	unset($lng, $title, $code, $message);
		return $return;
	}
}