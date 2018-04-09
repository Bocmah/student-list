<?php
namespace StudentList\Helpers;

class Pager
{
    /**
     * @param int $page
     * @param int $perPage
     * @return int
     */
    public function calculatePositioning(int $page, int $perPage): int
    {
        return $page > 1 ? ($page * $perPage) - $perPage : 0;
    }

    /**
     * @param int $records
     * @param int $perPage
     * @return float
     */
    public function calculateTotalPages(int $records, int $perPage): float
    {
        return ceil($records/$perPage);
    }
}