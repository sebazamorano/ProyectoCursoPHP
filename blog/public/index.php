<?php
include '../vendor/autoload.php';

    Core\Route::load()
        ->execute(\Core\Request::uri(), \Core\Request::method());





