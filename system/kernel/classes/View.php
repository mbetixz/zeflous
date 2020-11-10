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

use Smarty;
use Smarty_Autoloader;

class View
{

	/**
	 * @object Smarty::class
	 */
	private static $smarty;

	/**
	 * @bool extends view
	 */
	private $extends;

	/**
	 * Constructor
	 *
	 * @param object $autoloader
	 * @param object $smarty
	 */
	public function __construct(Smarty_Autoloader $autoloader, Smarty $smarty)
	{
		if (config('view'))
		{
			if (null === self::$smarty)
			{
				$autoloader::register();
				foreach(config('view.smarty_config') as $key => $value)
				{
					$smarty->{$key} = $value;
					/** html compression **/
					if (config('view.compression.html'))
						$smarty->autoload_filters = array(
							"output" => array(
								"html_compressor",
								"trimwhitespace",
							)
						);
					if ($theme = App::get(User::class)->settings()->get('theme'))
						$smarty->assign([
							'site_theme' => $theme,
						]);
					elseif ($theme = config('view.theme'))
						$smarty->assign([
							'site_theme' => $theme,
						]);
				};
				$smarty->addPluginsDir(SMARTY_DIR . 'plugins');
				self::$smarty = $smarty;
			}
		} else
		{
			_error("Error: Configuration file for " . get_class($this) . " does not found!", 0, false);
			exit;
		}	unset($autoloader, $smarty);
	}

	/**
	 * Smarty Object
	 *
	 * @return object
	 */
	public function smarty(): Smarty
	{
		return self::$smarty;
	}

	/**
	 * Extends View
	 *
	 * @return object
	 */
	public function extends(): self
	{
		$this->extends = true;
		return $this;
	}

	/**
	 * Assign variable(s)
	 *
	 * @param array {$vars}
	 *
	 * @return object
	 */
	public function assign(array $vars): self
	{
		$this->smarty()->assign($vars);
		return $this;
	}

	/**
	 * Render/Display view
	 *
	 * @param string {$name}
	 * @param array {$assign}
	 *
	 * @return mixed
	 */
	public function render(string $name, array $assign = [])
	{
		/** path:name -> path/name **/
		$name = str_replace(":", DS, $name) . config('view.extension');
		if ($this->smarty()->templateExists($name))
		{
			if (! empty($assign))
				$this->assign($assign);
			if (false !== $this->extends)
				return $this->smarty()->display("extends:system/base.tpl|{$name}");
			else
				return $this->smarty()->display($name);
		} else
			return _error("Error: Unable to load template file {$name}!");
	}

}