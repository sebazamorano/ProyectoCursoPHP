<?php
include 'vendor/autoload.php';
try {
    Blog\Route::load()
        ->execute(\Blog\Request::uri(), \Blog\Request::method());
} catch (Exception $ex) {
    echo 'Hay un error en :' . $ex->getFile();
    echo $ex->getMessage();
}





