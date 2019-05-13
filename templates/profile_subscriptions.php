<section class="profile__subscriptions tabs__content tabs__content--active">
    <h2 class="visually-hidden">Подриски</h2>
    <ul class="profile__subscriptions-list">
        <?php foreach ($subscriptions as $subscription): ?>
            <li class="post-mini post-mini--photo post user">
                <div class="post-mini__user-info user__info">
                    <div class="post-mini__avatar user__avatar">
                        <a class="user__avatar-link"
                           href="profile.php?user=<?= get_pure_data($subscription, 'blogger_id'); ?>">
                            <img class="post-mini__picture user__picture"
                                 src="<?= get_avatar(get_pure_data($subscription, 'avatar')); ?>"
                                 alt="Аватар пользователя">
                        </a>
                    </div>
                    <div class="post-mini__name-wrapper user__name-wrapper">
                        <a class="post-mini__name user__name" href="profile.php?user=<?= get_pure_data($subscription, 'blogger_id'); ?>">
                            <span><?= get_pure_data($subscription, 'blogger_name'); ?></span>
                        </a>
                        <time class="post-mini__time user__additional"
                              datetime="2014-03-20T20:20"><?= get_pure_data($subscription,
                                'registration_date'); ?></time>
                    </div>
                </div>
                <div class="post-mini__rating user__rating">
                    <p class="post-mini__rating-item user__rating-item user__rating-item--publications">
                        <span class="post-mini__rating-amount user__rating-amount"><?= get_pure_data($subscription,
                                'posts_count'); ?></span>
                        <span class="post-mini__rating-text user__rating-text">публикаций</span>
                    </p>
                    <p class="post-mini__rating-item user__rating-item user__rating-item--subscribers">
                        <span class="post-mini__rating-amount user__rating-amount"><?= get_pure_data($subscription,
                                'subscribers_count'); ?></span>
                        <span class="post-mini__rating-text user__rating-text">подписчиков</span>
                    </p>
                </div>

                <div class="post-mini__user-buttons user__buttons">
                    <a <?= get_subscription_href_title( get_pure_data($subscription,
                        'blogger_id', 'Подписаться/отписаться')); ?>
                        class="post-mini__user-button user__button user__button--subscription button button--main"
                        type="button">Подписаться
                    </a>
                </div>

            </li>
        <?php endforeach; ?>
    </ul>
</section>