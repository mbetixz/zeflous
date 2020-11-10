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

use PDO;
use PDOException;
use Pixie\{
	Connection,
	QueryBuilder\QueryBuilderHandler
};

class Database
{
	/**
	 * @object Pixie\QueryBuilder\QueryBuilderHandler
	 */
	private static $db;

	/**
	 * {@inheritdoc}
	 */
	public function __construct()
	{
		if (null === self::$db)
			self::$db = $this->connect();
	}

	/**
	 * self object
	 *
	 * @param bool|string
	 *
	 * @return object
	 */
	public function __invoke($data = null)
	{
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function __call($method, $args)
	{
		return call_user_func_array([self::$db, $method], $args);
	}

	/**
	 * {@inheritdoc}
	 */
	public static function __callStatic($method, $args)
	{
		return call_user_func_array([self::$db, $method], $args);
	}

	/**
	 * Connect to database
	 *
	 * @return object
	 */
	private function connect(): QueryBuilderHandler
	{
		if (!config('database'))
		{
			_error("FATAL ERROR: Database configuration does not defined!!", 0, false);
			exit;
		}
		//
		$config   = config('database');
		$driver   = isset($config['driver'])   ? trim($config['driver'])   : false;
		$host     = isset($config['host'])     ? trim($config['host'])     : false;
		$port     = isset($config['port'])     ? trim($config['port'])     : false;
		$username = isset($config['username']) ? trim($config['username']) : false;
		$password = isset($config['password']) ? trim($config['password']) : false;
		$dbname   = isset($config['dbname'])   ? trim($config['dbname'])   : false;
		//
		if ((
			!$driver   ||
			!$host     ||
			!$port     ||
			!$username ||
			!$dbname
		)) {
			$msg  = '%#driver#%: '   . ($driver   ? 'OK' : 'ERROR') . '<br/>';
			$msg .= '%#host#%: '     . ($host     ? 'OK' : 'ERROR') . '<br/>';
			$msg .= '%#port#%: '     . ($port     ? 'OK' : 'ERROR') . '<br/>';
			$msg .= '%#username#%: ' . ($username ? 'OK' : 'ERROR') . '<br/>';
			$msg .= '%#password#%: ' . ($password ? 'OK' : 'ERROR') . '<br/>';
			$msg .= '%#database#%: ' . ($dbname   ? 'OK' : 'ERROR') . '<br/>';
			$msg  = strtr(
				$msg,
				array(
					'%#' => '<span style="width:100px;display:inline-block">',
					'#%' => '</span>',
					'OK' => '<b style="color:green">OK</b>',
					'ERROR' => '<b style="color:red">ERROR</b>'
				)
			);
			$msg = ("[".get_called_class() . "::class] -> Missing database configuration!!<hr/>{$msg}");
			_error($msg,0, false, true);
			unset($msg);
		} else
		{
			$db = array(
				'driver'    => $driver,
				'host'      => $host,
				'database'  => $dbname,
				'username'  => $username,
				'password'  => $password,
				'charset'   => (isset($config['charset'])   && empty($config['charset'])   ? trim($config['charset'])   : 'utf8'),
				'collation' => (isset($config['collation']) && empty($config['collation']) ? trim($config['collation']) : 'utf8_unicode_ci'),
				'prefix'    => (isset($config['prefix'])    && empty($config['prefix'])    ? trim($config['prefix'])    : ''),
				'options'   => array(
					PDO::ATTR_TIMEOUT => 5,
					PDO::ATTR_EMULATE_PREPARES => false,
				),
			);
			//
			try
			{
				return (new Connection($driver, $db))->getQueryBuilder();
			} catch(\PDOException $e)
			{
				$msg = ("[".get_called_class() . "::class] -> Unable to connect database server!!<hr/>{$e->getMessage()}");
				_error($msg, 0, false, true);
				unset($db, $msg);
			}
		}
	}
}