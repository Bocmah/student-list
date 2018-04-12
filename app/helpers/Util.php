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
}
