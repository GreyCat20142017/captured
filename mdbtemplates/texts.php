<div class="mb-2 <?= $classname; ?>">
    <article class="card p-4 w-100">
        <?= $post_header_content ?? ''; ?>
        <div
            class="mdb-color-text font-weight-bold text-center z-depth-1 d-flex flex-column align-items-center justify-content-center heavy-rain-gradient p-5">
            <h2 class="px-2 w-100 h3-responsive"><?= get_pure_data($post, 'title'); ?></h2>
            <?php if (mb_strlen(trim(get_pure_data($post, 'text')), 'utf-8') > MAX_TEXT_LENGTH): ?>
                <p class="mt-3 mb-5 w-100 px-2"><?= mb_substr(get_pure_data($post, 'text'), 0, MAX_TEXT_LENGTH,
                        'utf-8') . '...'; ?></p>
                <a class=""
                   href="post_details.php?post=<?= get_pure_data($post, 'post_id'); ?>"
                   title="Открыть страницу публикации">
                    Читать далее
                </a>
            <?php else: ?>
                <p class="w-100 px-2"><?= get_pure_data($post, 'text'); ?></p>
            <?php endif; ?>
        </div>
        <?= $post_footer_content ?? ''; ?>
    </article>
</div>