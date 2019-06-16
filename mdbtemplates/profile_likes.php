<section class="profile__likes tabs__content tabs__content--active">
    <h2 class="visually-hidden">Лайки</h2>
    <ul class="profile__likes-list list-unstyled p-2">
        <?php foreach ($likes as $like): ?>
            <li class="p-3 d-flex shadow mb-2 align-items-center">
                <div class="mr-2 d-flex justify-content-between">

                    <div>
                        <a class="user__avatar-link" href="profile.php?user=<?= get_pure_data($like, 'fan_id'); ?>">
                            <img class="rounded-circle" width="50" height="50"
                                 src="<?= get_avatar(get_pure_data($like, 'fan_avatar')); ?>"
                                 alt="Аватар пользователя">
                        </a>
                    </div>

                    <div class="ml-2 p-2 d-flex flex-column mdb-color-text">
                        <a class="post-mini__name user__name"
                           href="profile.php?user=<?= get_pure_data($like, 'fan_id'); ?>">
                            <span><?= get_pure_data($like, 'fan_name'); ?></span>
                        </a>
                        <div class="post-mini__action">
                            <span class="post-mini__activity user__additional"><?= get_like_text($is_own); ?></span>
                            <time class="post-mini__time user__additional"
                                  title="<?= get_pure_data($like, 'creation_date'); ?>"
                                  datetime="2014-03-20T20:20">
                                <small><?= get_time_ago(get_pure_data($like, 'creation_date')); ?></small>
                            </time>
                        </div>

                    </div>
                </div>


                <div class="post-mini__preview ml-auto">
                    <a class="post-mini__link"
                       href="post_details.php?post=<?= get_pure_data($like, 'post_id'); ?>" title="Перейти на публикацию">
                        <div class="post-mini__image-wrapper grey lighten-5 rounded">
<!--                            --><?//= get_post_preview_tag($like); ?>
<!--                            --><?//= FILTER_SVG[1] ?? ''; ?>
                            <?= get_inline_svg('paw', 30, 30, "navy"); ?>
                        </div>

                    </a>
                </div>

            </li>
        <?php endforeach; ?>
    </ul>
</section>
