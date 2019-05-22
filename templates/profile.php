<main class="page__main page__main--profile">
    <h1 class="visually-hidden">Профиль</h1>

    <div class="profile profile--<?= $active_tab; ?>">
        <div class="profile__user-wrapper">
            <div class="profile__user user container">
                <div class="profile__user-info user__info">
                    <div class="profile__avatar user__avatar">
                        <img class="profile__picture user__picture" width="60" height="60"
                             src="<?= get_avatar(get_pure_data($user, 'avatar')); ?>" alt="Аватар пользователя">
                    </div>
                    <div class="profile__name-wrapper user__name-wrapper">
                        <span class="profile__name user__name"><?= get_pure_data($user, 'username'); ?></span>
                        <time class="profile__user-time user__time" datetime="2014-03-20"><?= get_pure_data($user,
                                'registration_date'); ?></time>
                    </div>
                </div>
                <div class="profile__rating user__rating">
                    <p class="profile__rating-item user__rating-item user__rating-item--publications">
                        <span class="user__rating-amount"><?= isnull(get_pure_data($user, 'posts_count'), 0); ?></span>
                        <span class="profile__rating-text user__rating-text">
                            <?= get_text_form(get_pure_data($user, 'posts_count'),
                                ['публикация', 'публикации', 'публикаций']); ?>
                        </span>
                    </p>
                    <p class="profile__rating-item user__rating-item user__rating-item--subscribers">
                        <span class="user__rating-amount"><?= isnull(get_pure_data($user, 'subscribers_count'),
                                0); ?></span>
                        <span class="profile__rating-text user__rating-text">
                              <?= get_text_form(get_pure_data($user, 'subscribers_count'),
                                  ['подписчик', 'подписчика', 'подписчиков']); ?>
                        </span>
                    </p>
                </div>

                <?php if (!$is_own): ?>
                    <div class="profile__user-buttons user__buttons">
                        <a class="profile__user-button user__button user__button--subscription button button--main"
                        <a <?= get_subscription_href_title(get_pure_data($user, 'user_id'),
                            'Подписаться/отписаться от автора ' . get_pure_data($user, 'username')); ?>>
                            Подписаться
                        </a>
                        <a class="profile__user-button user__button user__button--writing button button--green"
                            <?= get_message_href_title($user); ?>>Сообщение</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="profile__tabs-wrapper tabs">
            <div class="container">
                <div class="profile__tabs filters">
                    <b class="profile__tabs-caption filters__caption">Показать:</b>
                    <ul class="profile__tabs-list filters__list tabs__list">
                        <li class="profile__tabs-item filters__item tabs__item">
                            <a class="profile__tabs-link filters__button <?= get_switch_classname($active_tab,
                                POSTS); ?> button"
                               href="<?= rebuild_query_string($active_script, $active_query, 'tab', 1); ?>">Посты
                            </a>
                        </li>
                        <li class="profile__tabs-item filters__item tabs__item">
                            <a class="profile__tabs-link filters__button <?= get_switch_classname($active_tab,
                                LIKES); ?> button"
                               href="<?= rebuild_query_string($active_script, $active_query, 'tab', 2); ?>">Лайки
                            </a>
                        </li>
                        <li class="profile__tabs-item filters__item tabs__item">
                            <a class="profile__tabs-link filters__button <?= get_switch_classname($active_tab,
                                SUBSCRIPTIONS); ?> button"
                               href="<?= rebuild_query_string($active_script, $active_query, 'tab', 3); ?>">Подписки
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="profile__tab-content">
                    <?= $profile_tab_content; ?>
                </div>
            </div>
        </div>
    </div>
</main>