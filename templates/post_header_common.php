<header class="post__header post__author">
    <a class="post__author-link" href="profile.php?user=<?= get_pure_data($post, 'user_id'); ?>" title="Автор">
        <div class="post__avatar-wrapper">
            <img class="post__author-avatar"  width="60" height="60" src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>"
                 alt="Аватар пользователя">
        </div>
        <div class="post__info">
            <b class="post__author-name"><?= get_pure_data($post, 'username'); ?></b>
            <span class="post__time"><?= get_pure_data($post, 'creation_date'); ?></span>
        </div>
    </a>
</header>