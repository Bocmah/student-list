<?php use StudentList\Helpers\UrlManager; ?>
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

    <?php if ($start > 1): ?>
        <li><a href="?<?php echo htmlspecialchars(UrlManager::getPaginationLink(
                $order,
                $direction,
                $search,
                1
            ), ENT_QUOTES); ?>">1</a></li>
        <li class="uk-disabled"><span>...</span></li>
    <?php endif; ?>

    <?php for($i = $start; $i <= $end; $i++): ?>
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

    <?php if ($end < $totalPages): ?>
        <li class="uk-disabled"><span>...</span></li>
        <li><a href="?<?php echo htmlspecialchars(UrlManager::getPaginationLink(
                $order,
                $direction,
                $search,
                $totalPages
            ), ENT_QUOTES); ?>"><?php echo htmlspecialchars($totalPages,ENT_QUOTES) ?></a></li>
    <?php endif; ?>

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