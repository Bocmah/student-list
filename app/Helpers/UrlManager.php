<?php
namespace StudentList\Helpers;

class UrlManager
{
    /**
     * Returns parsed URI
     *
     * @return array
     */
    public function getUri()
    {
        return trim(
            parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH),"/"
        );
    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    /**
     * Builds link to the particular page
     *
     * @param string $order Order passed into view
     * @param string $direction
     * @param string|null $search
     * @param int|null $page Current page
     *
     * @return string
     */
    public static function getPaginationLink(string $order, string $direction, string $search = null, int $page = null)
    {
        return http_build_query(array(
                "page" => $page,
                "order" => $order,
                "direction" => $direction,
                "search" => $search
            )
        );
    }

    /**
     * Builds link for ordering by particular field
     *
     * @param int $page Current page
     * @param string $requiredOrder Order which link implies (i.e. "Exam score" table header will have exam_score order)
     * @param string $currentOrder Order variable passed into view from a query string
     * @param string $direction Sorting direction
     * @param string|null $search Searching keyword passed into view
     *
     * @return string
     */
    public static function getSortingLink(int $page,
                                          string $requiredOrder,
                                          string $currentOrder,
                                          string $direction,
                                          string $search = null)
    {
        // If the direction was set to DESC change it to ASC
        // Otherwise set it to DESC
        if ($requiredOrder === $currentOrder && $direction === "DESC") {
            $direction = "ASC";
        } else {
            $direction = "DESC";
        }

        return http_build_query(array(
           "page" => $page,
           "order" => $requiredOrder,
           "direction" => $direction,
           "search" => $search
        ));
    }

    /**
     * Redirects to the $path and terminates the current script
     *
     * @param string $path
     *
     * @return void
     */
    public function redirect(string $path): void
    {
        header("Location: {$path}");
        die();
    }
}
