<form method="post" class="student-form">
    <div class="student-form__field">
        <label for="fname" class="uk-form-label uk-text-bold">Имя</label>
        <div class="uk-form-controls">
            <input type="text" id="fname" name="name"
                   value="<?php echo isset($values["name"]) ?
                       htmlspecialchars($values["name"], ENT_QUOTES) :
                       ""; ?>" class="uk-input <?php if (isset($errors["name"])) echo "uk-form-danger" ?>">
        </div>
        <span class="error-text"><?php echo isset($errors["name"]) ? $errors["name"]."<br>" : ""; ?></span>
    </div>


    <div class="student-form__field student-form__field--margin-top">
        <label for="surname" class="uk-form-label uk-text-bold">Фамилия</label>
        <div class="uk-form-controls">
            <input type="text" id="surname" name="surname"
                   value="<?php echo isset($values["surname"]) ?
                       htmlspecialchars($values["surname"], ENT_QUOTES) :
                       ""; ?>" class="uk-input <?php if (isset($errors["surname"])) echo "uk-form-danger" ?>"><br>
        </div>
        <span class="error-text"><?php echo isset($errors["surname"]) ? $errors["surname"]."<br>" : ""; ?></span>
    </div>

    <div class="student-form__field student-form__field--margin-top">
        <label for="birth_year" class="uk-form-label uk-text-bold">Год рождения</label>
        <div class="uk-form-controls">
            <input type="number" min="1910" max="2008" step="1" id="birth_year" name="birth_year"
                   value="<?php echo isset($values["birth_year"]) ?
                       htmlspecialchars($values["birth_year"], ENT_QUOTES) :
                       ""; ?>" class="uk-input <?php if (isset($errors["birth_year"])) echo "uk-form-danger" ?>"><br>
        </div>
        <span class="error-text"><?php echo isset($errors["birth_year"]) ? $errors["birth_year"]."<br>" : ""; ?></span>
    </div>

    <div class="student-form__field student-form__field--margin-top">
        <div class="uk-form-label uk-text-bold">Пол</div>
        <div class="uk-form-controls">
            <label class="uk-form-label"><input type="radio" id="gender_choice1" name="gender"
                       value="m" <?php if(isset($values["gender"]) && $values["gender"] === "m") echo "checked"?> class="uk-radio">
                Мужчина</label><br>
            <label class="uk-form-label"><input type="radio" id="gender_choice2" name="gender"
                       value="f" <?php if(isset($values["gender"]) && $values["gender"] === "f") echo "checked"?> class="uk-radio">
                Женщина</label>
        </div>
        <span class="error-text"><?php echo isset($errors["gender"]) ? $errors["gender"]."<br>" : ""; ?></span>
    </div>

    <div class="student-form__field student-form__field--margin-top">
        <label class="uk-form-label uk-text-bold" for="group_number">Номер группы</label>
        <div class="uk-form-controls">
            <input type="text" id="group_number" name="group_number"
                       value="<?php echo isset($values["group_number"]) ?
                           htmlspecialchars($values["group_number"], ENT_QUOTES) :
                           ""; ?>" class="uk-input <?php if (isset($errors["group_number"])) echo "uk-form-danger" ?>"><br>
        </div>
        <span class="error-text"><?php echo isset($errors["group_number"]) ? $errors["group_number"]."<br>" : ""; ?></span>
    </div>

    <div class="student-form__field student-form__field--margin-top">
        <label class="uk-form-label uk-text-bold" for="exam_score">Количество баллов ЕГЭ</label>
        <div class="uk-form-controls">
            <input type="number" id="exam_score" name="exam_score" min="50" max="300"
                       value="<?php echo isset($values["exam_score"]) ?
                           htmlspecialchars($values["exam_score"],ENT_QUOTES) :
                           ""; ?>" class="uk-input <?php if (isset($errors["exam_score"])) echo "uk-form-danger" ?>"><br>
        </div>
        <span class="error-text"><?php echo isset($errors["exam_score"]) ? $errors["exam_score"]."<br>" : ""; ?></span>
    </div>

    <div class="student-form__field student-form__field--margin-top">
        <label class="uk-form-label uk-text-bold" for="email">E-mail:</label>
        <div class="uk-form-controls">
            <input type="email" id="email" name="email"
                       value="<?php echo isset($values["email"]) ?
                           htmlspecialchars($values["email"], ENT_QUOTES) :
                           ""; ?>" class="uk-input <?php if (isset($errors["email"])) echo "uk-form-danger" ?>"><br>
        </div>
        <span class="error-text"><?php echo isset($errors["email"]) ? $errors["email"]."<br>" : ""; ?></span>
    </div>

    <div class="student-form__field student-form__field--margin-top">
        <div class="uk-form-label uk-text-bold">Местоположение</div>
        <div class="uk-form-controls">
            <label class="uk-form-label"><input type="radio" id="country_choice1" name="residence" value="resident"
                    <?php if(isset($values["residence"]) && $values["residence"] === "resident") echo "checked"?> class="uk-radio">
                Местный</label><br>

            <label class="uk-form-label"><input type="radio" id="country_choice2" name="residence" value="nonresident"
                    <?php if(isset($values["residence"]) && $values["residence"] === "nonresident") echo "checked"?> class="uk-radio">
                Иногородний</label>
        </div>
        <span class="error-text"><?php echo isset($errors["residence"]) ? $errors["residence"]."<br>" : ""; ?></span>
    </div>
    <br>

    <button type="submit" name="submit" class="uk-button uk-button-primary">Отправить</button>
</form>

