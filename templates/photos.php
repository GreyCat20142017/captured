<article class="feed__post post post-photo">
    <header class="post__header post__author">
        <a class="post__author-link" href="#" title="Автор">
            <div class="post__avatar-wrapper">
                <img class="post__author-avatar" src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>"
                     alt="Аватар пользователя"
                     width="60" height="60">
            </div>
            <div class="post__info">
                <b class="post__author-name"><?= get_pure_data($post, 'username'); ?></b>
                <span class="post__time"><?= get_pure_data($post, 'creation_date'); ?></span>
            </div>
        </a>
    </header>
    <div class="post__main">
        <h2>Наконец, обработала фотки!</h2>
        <div class="post-photo__image-wrapper">
            <img src="<?= get_pure_data($post, 'filename'); ?>" alt="Фото от пользователя" width="760" height="396">
        </div>
    </div>
    <?= $post_footer_content; ?>
</article>