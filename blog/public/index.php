<?php
include '../vendor/autoload.php';
try {
    Core\Route::load()
        ->execute(\Core\Request::uri(), \Core\Request::method());
} catch (Exception $ex) {
    echo 'Hay un error en :' . $ex->getFile();
    echo $ex->getMessage();
}





