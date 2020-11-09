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
function smarty_function_HTMLinput($params, $template)
{
	$label  = '';
	$desc   = '';
	$error  = false;
	$hidden = false;
	if (isset($params['label']))
		$label = '<label for="' . $params['label'] . '">' . $params['label'] . '</label>';	unset($params['label']);
	if (isset($params['desc']))
		$desc = $params['desc'];	unset($params['desc']);
	if (isset($params['error']) && !empty($params['error']))
		$error = $params['error'];	unset($params["error"]);
	if (!isset($params["value"]))
		$params["value"] = "";
	if (!isset($params["placeholder"]))
		$params["placeholder"] = " ";
	if ($params['type'] == "hidden")
		$hidden = true;
	if (!$hidden)
	{
		$out  = '<section>';
		$out .= '<p plugin="input-box" error="' . ($error ? 'true' : 'false') . '">';
	}
	$out .= '<input ';
	foreach($params as $key => $val)
	{
		$out .= "{$key}=\"{$val}\" ";
	};
	$out .= '/>';
	if (! $hidden)
	{
		$out .= $label;
		$out .= (!empty($desc) ? '<span class="help">' . $desc . '</span>' : '');
		$out .= '</p>';
		$out .= (!empty($desc) ? '<span id="desc-' . $params['name'] . '" plugin="input-box-desc">' . ($error ? $error : $desc) . '</span>' : '');
		$out .= '</section>';
	}
	return $out;
}