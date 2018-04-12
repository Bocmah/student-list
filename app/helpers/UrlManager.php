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

    public static function getPaginationLink(string $order, string $direction, string $search = null)
    {
        echo "&".http_build_query(array(
            "order" => $order,
            "direction" => $direction,
            "search" => $search
            )
        );
    }

    public function redirect(string $path)
    {
        header("Location: {$path}");
        die();
    }
}
