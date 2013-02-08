<?php

/**
 * Use the current working directory as base for autoloading the required classes
 */
spl_autoload_register (function ($class) {
    $sVendorDir = dirname(__DIR__);
    $file = str_replace ('\\', DIRECTORY_SEPARATOR, ltrim ($class, '\\')) . '.php';
    if ($sVendorDir . DIRECTORY_SEPARATOR . $file)
    {
        require_once($sVendorDir .DIRECTORY_SEPARATOR .$file);
        return true;
    }
    return false;
});

/**
 * Create a class alias here so that \MimeMapper\Mime\MimeMapper is just called as MimeMapper
 * This would save the developers time
 */
class_alias ('\MimeMapper\Mime\MimeMapper', 'MimeMapper');