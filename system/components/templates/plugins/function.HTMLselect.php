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
function smarty_function_HTMLselect($params, $template)
{
	$label = '';
	$desc  = '';
	$value = '';
	if (isset($params['label']))
		$label = '<label for="' . $params['label'] . '">' . $params['label'] . '</label>';	unset($params['label']);
	if (isset($params['desc']))
		$desc = '<span plugin="input-box-desc">' . $params['desc'] . '</span>';	unset($params['desc']);
	if (isset($params["value"]))
		$value = $params['value'];	unset($params['value']);
	$data = $params["data"];	unset($params["data"]);
	$out  = '<section>';
	$out .= '<p plugin="input-box">';
	$out .= "<select";
	foreach($params as $key => $val)
		$out .= " {$key}=\"{$val}\"";
	$out .= '>';
	foreach($data as $key => $val)
		$out .= "<option value=\"{$key}\"" . ($value == $key ? ' selected' : '') . (strlen($key) == 0 ? ' disabled' : '') . ">{$val}</option>";
	$out .= '</select>';
	$out .= $label;
	$out .= '</p>';
	$out .= $desc;
	$out .= '</section>';
	return $out;
}