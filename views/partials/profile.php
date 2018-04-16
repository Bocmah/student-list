<div class="profile-info uk-card uk-card-body uk-card-default uk-width-1-2@m uk-align-center">
    <h3 class="profile-info__fullname uk-card-title">
        <?php echo htmlspecialchars($values["name"] . " " . $values["surname"], ENT_QUOTES) ?>
    </h3>
    <p class="profile-info__field">
        <span class="uk-text-bold">Пол</span>: <?php echo $values["gender"] === "m" ? "мужской" : "женский" ?>
    </p>
    <p class="profile-info__field">
        <span class="uk-text-bold">Год рождения</span>: <?php echo htmlspecialchars($values["birth_year"], ENT_QUOTES) ?>
    </p>
    <p class="profile-info__field">
        <span class="uk-text-bold">Местоположение</span>: <?php echo $values["residence"] === "resident" ? "местный" : "иногородний" ?>
    </p>
    <p class="profile-info__field">
        <span class="uk-text-bold">Email</span>: <?php echo htmlspecialchars($values["email"],ENT_QUOTES) ?>
    </p>
    <p class="profile-info__field">
        <span class="uk-text-bold">Группа</span>: <?php echo htmlspecialchars($values["group_number"],ENT_QUOTES) ?>
    </p>
    <p class="profile-info__field">
        <span class="uk-text-bold">Количество баллов ЕГЭ</span>: <?php echo htmlspecialchars($values["exam_score"], ENT_QUOTES) ?>
    </p>
    <p>
        <a href="profile/edit">Редактировать профиль</a>
    </p>
</div>
