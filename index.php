<?php

define('INDEX_DIR', dirname(__FILE__) . '/');

/*
 * Autoloader
 */

// Include everything from core because why dafuq not
foreach (glob("Application/*/") as $folder)
{
    foreach (glob($folder . "*.php") as $filename)
    {
        // The downside of this being that everything must be exactly one
        // folder deep :(. Eh, I'll figure it out later.
        echo $filename . "<br>\n";
        require $filename;
    }
}

function _load_app_class($class)
{
    foreach (glob("*/") as $folder)
    {
        foreach (glob($folder . "*.php") as $filename)
        {
            if (preg_match("~^/?" . $class . "*\\.php$~", $filename) === 1)
            {
                require $folder . $filename;
            }
        }
    }
}

spl_autoload_register('_load_app_class');

Handler::Handle($_SERVER['REQUEST_URI']);
