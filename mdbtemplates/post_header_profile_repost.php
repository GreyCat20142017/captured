<header class="p-2">

    <a class="d-flex justify-content-start align-items-center"
       href="profile.php?user=<?= get_pure_data($post, 'user_id'); ?>" title="Автор">
        <div class="post__avatar-wrapper post__avatar-wrapper--repost">
            <span class="btn-lg position-absolute indigo-text m-n4" title="Репост">
                <?= get_inline_svg('sync-alt', 30, 30 ,"grey", "grey"); ?>
            </span>
            <img class="rounded-circle" width="60" height="60" src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>"
                 alt="Аватар пользователя">

        </div>
        <div class="ml-2 mdb-color-text">
            <b class="post__author-name"><?= get_pure_data($post, 'username'); ?></b>
            <time class="post__time" datetime="2019-03-30T14:31"
                  title="<?= get_pure_data($post, 'update_date'); ?>">
                <?= get_time_ago(get_pure_data($post, 'update_date')); ?>
            </time>
        </div>
    </a>

</header>

