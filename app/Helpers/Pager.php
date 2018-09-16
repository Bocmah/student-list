<?php
namespace StudentList\Helpers;

class Pager
{
    /**
     * Calculates offset for DB query based on the current page
     *
     * @param int $page
     * @param int $perPage
     *
     * @return int
     */
    public function calculatePositioning(int $page, int $perPage): int
    {
        return $page > 1 ? ($page * $perPage) - $perPage : 0;
    }

    /**
     * Calculates how many pages are needed to display $records
     *
     * @param int $records
     * @param int $perPage
     *
     * @return float
     */
    public function calculateTotalPages(int $records, int $perPage): float
    {
        return ceil($records/$perPage);
    }

    /**
     * Calculates starting link from which pagination links will be printed out
     *
     * @param int $page
     * @param int $links
     *
     * @return int
     */
    public function calculateStartingPoint(int $page, int $links = 5): int
    {
        return ($page - $links > 0) ? $page - $links : 1;
    }

    /**
     * Calculates the last link which will be printed out
     *
     * @param int $page
     * @param int $totalPages
     * @param int $links
     *
     * @return int
     */
    public function calculateEndingPoint(int $page, int $totalPages, int $links = 5): int
    {
        return ($page + $links < $totalPages) ? $page + $links : $totalPages;
    }
}