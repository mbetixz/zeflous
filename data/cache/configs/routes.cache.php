<?php

/**
** APP Version  : 1.0.01
**
** Filename     : routes.cache.php
** Created Time : Tuesday, 10 November 2020 05:56:15
** Expires Time : Tuesday, 17 November 2020 05:56:15
** Beautyfier   : ENABLE
**
**/
return 
    [

    /** Loaded from: /storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/modules/auth/configs/routes.config.php **/
    "/auth" => 
        [
            "module" => "auth",
            "controller" => 
                [
                    "class" => "Controller\Auth\Login",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

    "/auth/login" => 
        [
            "module" => "auth",
            "controller" => 
                [
                    "class" => "Controller\Auth\Login",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

    "/auth/register" => 
        [
            "module" => "auth",
            "controller" => 
                [
                    "class" => "Controller\Auth\Register",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

    "/auth/recovery" => 
        [
            "module" => "auth",
            "controller" => 
                [
                    "class" => "Controller\Auth\Recovery",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

    /** Loaded from: /storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/modules/forum/configs/routes.config.php **/
    "/forum" => 
        [
            "module" => "forum",
            "controller" => 
                [
                    "class" => "Controller\Forum\Forum",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

    "/forum/section/([0-9\-]+)/([a-zA-Z]+)" => 
        [
            "module" => "forum",
            "controller" => 
                [
                    "class" => "Controller\Forum\Section",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

    "/forum/threads/([0-9\-]+)/([a-zA-Z]+)" => 
        [
            "module" => "forum",
            "controller" => 
                [
                    "class" => "Controller\Forum\Threads",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

    /** Loaded from: /storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/modules/homepage/configs/routes.config.php **/
    "/" => 
        [
            "module" => "homepage",
            "controller" => 
                [
                    "class" => "Controller\Homepage\Home",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

    /** Loaded from: /storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/modules/user/configs/routes.config.php **/
    "/user" => 
        [
            "module" => "user",
            "controller" => 
                [
                    "class" => "Controller\User\User",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

    "/user/([a-zA-Z0-9\-\.]+)" => 
        [
            "module" => "user",
            "controller" => 
                [
                    "class" => "Controller\User\Profile",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

    "/user/([0-9\-]+)" => 
        [
            "module" => "user",
            "controller" => 
                [
                    "class" => "Controller\User\Profile",
                    "method" => "index",
                ],
            "method" => 
                [
                    0 => "GET",
                    1 => "POST",
                ],
        ],

];

