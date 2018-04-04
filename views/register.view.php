<?php require_once "partials/header.php" ?>
<form method="post" action="register">
    <label for="fname">Имя:</label>
    <input type="text" id="fname" name="name"><br>
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname"><br>
    <label for="birth_year">Год рождения:</label>
    <input type="number" min="1900" max="2008" step="1" id="birth_year" name="birth_year" value="2000"><br>
    <input type="radio" id="gender_choice1" name="gender" value="m"><label for="gender_choice1">Мужчина</label>
    <input type="radio" id="gender_choice2" name="gender" value="f"><label for="gender_choice2">Женщина</label><br>
    <label for="group_number">Номер группы:</label>
    <input type="text" id="group_number" name="group_number"><br>
    <label for="exam_score">Количество баллов ЕГЭ:</label>
    <input type="number" id="exam_score" name="exam_score" min="0" max="300"><br>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email"><br>
    <input type="radio" id="country_choice1" name="residence" value="resident"><label for="country_choice1">Местный</label>
    <input type="radio" id="country_choice2" name="residence" value="nonresident"><label for="country_choice2">Иногородний</label><br><br>

    <input type="submit" name="submit" value="Отправить">
</form>
<?php require_once "partials/footer.php" ?>