<?php
namespace Core;

class Request
{
    public static function uri ()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function method ()
    {
        //GET - POST
        return $_SERVER['REQUEST_METHOD'];
    }
}