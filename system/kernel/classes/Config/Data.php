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
namespace System\Config;

use ArrayAccess;
use System\Config\Exception\{
	DataException,
	InvalidPathException,
	MissingPathException
};

class Data
implements DataInterface, ArrayAccess
{

	/**
	 * Rules string delimiters
	 */
	private const DELIMITERS = ['.', '->', ":"];

	/**
     * Internal representation of data data
     *
     * @var array{string, mixed}
     */
    protected $data;

    /**
     * Constructor
     *
     * @param array{string, mixed} $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
	 * Add an array
	 *
     * {@inheritdoc}
     */
    public function append(string $key, $value = null): void
    {
        $currentValue =& $this->data;
        $keyPath = self::keyToPathArray($key);
        $endKey = array_pop($keyPath);
        foreach ($keyPath as $currentKey)
		{
            if (! isset($currentValue[$currentKey]))
                $currentValue[$currentKey] = [];
			//
            $currentValue =& $currentValue[$currentKey];
        };
		//
        if (! isset($currentValue[$endKey]))
            $currentValue[$endKey] = [];
		//
        if (! is_array($currentValue[$endKey]))
            $currentValue[$endKey] = [$currentValue[$endKey]];
		//
        $currentValue[$endKey][] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function set(string $key, $value = null): void
    {
        $currentValue =& $this->data;
        $keyPath = self::keyToPathArray($key);
        $endKey = array_pop($keyPath);
        foreach ($keyPath as $currentKey)
		{
            if (!isset($currentValue[$currentKey]))
                $currentValue[$currentKey] = [];
            if (!is_array($currentValue[$currentKey]))
                _error(sprintf('Key path "%s" within "%s" cannot be indexed into (is not an array)', $currentKey, self::formatPath($key)));
            //
			$currentValue =& $currentValue[$currentKey];
        };
        $currentValue[$endKey] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function remove(string $key): void
    {
        $currentValue =& $this->data;
        $keyPath = self::keyToPathArray($key);
        $endKey = array_pop($keyPath);
        foreach ($keyPath as $currentKey)
		{
            if (!isset($currentValue[$currentKey]))
                return;
            $currentValue =& $currentValue[$currentKey];
        };	unset($currentValue[$endKey]);
    }

    /**
     * {@inheritdoc}
     *
     * @psalm-mutation-free
     */
    public function get(string $key, $default = null)
    {
        /** @psalm-suppress ImpureFunctionCall */
        $hasDefault = \func_num_args() > 1;
        $currentValue = $this->data;
        $keyPath = self::keyToPathArray($key);
        foreach ($keyPath as $currentKey)
		{
            if (!is_array($currentValue) || !array_key_exists($currentKey, $currentValue))
			{
                if ($hasDefault)
                    return $default;
                _error(sprintf('Warrning: No configuration data exists at the given path: "%s"', self::formatPath($keyPath)), 2, true);exit;
            }
            $currentValue = $currentValue[$currentKey];
        };	return $currentValue === null ? $default : $currentValue;
    }

    /**
     * {@inheritdoc}
     *
     * @psalm-mutation-free
     */
    public function has(string $key): bool
    {
        $currentValue = &$this->data;
        foreach (self::keyToPathArray($key) as $currentKey)
		{
            if (
                !is_array($currentValue) ||
                !array_key_exists($currentKey, $currentValue)
            ) {
                return false;
            }
            $currentValue = &$currentValue[$currentKey];
        };	return true;
    }

    /**
     * {@inheritdoc}
     *
     * @psalm-mutation-free
     */
    public function getData(string $key): DataInterface
    {
        $value = $this->get($key);
        if (is_array($value) && Util::isAssoc($value))
		{
            return new Data($value);
        }
        _error(sprintf('Value at "%s" could not be represented as a DataInterface', self::formatPath($key)));
    }

    /**
     * {@inheritdoc}
     */
    public function import(array $data, int $mode = self::REPLACE): void
    {
        $this->data = Util::mergeAssocArray($this->data, $data, $mode);
    }

    /**
     * {@inheritdoc}
     */
    public function importData(DataInterface $data, int $mode = self::REPLACE): void
    {
        $this->import($data->export(), $mode);
    }

    /**
     * {@inheritdoc}
     *
     * @psalm-mutation-free
     */
    public function export(): array
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($key)
    {
        return $this->has($key);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($key)
    {
        return $this->get($key, null);
    }

    /**
     * {@inheritdoc}
     *
     * @param string $key
     */
    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($key)
    {
        $this->remove($key);
    }

    /**
     * @param string $path
     *
     * @return string[]
     *
     * @psalm-return non-empty-list<string>
     *
     * @psalm-pure
     */
    protected static function keyToPathArray(string $path): array
    {
        if (\strlen($path) === 0)
		{
            _error('Path cannot be an empty string');
        }
        $path = \str_replace(self::DELIMITERS, '.', $path);
        // @phpstan-ignore-next-line
        return \explode('.', $path);
    }

    /**
     * @param string|string[] $path
     *
     * @return string
     *
     * @psalm-pure
     */
    protected static function formatPath($path): string
    {
        if (is_string($path))
		{
            $path = self::keyToPathArray($path);
        }	return \implode(' -> ', $path);
    }

}