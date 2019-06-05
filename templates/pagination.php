<div class="popular__page-links">

    <?php if ($active_page <= 1): ?>
        <span class="popular__page-link popular__page-link--prev button button--gray" style="display: none;">
            Предыдущая страница
        </span>
    <?php else: ?>
        <a class="popular__page-link popular__page-link--prev button button--gray"
           href="<?= rebuild_query_string($active_script, $active_query, 'page', $active_page - 1); ?>">
            Предыдущая страница
        </a>
    <?php endif; ?>

    <?php if ($active_page >= $page_count): ?>
        <span class="popular__page-link popular__page-link--prev button button--gray" style="display: none;">
            Следующая страница
        </span>
    <?php else: ?>
        <a class="popular__page-link popular__page-link--next button button--gray"
           href="<?= rebuild_query_string($active_script, $active_query, 'page', $active_page + 1); ?>">
            Следующая страница
        </a>
    <?php endif; ?>

</div>