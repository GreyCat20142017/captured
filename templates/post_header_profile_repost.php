<header class="post__header">
    <div class="post__author">
        <a class="post__author-link" href="profile.php?user=<?= get_pure_data($post, 'user_id'); ?>" title="Автор">
            <div class="post__avatar-wrapper post__avatar-wrapper--repost">
                <img class="post__author-avatar" width="60" height="60" src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>"
                     alt="Аватар пользователя">
            </div>
            <div class="post__info">
                <b class="post__author-name"><?= get_pure_data($post, 'username'); ?></b>
                <time class="post__time" datetime="2019-03-30T14:31"><?= get_pure_data($post, 'update_date'); ?></time>
            </div>
        </a>
    </div>
</header>