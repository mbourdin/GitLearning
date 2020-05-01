<?php
spl_autoload_register(function ($className) {
    $directories=[
        "",
        "\\classes",
        "\\classes\\repositories",
        "\\entity","\\controllers",
    ];
    foreach ($directories as $directory)
    {
        $file = __DIR__ .$directory. '\\' . $className . '.php';
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
//        echo "<br>trying to autoload ".$file;
        if (file_exists($file)) {
            require_once $file;
//            echo ": success"."\n";
            return true;
        }
    }
    return false;
});