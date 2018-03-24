<?php

class StudentValidator
{
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
        } elseif ( !(preg_match($pattern,$name)) ) {
            return "Имя должно содержать только русские буквы и начинаться с заглавной буквы.";
        }

        return null;
    }

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
        } elseif ( !(preg_match($pattern,$surname)) ) {
            return "Фамилия должна содержать только русские буквы и начинаться с заглавной буквы.";
        }

        return null;
    }

    private function validateGender(string $gender)
    {
        if ($gender !== Student::getConstant("GENDER_MALE") || $gender !== Student::getConstant("GENDER_FEMALE")) {
            return "Вы не выбрали свой пол.";
        }

        return null;
    }

    private function validateGroupNumber(string $groupNumber)
    {
        $groupNumberLength = mb_strlen($groupNumber);
        // Pattern for group number validation
        $pattern = "/^[а-яёА-ЯЁ0-9]+$/u";

        if ($groupNumberLength === 0) {
            return "Вы не заполнили обязательное поле \"Номер группы\"";
        } elseif ($groupNumberLength < 2 || $groupNumberLength > 5) {
            return "Количество символов в номере группы должно находиться в интервале от 2 до 5, а Вы ввели {$groupNumberLength}";
        } elseif ( !(preg_match($pattern, $groupNumber)) ) {
            return "Номер группы может содержать только цифры и русские буквы.";
        }

        return null;
    }

    private function validateExamScore(int $examScore)
    {
        if ($examScore < 0) {
            return "Баллы ЕГЭ не могут быть отрицательным числом.";
        } elseif ($examScore > 300) {
            return "Сумма баллов ЕГЭ не может превышать 300.";
        }

        return null;
    }
}