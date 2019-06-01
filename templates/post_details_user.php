<div class="post-details__user-info user__info">
    <div class="post-details__avatar user__avatar">
        <a class="post-details__avatar-link user__avatar-link"
           href="profile.php?user=<?= get_pure_data($user, 'user_id'); ?>">
            <img class="post-details__picture user__picture" width="60" height="60"
                 src="<?= get_avatar(get_pure_data($user, 'avatar')); ?>"
                 alt="Аватар пользователя">
        </a>
    </div>
    <div class="post-details__name-wrapper user__name-wrapper">
        <a class="post-details__name user__name" href="profile.php?user=<?= get_pure_data($user, 'user_id'); ?>">
            <span><?= get_pure_data($user, 'username'); ?></span>
        </a>
        <time class="post-details__time user__time" datetime="2014-03-20"><?= get_pure_data($user,
                'registration_date'); ?></time>
    </div>
</div>
<div class="post-details__rating user__rating">
    <p class="post-details__rating-item user__rating-item user__rating-item--subscribers">
        <span class="post-details__rating-amount user__rating-amount" <?= set_blogger_id($user, '-content'); ?>>
            <?= isnull(get_pure_data($user,'subscribers_count'), 0); ?>
        </span>
        <span class="post-details__rating-text user__rating-text">
              <?= get_text_form(get_pure_data($user, 'subscribers_count'),
                  ['подписчик', 'подписчика', 'подписчиков']); ?>
        </span>
    </p>
    <p class="post-details__rating-item user__rating-item user__rating-item--publications">
        <span class="post-details__rating-amount user__rating-amount"><?= get_pure_data($user, 'posts_count'); ?></span>
        <span class="post-details__rating-text user__rating-text">
            <?= get_text_form(get_pure_data($user, 'posts_count'),
                ['публикация', 'публикации', 'публикаций']); ?>
        </span>
    </p>
</div>

<div class="post-details__user-buttons user__buttons">
    <?php if (!empty($current_user)): ?>
        <?php if (intval(get_pure_data($user, 'user_id')) !== intval($current_user)) : ?>
            <a class="user__button user__button--subscription button button--main"
                <?= set_blogger_id($user); ?>
                <?= get_subscription_href_title(get_pure_data($user, 'user_id'), 'Подписаться/отписаться'); ?>>
                <?= in_array(get_pure_data($user, 'user_id'),
                    $auth_user_subscriptions ?? []) ?
                    'Отписаться' : 'Подписаться'; ?>
            </a>
            <a class="user__button user__button--writing button button--green"
                <?= get_message_href_title($user); ?>>Сообщение</a>
        <?php endif; ?>
    <?php endif; ?>
</div>
