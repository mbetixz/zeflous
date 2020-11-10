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
	App,
	User\Settings
};

class User
{

	/**
	 * Constructor
	 *
	 * @param object $session
	 * @param object $db
	 */
	public function __construct(Sessions $session, Database $db)
	{
		/** SESSION **/
		$uid = $session->get('uid');
		$ups = $session->get('ups');
		if (! ($uid && $ups))
		{
			/** COOKIE **/
			$uid = $session->get('_uid', 1);
			$ups = $session->get('_ups', 1);
		}
		if ($uid && $ups)
		{
			$ups = md5($ups);
			if ($user = $db->table('users')
				->where('id', $uid)
				->where('password', $ups)
				->limit(1)
				->first()
			) {
				foreach($user as $key => $val)
					$this->{$key} = $val;
			}
		}	unset($session);
	}

	/**
	 * User Settings
	 *
	 * @return object
	 */
	public function settings()
	{
		return App::get(Settings::class);
	}

	/**
	 * Check if user is valid
	 *
	 * @return bool
	 */
	public function isValid()
	{
		return property_exists($this, 'id');
	}
}