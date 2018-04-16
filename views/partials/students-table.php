<?php use StudentList\Helpers\UrlManager; ?>
<?php if($search): ?>
    <p>По вашему запросу "<?php echo htmlspecialchars($search, ENT_QUOTES); ?>"
        найдено <?php echo htmlspecialchars($rowCount, ENT_QUOTES); ?> результатов.
        <a href="/">Посмотреть всех студентов.</a></p>
<?php endif; ?>
<div class="uk-container">
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
    <ul class="uk-pagination uk-flex-center">
        <?php if ($page > 1): ?>
            <li><a href="?<?php echo htmlspecialchars(UrlManager::getPaginationLink(
                    $order,
                    $direction,
                    $search,
                    $page - 1
                ), ENT_QUOTES); ?>"><span uk-pagination-previous></span></a></li>
        <?php else: ?>
            <li class="uk-disabled"><a><span uk-pagination-previous></span></a></li>
        <?php endif; ?>
        <?php for($i = 1; $i <= $totalPages; $i++): ?>
            <?php if($i === $page): ?>
                <li class="uk-active"><span class="uk-text-primary"><?php echo $i; ?></span></li>
            <?php else: ?>
                <li>
                    <a href="?page=<?php echo "{$i}" . "&" . htmlspecialchars(UrlManager::getPaginationLink(
                            $order,
                            $direction,
                            $search
                        ), ENT_QUOTES); ?>"><?php echo $i; ?></a>
                </li>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if ($page < $totalPages): ?>
            <li><a href="?<?php echo htmlspecialchars(UrlManager::getPaginationLink(
                    $order,
                    $direction,
                    $search,
                    $page + 1
                ), ENT_QUOTES); ?>"><span uk-pagination-next></span></a></li>
        <?php else: ?>
            <li class="uk-disabled"><a><span uk-pagination-next></span></a></li>
        <?php endif; ?>
    </ul>
</div>
