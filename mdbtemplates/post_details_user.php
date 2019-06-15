<div class="post-details__user-info user__info p-4 m-4 mx-auto rgba-stylish-slight shadow-lg">
    <div class="d-flex justify-content-center p-2">
        <a class="post-details__avatar-link user__avatar-link mr-2"
           href="profile.php?user=<?= get_pure_data($user, 'user_id'); ?>">
            <img class="img-fluid rounded-circle" width="60" height="60"
                 src="<?= get_avatar(get_pure_data($user, 'avatar')); ?>"
                 alt="Аватар пользователя">
        </a>

        <div class="d-flex flex-column">
            <a class="font-weight-bold mdb-color-text" href="profile.php?user=<?= get_pure_data($user, 'user_id'); ?>">
                <span><?= get_pure_data($user, 'username'); ?></span>
            </a>
            <time class="post-details__time user__time" datetime="2014-03-20"
                  title="<?= get_pure_data($user, 'registration_date'); ?>">
                <small>
                    <?= get_time_ago(get_pure_data($user, 'registration_date'), true) . ' на сайте'; ?>
                </small>
            </time>
        </div>
    </div>
    <hr>
    <div class="row d-flex justify-content-between px-4 mx-auto">
        <p class="d-flex flex-column col-6>
        <span class=" post-details__rating-amount user__rating-amount" <?= set_blogger_id($user, '-content'); ?>>
        <?= isnull(get_pure_data($user, 'subscribers_count'), 0); ?>
        </span>
        <span class="post-details__rating-text user__rating-text">
              <?= get_text_form(get_pure_data($user, 'subscribers_count'),
                  ['подписчик', 'подписчика', 'подписчиков']); ?>
        </span>
        </p>
        <p class="d-flex flex-column col-6">
            <span class="post-details__rating-amount user__rating-amount"><?= get_pure_data($user,
                    'posts_count'); ?></span>
            <span class="post-details__rating-text user__rating-text">
            <?= get_text_form(get_pure_data($user, 'posts_count'),
                ['публикация', 'публикации', 'публикаций']); ?>
        </span>
        </p>
    </div>
    <hr>
    <div class="post-details__user-buttons user__buttons d-flex flex-column">
        <?php if (!empty($current_user)): ?>
            <?php if (intval(get_pure_data($user, 'user_id')) !== intval($current_user)) : ?>
                <a class="btn btn-indigo js-subscription-single"
                    <?= set_blogger_id($user); ?>
                    <?= get_subscription_href_title(get_pure_data($user, 'user_id'), 'Подписаться/отписаться'); ?>>
                    <?= in_array(get_pure_data($user, 'user_id'),
                        $auth_user_subscriptions ?? []) ?
                        'Отписаться' : 'Подписаться'; ?>
                </a>
                <a class="btn btn-light-green"
                    <?= get_message_href_title($user); ?>>Сообщение</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
