<?php
/**
* @copyright            2018-2019 mbetixz93@gmail.com
* @site                 hhtp://fb.me/mbetixz

The MIT License (MIT)

Copyright (c) 2019 mbetixz (mbetixz93@gmail.com)

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORTOR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
**/
use voku\helper\HtmlMin;

function smarty_outputfilter_html_compressor($tpl_source, Smarty_Internal_Template $template)
{
	if (
		extension_loaded('zlib') &&
		!ini_get('zlib.output_compression')
	) {
		ini_set("zlib.output_compression_level", 7);
		ob_start('ob_gzhandler');
	} else {
		ob_start();
	}

	$regex = array(
		"#/?>([(\r|\s|\t|\h|\n|\v)]+?)</\/?#s" => ">" . "</",
		"#/?>([(\r|\s|\t|\h|\n|\v)]+?)</?#s" => ">" . "<",
	);
	$out = preg_replace(array_keys($regex), array_values($regex), $tpl_source);

	$htmlMin = new HtmlMin();
	$htmlMin->doRemoveValueFromEmptyInput(false);
	$out = $htmlMin->minify($out);	unset($htmlMin);
	ob_get_clean();
	return $out;
}