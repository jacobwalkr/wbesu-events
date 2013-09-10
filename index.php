<?php

define('INDEX_DIR', dirname(__FILE__) . '/');

foreach (glob('Core/*/') as $folder)
{
    foreach (glob($folder . '*.php') as $file)
    {
        require INDEX_DIR . $file;
    }
}

Handler::Handle($_SERVER['REQUEST_URI']);

?>
