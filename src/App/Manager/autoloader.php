<?php

spl_autoload_register('autoload');

function autoload($class_name)
{

    $class_name = str_replace('\\', '/', $class_name);

    $file_name = $_SERVER['DOCUMENT_ROOT'] . '/../src/' . $class_name . '.php';

    if (file_exists($file_name)) {
        require($file_name);
    }

}








