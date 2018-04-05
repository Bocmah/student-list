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
    private $hash;

    const GENDER_MALE = "m";
    const GENDER_FEMALE = "f";
    const RESIDENCE_RESIDENT = "resident";
    const RESIDENCE_NONRESIDENT = "nonresident";

    public function __construct(string $name,
                                string $surname,
                                string $groupNumber,
                                string $email,
                                int $examScore,
                                int $birthYear,
                                string $gender,
                                string $residence)
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

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash)
    {
        $this->hash = $hash;
    }
}