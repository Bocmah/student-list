<?php
namespace StudentList\Entities;

class Student
{
    private $name;
    private $surname;
    private $groupNumber;
    private $email;
    private $examScore;
    private $birthYear;
    private $gender;
    private $residence;

    public function __construct($name,
                                $surname,
                                $groupNumber,
                                $email,
                                $examScore,
                                $birthYear,
                                $gender,
                                $residence)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->groupNumber = $groupNumber;
        $this->email = $email;
        $this->examScore = $examScore;
        $this->birthYear = $birthYear;
        $this->gender = $gender;
        $this->residence = $residence;
    }

    const GENDER_MALE = "m";
    const GENDER_FEMALE = "f";
    const RESIDENCE_RESIDENT = "resident";
    const RESIDENCE_NONRESIDENT = "nonresident";

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getExamScore()
    {
        return $this->examScore;
    }

    /**
     * @return mixed
     */
    public function getBirthYear()
    {
        return $this->birthYear;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getResidence()
    {
        return $this->residence;
    }
}