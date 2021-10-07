<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className){

    $path = "../";
    $className = str_replace("\\","/", strtolower($className));
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath)) {
        return false;
    }

    include $fullPath;

}