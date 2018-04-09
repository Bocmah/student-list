<table>
    <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Номер группы</th>
            <th>Баллы ЕГЭ</th>
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
<div class="pagination">
    <?php for($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>
</div>