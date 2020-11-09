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

class Util
{
    /**
     * Test if array is an associative array
     *
     * Note that this function will return true if an array is empty. Meaning
     * empty arrays will be treated as if they are associative arrays.
     *
     * @param array<mixed> $arr
     *
     * @return bool
     *
     * @psalm-pure
     */
    public static function isAssoc(array $arr): bool
    {
        return !count($arr) || count(array_filter(array_keys($arr), 'is_string')) == count($arr);
    }

    /**
     * Merge contents from one associtative array to another
     *
     * @param mixed $to
     * @param mixed $from
     * @param DataInterface::PRESERVE|DataInterface::REPLACE|DataInterface::MERGE $mode
     *
     * @return mixed
     *
     * @psalm-pure
     */
    public static function mergeAssocArray($to, $from, int $mode = DataInterface::REPLACE)
    {
        if ($mode === DataInterface::MERGE && self::isList($to) && self::isList($from)) {
            return array_merge($to, $from);
        }

        if (is_array($from) && is_array($to)) {
            foreach ($from as $k => $v) {
                if (!isset($to[$k])) {
                    $to[$k] = $v;
                } else {
                    $to[$k] = self::mergeAssocArray($to[$k], $v, $mode);
                }
            }

            return $to;
        }

        return $mode === DataInterface::PRESERVE ? $to : $from;
    }

    /**
     * @param mixed $value
     *
     * @return bool
     *
     * @psalm-pure
     */
    private static function isList($value): bool
    {
        return is_array($value) && array_values($value) === $value;
    }
}
