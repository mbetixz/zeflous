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
const DS                  = DIRECTORY_SEPARATOR;
define('ROOT_PATH', dirname(dirname(dirname(__DIR__))) . DS);
define("ISAJAX",    (isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
const APP_ASSETS_PATH     = ROOT_PATH           . 'assets'     . DS;
const APP_STYLES_PATH     = APP_ASSETS_PATH     . 'styles'     . DS;
const APP_FILES_PATH      = ROOT_PATH           . 'files'      . DS;
const APP_DATA_PATH       = ROOT_PATH           . 'data'       . DS;
const APP_CACHE_PATH      = APP_DATA_PATH       . 'cache'      . DS;
const APP_UPLOAD_PATH     = APP_FILES_PATH      . 'uploads'    . DS;
const APP_MODULE_PATH     = ROOT_PATH           . 'modules'    . DS;
const APP_SYSTEM_PATH     = ROOT_PATH           . 'system'     . DS;
const APP_CONFIG_PATH     = APP_SYSTEM_PATH     . 'configs'    . DS;
const APP_COMPONENTS_PATH = APP_SYSTEM_PATH     . 'components' . DS;
const APP_LOCALE_PATH     = APP_COMPONENTS_PATH . 'locales'    . DS;
const APP_TEMPLATE_PATH   = APP_COMPONENTS_PATH . 'templates'  . DS;
const APP_CLASSES_PATH    = APP_SYSTEM_PATH     . 'kernel'     . DS . 'classes' . DS;
const APP_VENDOR_PATH     = APP_SYSTEM_PATH     . 'vendor'     . DS;
const APP_VERSION         = '1.0.12';
const APP_DEBUG           = true;
const APP_SELF_ERROR      = true;
const APP_DEV_MODE        = true;