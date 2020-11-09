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
/**
* Name : Translate
* Usage:
* {{
	translate
		import  = {string}
		path    = {string}
		set     = {bool|string}
		iso     = {string}
		str     = {string}
		assign  = {string}
		unset   = {bool}
* }}
**/
use System\{
	App,
	Languages
};

function smarty_function_translate($params, $template)
{
	$result = '';
	/** System\Languages::class **/
	$lang = App::get(Languages::class);
	/** Language iso **/
	if (isset($params['iso']) && strlen($params['iso']) == 2)
		$iso = strtolower($params['iso']);
	else
		$iso = config('languages.iso');
	/** Import **/
	if (isset($params['import']))
	{
		/**
		* detect path by last registered path based
		* if current page registered as module
		* fallback system path
		**/
		if (isset($params['path']) && is_dir(ROOT_PATH . $params['path']))
			$dir = ROOT_PATH . $params['path'];
		else
		{
			$dir = $template->getTemplateDir()[0];
			$dir = dirname(dirname($dir)) . DS . 'locales';
		}
		$lang->import($params['import'], false, $iso, $dir);
		unset($dir);
	}
	/**
	* set spesific language
	* set=something
	* import + set
	* import=something set=true
	**/
	if (isset($params['set']))
	{
		if (
			(is_bool($params['set']) || is_int($params['set'])) &&
			isset($params['import']) && is_string($params['import'])
		)
			$lang->set($params['import']);
		elseif (is_string($params['set']))
			$lang->set($params['set']);
	}
	/**
	* assign languages
	* access with {{$foo.something}} or {{$foo['something with space']}}
	**/
	if (isset($params['assign']))
		$template->assign([$params['assign'] => $lang->load($params['import'])]);
	/**
	* remove current set
	**/
	if (isset($params['unset']) && (bool)$params['unset'] === true)
		$lang->_unset();
	/** return if set "str" **/
	if (isset($params['str']))
		$result = $lang->lng($params['str']);
	/** replace string **/
	if (isset($params['vsprintf']) && !empty($result))
		$result = vsprintf($result, $params['vsprintf']);
	if (isset($params['sprintf']) && !empty($result))
		$result = sprintf($result, $params['sprintf']);

	return $result;
}