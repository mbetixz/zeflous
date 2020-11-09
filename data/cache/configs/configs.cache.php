<?php

/**
** APP Version  : 1.0.12
**
** Filename     : configs.cache.php
** Created Time : Monday, 09 November 2020 12:47:04
** Expires Time : Wednesday, 09 December 2020 12:47:04
** Beautyfier   : ENABLE
**
**/
return 
    [

    /** Loaded from: /storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/configs/system/cache.config.php **/
    "cache" => 
        [
            "beautyfier" => true,
            "configs" => 
                [
                    "enable" => true,
                    "time" => 2592000,
                ],
            "routes" => 
                [
                    "enable" => true,
                    "time" => 604800,
                ],
            "classes" => 
                [
                    "enable" => true,
                    "time" => 2592000,
                ],
            "plugins" => 
                [
                    "enable" => true,
                    "time" => 2592000,
                ],
        ],

    /** Loaded from: /storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/configs/system/database.config.php **/
    "database" => 
        [
            "driver" => "mysql",
            "host" => "localhost",
            "port" => 3306,
            "username" => "root",
            "password" => "",
            "dbname" => "localhost2020",
            "prefix" => "",
            "charset" => "utf8mb4",
            "collation" => "utf8_unicode_ci",
        ],

    /** Loaded from: /storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/configs/system/languages.config.php **/
    "languages" => 
        [
            "path" => "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/locales/",
            "iso" => "id",
            "ext" => ".lng.php",
            "name" => "default",
            "show missing" => true,
            "fallback" => true,
            "auto replace" => [],
        ],

    /** Loaded from: /storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/configs/system/router.config.php **/
    "router" => 
        [
            "{:id}" => "([0-9\-]+)",
            "{:uid}" => "([a-zA-Z0-9\-\.]+)",
            "{:user}" => "([a-z0-9\-\.]+)",
            "{:str}" => "([a-zA-Z]+)",
            "{:any}" => "([a-zA-Z0-9\-\.\?\(\)\[\]\&]+)",
        ],

    /** Loaded from: /storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/configs/system/system.config.php **/
    "system" => 
        [
            "default module" => "homepage",
            "time zone" => "Asia/Jakarta",
            "time shift" => 0,
        ],

    /** Loaded from: /storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/configs/system/view.config.php **/
    "view" => 
        [
            "theme" => "dark",
            "extension" => ".tpl",
            "check file before render" => true,
            "compression" => 
                [
                    "html" => true,
                    "css" => true,
                    "js" => true,
                ],
            "smarty_config" => 
                [
                    "left_delimiter" => "{",
                    "right_delimiter" => "}",
                    "escape_html" => false,
                    "caching" => false,
                    "cache_lifetime" => 10,
                    "config_dir" => "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/configs/shared/",
                    "template_dir" => "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/",
                    "plugins_dir" => "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/plugins/",
                    "cache_dir" => "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/data/cache/templates/cache/",
                    "compile_dir" => "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/data/cache/templates/compiled/",
                    "compile_id" => false,
                    "cache_id" => false,
                    "force_cache" => false,
                    "force_compile" => false,
                    "compile_check" => true,
                    "compile_locking" => false,
                    "config_overwrite" => false,
                    "use_sub_dirs" => true,
                    "debugging" => false,
                    "error_reporting" => 1,
                    "allow_php_templates" => false,
                    "merge_compiled_includes" => true,
                    "auto_literal" => false,
                    "literals" => [],
                    "config_vars" => [],
                    "registered_objects" => [],
                    "registered_classes" => [],
                    "registered_filters" => [],
                    "autoload_filters" => [],
                    "default_modifiers" => [],
                ],
            "module_use_own_configs" => true,
            "module_use_own_views" => true,
            "module_use_own_plugins" => true,
            "module_use_own_assets" => true,
        ],

];

