<?php
namespace StudentList\Entities;

class Student
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $groupNumber;

    /**
     * @var string
     */
    private $email;

    /**
     * @var int
     */
    private $examScore;

    /**
     * @var int
     */
    private $birthYear;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $residence;

    /**
     * @var string
     */
    private $hash;

    const GENDER_MALE = "m";
    const GENDER_FEMALE = "f";
    const RESIDENCE_RESIDENT = "resident";
    const RESIDENCE_NONRESIDENT = "nonresident";

    /**
     * Student constructor.
     * @param string $name
     * @param string $surname
     * @param string $groupNumber
     * @param string $email
     * @param int $examScore
     * @param int $birthYear
     * @param string $gender
     * @param string $residence
     */
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getGroupNumber(): string
    {
        return $this->groupNumber;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getExamScore(): int
    {
        return $this->examScore;
    }

    /**
     * @return int
     */
    public function getBirthYear(): int
    {
        return $this->birthYear;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getResidence(): string
    {
        return $this->residence;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     *
     * @return void
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }
}