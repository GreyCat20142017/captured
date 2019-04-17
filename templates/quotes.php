<article class="feed__post post post-quote">
    <header class="post__header post__author">
        <a class="post__author-link" href="#" title="Автор">
            <div class="post__avatar-wrapper">
                <img class="post__author-avatar" src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>"
                     alt="Аватар пользователя">
            </div>
            <div class="post__info">
                <b class="post__author-name"><?= get_pure_data($post, 'username'); ?></b>
        </a>
    </header>
    <div class="post__main">
        <blockquote>
            <p>
                <?= get_pure_data($post, 'text'); ?>
            </p>
            <cite><?= get_pure_data($post, 'author'); ?></cite>
        </blockquote>
    </div>
    <?= $post_footer_content; ?>
</article>