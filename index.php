<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List </title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "You've submitted the form.";
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="fname">Имя:</label>
    <input type="text" id="fname" name="fname"><br>
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname"><br>
    <input type="radio" id="genderChoice1" name="gender" value="male"><label for="genderChoice1">Мужчина</label>
    <input type="radio" id="genderChoice2" name="gender" value="female"><label for="genderChoice2">Женщина</label><br>
    <label for="group-number">Номер группы:</label>
    <input type="text" id="group-number" name="group-number"><br>
    <label for="exam-score">Количество баллов ЕГЭ:</label>
    <input type="text" id="exam-score" name="exam-score"><br>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email"><br>
    <input type="radio" id="countryChoice1" name="gender" value="resident"><label for="countryChoice1">Местный</label>
    <input type="radio" id="countryChoice2" name="gender" value="nonresident"><label for="countryChoice2">Иногородний</label><br><br>

    <input type="submit" name="submit" value="Отправить">
</form>
</body>
</html>

