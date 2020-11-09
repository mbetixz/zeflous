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
return [

	"theme"        => "dark",
	"extension"    => ".tpl",
	'check file before render' => true,

	"compression"  => [
		"html" => true,
		"css"  => true,
		"js"   => true,
	],

	"smarty_config" => [
		"left_delimiter"    => "{",
		"right_delimiter"   => "}",
		"escape_html"       => false,
		"caching"           => false,
		"cache_lifetime"    => 10,
		"config_dir"        => APP_CONFIG_PATH   . 'shared'    . DS,
		"template_dir"      => APP_TEMPLATE_PATH . 'views'     . DS,
		"plugins_dir"       => APP_TEMPLATE_PATH . 'plugins'   . DS,
		"cache_dir"         => APP_CACHE_PATH    . 'templates' . DS . 'cache'    . DS,
		"compile_dir"       => APP_CACHE_PATH    . 'templates' . DS . 'compiled' . DS,
		"compile_id"        => false,
		"cache_id"          => false,
		"force_cache"       => false,
		"force_compile"     => false,
		"compile_check"     => true,
		"compile_locking"   => false,
		"config_overwrite"  => false,
		"use_sub_dirs"      => true,
		"debugging"         => false,
		"error_reporting"   => 1,
		"allow_php_templates"     => false,
		"merge_compiled_includes" => true,
		"auto_literal"      => false,
		"literals"          => [],
		"config_vars"       => [],
		"registered_objects"=> [],
		"registered_classes"=> [],
		"registered_filters"=> [],
		"autoload_filters"  => [],
		"default_modifiers" => [],
	],

	"module_use_own_configs"  => true,
	"module_use_own_views"    => true,
	"module_use_own_plugins"  => true,
	"module_use_own_assets"   => true,

];