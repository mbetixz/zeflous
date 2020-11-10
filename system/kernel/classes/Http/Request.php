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
namespace System\Http;

use GuzzleHttp\Psr7\{
	CachingStream,
	LazyOpenStream,
	ServerRequest
};
use Psr\Http\Message\ServerRequestInterface;

class Request
extends ServerRequest
{

	/**
	 * Return a ServerRequest populated with superglobals:
	 *
	 * $_GET
	 * $_POST
	 * $_COOKIE
	 * $_FILES
	 * $_SERVER
	 *
	 * @return ServerRequestInterface
	 */
	public static function fromGlobals()
	{
		$method        = $_SERVER['REQUEST_METHOD'] ?? 'GET';
		$headers       = getallheaders();
		$uri           = self::getUriFromGlobals();
		$body          = new CachingStream(new LazyOpenStream('php://input', 'r+'));
		$protocol      = isset($_SERVER['SERVER_PROTOCOL']) ? str_replace('HTTP/', '', $_SERVER['SERVER_PROTOCOL']) : '1.1';
		$serverRequest = new self($method, $uri, /** @scrutinizer ignore-type */ $headers, $body, $protocol, $_SERVER);
		return $serverRequest
			->withCookieParams($_COOKIE)
			->withQueryParams($_GET)
			->withParsedBody($_POST)
			->withUploadedFiles(self::normalizeFiles($_FILES));
	}

	/**
	 * Get Query String from uri
	 *
	 * @param string {$name}
	 * @param null|mixed {$default}
	 * @param int {$filter}
	 * @param mixed {$options}
	 *
	 * @return mixed|null
	 */
	public function getQuery(string $name, $default = null, int $filter = FILTER_DEFAULT, $options = null)
	{
		return $this->filterVar($name, $this->getQueryParams(), $filter, $options) ?? $default;
	}

	/**
	 * Get request post
	 *
	 * @param string {$name}
	 * @param null|mixed {$default}
	 * @param int {$filter}
	 * @param mixed {$options}
	 *
	 * @return mixed|null
	 */
	public function getPost(string $name, $default = null, int $filter = FILTER_DEFAULT, $options = null)
	{
		return $this->filterVar($name, $this->getParsedBody(), $filter, $options) ?? $default;
	}

	/**
	 * Get cookie
	 *
	 * @param string {$name}
	 * @param null|mixed {$default}
	 * @param int {$filter}
	 * @param mixed {$options}
	 *
	 * @return mixed|null
	 */
	public function getCookie(string $name, $default = null, int $filter = FILTER_DEFAULT, $options = null)
	{
		return $this->filterVar($name, $this->getCookieParams(), $filter, $options) ?? $default;
	}

	/**
	 *
	 * @param string {$name}
	 * @param null|mixed {$default}
	 * @param int {$filter}
	 * @param mixed {$options}
	 *
	 * @return mixed|null
	 */
	public function getServer(string $name, $default = null, int $filter = FILTER_DEFAULT, $options = null)
	{
		return $this->filterVar($name, $this->getServerParams(), $filter, $options) ?? $default;
	}

	/**
	 * filter string
	 * @param string {$key}
	 * @param mixed {$var}
	 * @param int {$filter}
	 * @param mixed {$options}
	 *
	 * @return mixed|null
	 */
	private function filterVar(string $key, $var, int $filter, $options)
	{
		if (is_array($var) && isset($var[$key]))
		{
			$result = filter_var(trim($var[$key]), $filter, $options);
			if (false !== $result)
			{
				return $result;
			}
		}	return null;
	}

	/**
	 *
	 * @param array $remove_params
	 *
	 * @return string
	 */
	public function getQueryString(array $remove_params = []): string
	{
		$query_params = $this->getQueryParams();
		if (! empty($remove_params))
		{
			$query_params = array_diff_key($query_params, array_flip($remove_params));
		}	$str = http_build_query($query_params);
		return $this->getUri()->getPath() . (! empty($str) ? '?' . $str : '');
	}

}