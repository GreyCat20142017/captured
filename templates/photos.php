<article class="feed__post post post-photo">
    <?= $post_header_content; ?>
    <div class="post__main">
        <h2><?= get_pure_data($post, 'title'); ?></h2>
        <div class="post-photo__image-wrapper">
            <img src="<?= get_pure_data($post, 'filename'); ?>" alt="Фото от пользователя" width="760" height="396">
        </div>
    </div>
    <?= $post_footer_content; ?>
</article>