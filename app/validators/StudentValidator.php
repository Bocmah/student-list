<?php
namespace StudentList\Validators;

use StudentList\AuthManager;
use StudentList\Entities\Student;
use StudentList\Database\StudentDataGateway;

class StudentValidator
{
    /**
     * @var StudentDataGateway
     */
    private $studentDataGateway;

    /**
     * @var AuthManager
     */
    private $authManager;

    /**
     * StudentValidator constructor.
     * @param StudentDataGateway $studentDataGateway
     * @param AuthManager $authManager
     */
    public function __construct(StudentDataGateway $studentDataGateway, AuthManager $authManager)
    {
        $this->studentDataGateway = $studentDataGateway;
        $this->authManager = $authManager;

    }

    /**
     * Returns an array of validation errors
     *
     * @param Student $student
     *
     * @return array
     */
    public function validateAllFields(Student $student)
    {
        $errors = array();

        $errors["name"] = $this->validateName($student->getName());
        $errors["surname"] = $this->validateSurname($student->getSurname());
        $errors["group_number"] = $this->validateGroupNumber($student->getGroupNumber());
        $errors["email"] = $this->validateEmail($student->getEmail());
        $errors["exam_score"] = $this->validateExamScore($student->getExamScore());
        $errors["birth_year"] = $this->validateBirthYear($student->getBirthYear());
        $errors["gender"] = $this->validateGender($student->getGender());
        $errors["residence"] = $this->validateResidence($student->getResidence());

        // Removing correct fields from the errors array
        return array_filter($errors, function($value) {
            return $value !== true;
        });
    }

    /**
     * @param string $name
     *
     * @return bool|string
     */
    private function validateName(string $name)
    {
        $nameLength = mb_strlen($name);
        // Pattern for name validation
        $pattern = "/^[А-ЯЁ]([\s\-\']?[а-яёА-ЯЁ][\s\-\']?)*$/u";

        if ($nameLength === 0) {
            return "Вы не заполнили обязательное поле \"Имя\".";
        }
        elseif ($nameLength > 50) {
            return "Имя не должно содержать более 50 символов, а Вы ввели {$nameLength}.";
        } elseif (!(preg_match($pattern,$name))) {
            return "Имя должно содержать только русские буквы и начинаться с заглавной буквы.";
        }

        return true;
    }

    /**
     * @param string $surname
     *
     * @return bool|string
     */
    private function validateSurname(string $surname)
    {
        $surnameLength = mb_strlen($surname);
        // Pattern for surname validation
        $pattern = "/^[А-ЯЁ]([\s\-\']?[а-яёА-ЯЁ][\s\-\']?)*$/u";

        if ($surnameLength === 0) {
            return "Вы не заполнили обязательное поле \"Фамилия\".";
        }
        elseif ($surnameLength > 50) {
            return "Фамилия не должна содержать более 50 символов, а Вы ввели {$surnameLength}.";
        } elseif (!(preg_match($pattern,$surname))) {
            return "Фамилия должна содержать только русские буквы и начинаться с заглавной буквы.";
        }

        return true;
    }

    /**
     * @param string $gender
     *
     * @return bool|string
     */
    private function validateGender(string $gender)
    {
        if ($gender !== Student::GENDER_MALE && $gender !== Student::GENDER_FEMALE) {
            return "Вы не выбрали свой пол.";
        }

        return true;
    }

    /**
     * @param string $groupNumber
     *
     * @return bool|string
     */
    private function validateGroupNumber(string $groupNumber)
    {
        $groupNumberLength = mb_strlen($groupNumber);
        // Pattern for group number validation
        $pattern = "/^[а-яёА-ЯЁ0-9]+$/u";

        if ($groupNumberLength === 0) {
            return "Вы не заполнили обязательное поле \"Номер группы\"";
        } elseif ($groupNumberLength < 2 || $groupNumberLength > 5) {
            return "Количество символов в номере группы должно находиться
                    в интервале от 2 до 5, а Вы ввели {$groupNumberLength}.";
        } elseif ( !(preg_match($pattern, $groupNumber)) ) {
            return "Номер группы может содержать только цифры и русские буквы.";
        }

        return true;
    }

    /**
     * @param int $examScore
     *
     * @return bool|string
     */
    private function validateExamScore(int $examScore)
    {
        if ($examScore < 50 || $examScore > 300) {
            return "Баллы ЕГЭ должны находиться в интервале от 50 до 300 включительно.";
        }
        return true;
    }

    /**
     * @param string $email
     *
     * @return bool|string
     */
    private function validateEmail(string $email)
    {
        $isAuth = $this->authManager->checkIfAuthorized();

        if (mb_strlen($email) === 0) {
            return "Вы не заполнили обязательное поле \"E-mail\".";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Validating email with the built-in function "filter_var"
            return "E-mail должен быть в формате \"example@domain.com\".";
        }

        if ($this->studentDataGateway->checkIfEmailExists($email)) {
            return $isAuth ? $this->validateEmailIfAuth($email) :
                             "Такой e-mail уже существует.";
        }

        return true;
    }

    /**
     * Validates e-mail if user is editing his/her profile
     *
     * @param string $email
     * @return bool|string
     */
    private function validateEmailIfAuth(string $email)
    {
        $currentStudentEmail = $this->studentDataGateway->getStudentByHash(
            $this->authManager->getHash()
        )["email"];

        return ($email === $currentStudentEmail) ? true : "Такой e-mail уже существует";
    }

    /**
     * @param int $birthYear
     *
     * @return bool|string
     */
    private function validateBirthYear(int $birthYear)
    {
        if ($birthYear < 1910 || $birthYear > 2008) {
            return "Год рождения должен находиться в интервале от 1910 до 2008 включительно.";
        }

        return true;
    }

    /**
     * @param string $residence
     *
     * @return bool|string
     */
    private function validateResidence(string $residence)
    {
        if ($residence !== Student::RESIDENCE_RESIDENT &&
            $residence !== Student::RESIDENCE_NONRESIDENT) {
            return "Вы не выбрали свое местоположение.";
        }

        return true;
    }
}