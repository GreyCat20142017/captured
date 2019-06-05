<article class="<?= $classname; ?>__post post post-text">
    <?= $post_header_content ?? ''; ?>
    <div class="post__main">
        <h2><?= get_pure_data($post, 'title'); ?></h2>
        <?php if (mb_strlen(trim(get_pure_data($post, 'text')), 'utf-8') > MAX_TEXT_LENGTH): ?>
            <p><?= mb_substr(get_pure_data($post, 'text'), 0, MAX_TEXT_LENGTH, 'utf-8') . '...'; ?></p>
            <a class="post-text__more-link"
               href="post_details.php?post=<?= get_pure_data($post, 'post_id'); ?>"
               title="Открыть страницу публикации">
                Читать далее
            </a>
        <?php else: ?>
            <p><?= get_pure_data($post, 'text'); ?></p>
        <?php endif; ?>
    </div>
    <?= $post_footer_content ?? ''; ?>
</article>