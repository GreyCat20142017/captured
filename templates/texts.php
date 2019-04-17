<article class="feed__post post post-text">
    <header class="post__header post__author">
        <a class="post__author-link" href="#" title="Автор">
            <div class="post__avatar-wrapper">
                <img class="post__author-avatar" src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>"
                     alt="Аватар пользователя">
            </div>
            <div class="post__info">
                <b class="post__author-name"><?= get_pure_data($post, 'username'); ?></b>
                <span class="post__time"><?= get_pure_data($post, 'creation_date'); ?></span>
            </div>
        </a>
    </header>
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