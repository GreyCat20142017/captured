<header class="p-2">

    <a class="d-flex justify-content-start align-items-center"
       href="profile.php?user=<?= get_pure_data($post, 'user_id'); ?>" title="Автор">
        <div class="post__avatar-wrapper post__avatar-wrapper--repost position-relative">
            <span class="btn-lg position-absolute mdb-color-textm-n4 position-absolute" style="left: -16px; top: -22px" title="Репост">
                <?= get_inline_svg('sync-alt', 20, 20 ,"#59698d", "#59698d"); ?>
            </span>
            <img class="rounded-circle" width="50" height="50" src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>"
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

