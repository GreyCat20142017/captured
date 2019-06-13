<div class="my-3 text-center">

    <?php if ($active_page <= 1): ?>
        <span class="btn btn-light">
            Предыдущая страница
        </span>
    <?php else: ?>
        <a class="btn btn-indigo"
           href="<?= rebuild_query_string($active_script, $active_query, 'page', $active_page - 1); ?>">
            Предыдущая страница
        </a>
    <?php endif; ?>

    <span class="btn btn-light" title="Текущая страница">
            Страница № <?= $active_page; ?>
    </span>

    <?php if ($active_page >= $page_count): ?>
        <span class="btn btn-light"> Следующая страница</span>
    <?php else: ?>
        <a class="btn btn-indigo"
           href="<?= rebuild_query_string($active_script, $active_query, 'page', $active_page + 1); ?>">
            Следующая страница
        </a>
    <?php endif; ?>

</div>