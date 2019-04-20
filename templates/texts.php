<article class="feed__post post post-text">
    <?= $post_header_content; ?>
    <div class="post__main">
        <h2><?= get_pure_data($post, 'title'); ?></h2>
        <p>
            <?= mb_substr(get_pure_data($post, 'text'), 0, MAX_TEXT_LENGTH, 'utf-8') . '...'; ?>
        </p>
        <a class="post-text__more-link <?= count(get_pure_data($post,
            'text')) < MAX_TEXT_LENGTH ? '' : ' visually-hidden '; ?>"
           href="#">Читать далее
        </a>
    </div>
    <?= $post_footer_content; ?>
</article>