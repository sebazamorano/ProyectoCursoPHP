<?php
namespace Blog;

class Request
{
    public static function uri ()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public static function method ()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}