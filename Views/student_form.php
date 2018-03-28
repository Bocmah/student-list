<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="fname">Имя:</label>
    <input type="text" id="fname" name="fname"><br>
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname"><br>
    <label for="birth_year">Год рождения:</label>
    <input type="number" min="1900" max="2008" step="1" id="birth_year" name="birth_year" value="2000"><br>
    <input type="radio" id="genderChoice1" name="gender" value="male"><label for="genderChoice1">Мужчина</label>
    <input type="radio" id="genderChoice2" name="gender" value="female"><label for="genderChoice2">Женщина</label><br>
    <label for="group-number">Номер группы:</label>
    <input type="text" id="group-number" name="group_number"><br>
    <label for="exam-score">Количество баллов ЕГЭ:</label>
    <input type="number" id="exam-score" name="exam_score" min="0" max="300"><br>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email"><br>
    <input type="radio" id="countryChoice1" name="residence" value="resident"><label for="countryChoice1">Местный</label>
    <input type="radio" id="countryChoice2" name="residence" value="nonresident"><label for="countryChoice2">Иногородний</label><br><br>

    <input type="submit" name="submit" value="Отправить">
</form>