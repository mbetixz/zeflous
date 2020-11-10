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
use System\App;

if (version_compare(PHP_VERSION, '7.2', '<'))
	exit('<h1>ERROR: </h1><p>Your needs PHP 7.2 or higher!!</p>');
elseif (!file_exists(__DIR__ . '/vendor/autoload.php'))
	exit('ERROR: Missing vendor(s) dependencies or autoload file does not exists!!');
else
{
	require(__DIR__ . '/vendor/autoload.php');
}

/**
 * Show all error if debug enabled
 */
if (APP_DEBUG)
{
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	ini_set('log_errors', 'Off'); /** enable this if you want to log error **/
} else
{
	error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
	ini_set('display_errors', 'Off');
	ini_set('log_errors', 'Off');
}

/**
 * Compression
 */
if (extension_loaded('zlib') && ! ini_get('zlib.output_compression'))
	ob_start('ob_gzhandler');
else
{
	ob_start();
}
/**
 * Check if class & config was loaded
 */
if (
	file_exists($autoload = APP_CONFIG_PATH . 'system/autoload.php') &&
	class_exists('System\App')
)
{
	$safeInclude = function($file): array
	{
		return include $file;
	};	new App( $safeInclude( $autoload ) );
		unset($autoload, $safeInclude);
} else
{
	_error("<h1>ERROR: </h1><p>Autoload config file or App class not found!!</p>", 0, false);
	exit;
}