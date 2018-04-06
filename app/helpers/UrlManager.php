<?php
namespace StudentList\Helpers;

class UrlManager
{
    public function getUri()
    {
        $parsedUri = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH),"/");
        return explode("/", $parsedUri);
    }

    public function getRequestMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }
}
