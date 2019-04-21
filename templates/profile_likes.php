<section class="profile__likes tabs__content tabs__content--active">
    <h2 class="visually-hidden">Лайки</h2>
    <ul class="profile__likes-list">
        <?php foreach ($likes as $like): ?>
            <li class="post-mini post-mini--photo post user">
                <div class="post-mini__user-info user__info">
                    <div class="post-mini__avatar user__avatar">
                        <a class="user__avatar-link" href="profile.php?user=<?= get_pure_data($like, 'fan_id'); ?>">
                            <img class="post-mini__picture user__picture"
                                 src="<?= get_avatar(get_pure_data($like, 'fan_avatar')); ?>"
                                 alt="Аватар пользователя">
                        </a>
                    </div>
                    <div class="post-mini__name-wrapper user__name-wrapper">
                        <a class="post-mini__name user__name"
                           href="profile.php?user=<?= get_pure_data($like, 'fan_id'); ?>">
                            <span><?= get_pure_data($like, 'fan_name'); ?></span>
                        </a>
                        <div class="post-mini__action">
                            <span class="post-mini__activity user__additional"><?= get_like_text($is_own); ?></span>
                            <time class="post-mini__time user__additional"
                                  datetime="2014-03-20T20:20"><?= get_pure_data($like, 'creation_date'); ?></time>
                        </div>
                    </div>
                </div>
                <div class="post-mini__preview">
                    <a class="post-mini__link" href="post_details.php?post=<?= get_pure_data($like, 'post_id'); ?>" title="Перейти на публикацию">
                        <div class="post-mini__image-wrapper">
                            <img class="post-mini__image" src="<?= get_pure_data($like, 'filename'); ?>" width="109"
                                 height="109"
                                 alt="Превью публикации">
                        </div>
                        <span class="visually-hidden">Фото</span>
                    </a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
