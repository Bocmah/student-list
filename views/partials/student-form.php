<form method="post">
    <label for="fname">Имя:</label>
    <input type="text" id="fname" name="name"
           value="<?php echo isset($values["name"]) ?
               htmlspecialchars($values["name"], ENT_QUOTES) :
               ""; ?>"><br>
    <span class="error"><?php echo isset($errors["name"]) ? $errors["name"]."<br>" : ""; ?></span>
    <label for="surname">Фамилия:</label>
    <input type="text" id="surname" name="surname"
           value="<?php echo isset($values["surname"]) ?
               htmlspecialchars($values["surname"], ENT_QUOTES) :
               ""; ?>"><br>
    <span class="error"><?php echo isset($errors["surname"]) ? $errors["surname"]."<br>" : ""; ?></span>
    <label for="birth_year">Год рождения:</label>
    <input type="number" min="1900" max="2008" step="1" id="birth_year" name="birth_year"
           value="<?php echo isset($values["birth_year"]) ?
               htmlspecialchars($values["birth_year"], ENT_QUOTES) :
               ""; ?>"><br>
    <span class="error"><?php echo isset($errors["birth_year"]) ? $errors["birth_year"]."<br>" : ""; ?></span>
    <input type="radio" id="gender_choice1" name="gender"
           value="m" <?php if(isset($values["gender"]) && $values["gender"] === "m") echo "checked"?>>
    <label for="gender_choice1">Мужчина</label>
    <input type="radio" id="gender_choice2" name="gender"
           value="f" <?php if(isset($values["gender"]) && $values["gender"] === "f") echo "checked"?>>
    <label for="gender_choice2">Женщина</label><br>
    <span class="error"><?php echo isset($errors["gender"]) ? $errors["gender"]."<br>" : ""; ?></span>
    <label for="group_number">Номер группы:</label>
    <input type="text" id="group_number" name="group_number"
           value="<?php echo isset($values["group_number"]) ?
               htmlspecialchars($values["group_number"], ENT_QUOTES) :
               ""; ?>"><br>
    <span class="error"><?php echo isset($errors["group_number"]) ? $errors["group_number"]."<br>" : ""; ?></span>
    <label for="exam_score">Количество баллов ЕГЭ:</label>
    <input type="number" id="exam_score" name="exam_score" min="0" max="300"
           value="<?php echo isset($values["exam_score"]) ?
               htmlspecialchars($values["exam_score"],ENT_QUOTES) :
               ""; ?>"><br>
    <span class="error"><?php echo isset($errors["exam_score"]) ? $errors["exam_score"]."<br>" : ""; ?></span>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email"
           value="<?php echo isset($values["email"]) ?
               htmlspecialchars($values["email"], ENT_QUOTES) :
               ""; ?>"><br>
    <span class="error"><?php echo isset($errors["email"]) ? $errors["email"]."<br>" : ""; ?></span>
    <input type="radio" id="country_choice1" name="residence" value="resident"
        <?php if(isset($values["residence"]) && $values["residence"] === "resident") echo "checked"?>>
    <label for="country_choice1">Местный</label>
    <input type="radio" id="country_choice2" name="residence" value="nonresident"
        <?php if(isset($values["residence"]) && $values["residence"] === "nonresident") echo "checked"?>>
    <label for="country_choice2">Иногородний</label><br>
    <span class="error"><?php echo isset($errors["residence"]) ? $errors["residence"]."<br>" : ""; ?></span><br>

    <input type="submit" name="submit" value="Отправить">
</form>