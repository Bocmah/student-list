<?php require_once "partials/header.php" ?>
<div class="profile-info">
    <h3 class="profile-info__fullname">
        <?php echo htmlspecialchars($values["name"] . " " . $values["surname"], ENT_QUOTES) ?>
    </h3>
    <p class="profile-info__field">
        Пол: <?php echo $values["gender"] === "m" ? "мужской" : "женский" ?>
    </p>
    <p class="profile-info__field">
        Год рождения: <?php echo htmlspecialchars($values["birth_year"], ENT_QUOTES) ?>
    </p>
    <p class="profile-info__field">
        Местоположение: <?php echo $values["residence"] === "resident" ? "местный" : "иногородний" ?>
    </p>
    <p class="profile-info__field">
        Email: <?php echo htmlspecialchars($values["email"],ENT_QUOTES) ?>
    </p>
    <p class="profile-info__field">
        Группа: <?php echo htmlspecialchars($values["group_number"],ENT_QUOTES) ?>
    </p>
    <p class="profile-info__field">
        Количество баллов ЕГЭ: <?php echo htmlspecialchars($values["exam_score"], ENT_QUOTES) ?>
    </p>
</div>
<?php require_once "partials/footer.php" ?>
