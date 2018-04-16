<?php use StudentList\Helpers\UrlManager; ?>
<table class="uk-table uk-table-small uk-table-hover uk-table-divider students-table">
    <thead>
        <tr>
            <th><a href="?<?php echo htmlspecialchars(UrlManager::getSortingLink(
                    $page,
                    "name",
                    $order,
                    $direction,
                    $search
                ), ENT_QUOTES); ?>">Имя</a></th>
            <th><a href="?<?php echo htmlspecialchars(UrlManager::getSortingLink(
                    $page,
                    "surname",
                    $order,
                    $direction,
                    $search
                ), ENT_QUOTES); ?>">Фамилия</a></th>
            <th><a href="?<?php echo htmlspecialchars(UrlManager::getSortingLink(
                    $page,
                    "group_number",
                    $order,
                    $direction,
                    $search
                ), ENT_QUOTES); ?>">Номер группы</a></th>
            <th><a href="?<?php echo htmlspecialchars(UrlManager::getSortingLink(
                    $page,
                    "exam_score",
                    $order,
                    $direction,
                    $search
                ), ENT_QUOTES); ?>">Баллы ЕГЭ</a></th>
        </tr>
        </thead>
    <tbody>
        <?php foreach($students as $student): ?>
            <tr>
                <td><?php echo htmlspecialchars($student["name"], ENT_QUOTES) ?></td>
                <td><?php echo htmlspecialchars($student["surname"], ENT_QUOTES) ?></td>
                <td><?php echo htmlspecialchars($student["group_number"], ENT_QUOTES) ?></td>
                <td><?php echo htmlspecialchars($student["exam_score"], ENT_QUOTES) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


