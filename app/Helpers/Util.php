<?php
namespace StudentList\Helpers;

use StudentList\Entities\Student;

class Util
{
    /**
     * @param int $length
     *
     * @return string
     */
    public function generateHash(int $length = 32)
    {
        if ($length <= 8) {
            $length = 32;
        }
        return bin2hex(random_bytes($length));
    }

    /**
     * @param array $values
     *
     * @return Student
     */
    public function createStudent(array $values)
    {
        $student = new Student(
            $values["name"],
            $values["surname"],
            $values["group_number"],
            $values["email"],
            $values["exam_score"],
            $values["birth_year"],
            $values["gender"],
            $values["residence"]
        );

        return $student;
    }

    /**
     * Shows arrow near the field which is currently sorted
     *
     * @param string $requiredOrder Order which field implies (i.e. "Exam score" table header will have exam_score order)
     * @param string $currentOrder Order variable passed into view from a query string
     * @param string $direction Sorting direction
     *
     * @return void
     */
    public static function showSortingArrow(string $requiredOrder,
                                            string $currentOrder,
                                            string $direction): void
    {
        if ($requiredOrder === $currentOrder && $direction === "DESC") {
            echo "<span uk-icon='icon: arrow-down'></span>";
        } elseif ($requiredOrder === $currentOrder && $direction === "ASC") {
            echo "<span uk-icon='icon: arrow-up'></span>";
        }
    }
}
