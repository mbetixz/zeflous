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

use Defuse\Crypto\{
	Key,
	Crypto
};
use PhpAes\Aes;

trait Cryptor
{
	private $CrYpToKeY  = "def00000365db9b2f33d077f8a71458a678740d1a1f02303aa65205b17d01387b1cb9dd3215868f6b538f84562f6b0471d5e9c8c0917d85a7469109f31304686ec9b0af7";
	private $aEsKeY     = ["m1b4e0t4i1x9z9s3", "CBC", "1Z4o0L4D1y9C9k3Z"];

	public function encrypt(string $data): string
	{
		$aes  = new Aes($this->aEsKeY[0], $this->aEsKeY[1], $this->aEsKeY[2]);
		$key  = Key::loadFromAsciiSafeString($this->CrYpToKeY);
		$data = Crypto::encrypt($data, $key);
		$data = $aes->encrypt($data);
		$data = base64_encode($data);
		return $data;
	}

	public function decrypt(string $data): string
	{
		$aes  = new Aes($this->aEsKeY[0], $this->aEsKeY[1], $this->aEsKeY[2]);
		$key  = Key::loadFromAsciiSafeString($this->CrYpToKeY);
		$data = base64_decode($data);
		$data = $aes->decrypt($data);
		$data = Crypto::decrypt($data, $key);
		return $data;
	}
}