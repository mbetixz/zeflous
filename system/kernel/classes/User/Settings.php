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
namespace System\User;

use System\{
	App,
	Database,
	User
};

class Settings
{
	/**
	 * Default User Settings
	 */
	public

	/**
	 * Current User ID
	 *
	 * @var int|null
	 */
	$id,

	/**
	 * User theme
	 *
	 * @var string|null
	 */
	$theme,

	/**
	 * Extra timeshift
	 *
	 * @var int
	 */
	$timeshift = 0,

	/**
	 * Current Language
	 *
	 * @var string|null
	 */
	$locale,

	/**
	 * Item per page
	 *
	 * @var int
	 */
	$page = 10;

	/**
	 * Constructor
	 *
	 * @param object System\User {$user}
	 */
	public function __construct(User $user)
	{
		if ($user->isValid())
		{
			if (
				$setting = App::get(Database::class)
				->table('users_settings')
				->select('data')
				->where('id', $user->id)
				->limit(1)
				->first()
			) {
				$setting = json_decode($setting->data);
				if (! empty($setting))
				{
					foreach($setting as $key => $val)
						$this->{$key} = $val;
				}
			}
		}
	}

	/**
	 * Get user property
	 *
	 * @var string {$key}
	 *
	 * @return mixed
	 */
	public function get(string $key)
	{
		if (property_exists($this, $key))
			return $this->{$key};
		else
			return _error("Error: ".__CLASS__." doest not have property {$key}");
	}
}