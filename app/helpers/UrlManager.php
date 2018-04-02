<?php
namespace StudentList\Helpers;

class UrlManager
{
    public function getUri()
    {
        return trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH),"/");
    }

    public function getRequestMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }
}