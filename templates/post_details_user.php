<div class="post-details__user-info user__info">
    <div class="post-details__avatar user__avatar">
        <a class="post-details__avatar-link user__avatar-link"
           href="profile.php?user=<?= get_pure_data($user, 'id'); ?>">
            <img class="post-details__picture user__picture" width="60" height="60"
                 src="<?= get_avatar(get_pure_data($user, 'avatar')); ?>"
                 alt="Аватар пользователя">
        </a>
    </div>
    <div class="post-details__name-wrapper user__name-wrapper">
        <a class="post-details__name user__name" href="profile.php?user=<?= get_pure_data($user, 'id'); ?>">
            <span><?= get_pure_data($user, 'username'); ?></span>
        </a>
        <time class="post-details__time user__time" datetime="2014-03-20"><?= get_pure_data($user,
                'registration_date'); ?></time>
    </div>
</div>
<div class="post-details__rating user__rating">
    <p class="post-details__rating-item user__rating-item user__rating-item--subscribers">
        <span class="post-details__rating-amount user__rating-amount"><?= isnull(get_pure_data($user,
                'subscribers_count'), 0); ?></span>
        <span class="post-details__rating-text user__rating-text">подписчиков</span>
    </p>
    <p class="post-details__rating-item user__rating-item user__rating-item--publications">
        <span class="post-details__rating-amount user__rating-amount"><?= get_pure_data($user, 'posts_count'); ?></span>
        <span class="post-details__rating-text user__rating-text">публикаций</span>
    </p>
</div>

<div class="post-details__user-buttons user__buttons">
    <?php if (intval(get_pure_data($user, 'user_id')) !== intval($current_user)) : ?>
        <a class="user__button user__button--subscription button button--main" <?= get_subscription_href_title(get_pure_data($user,
            'user_id', 'Подписаться/отписаться')); ?>>
            Подписаться
        </a>
        <a class="user__button user__button--writing button button--green" href="#">Сообщение</a>
    <?php endif; ?>
</div>
