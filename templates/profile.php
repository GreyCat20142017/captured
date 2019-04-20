<main class="page__main page__main--profile">
    <h1 class="visually-hidden">Профиль</h1>
    <div class="profile profile--<?= $active_tab; ?>">
        <div class="profile__user-wrapper">
            <div class="profile__user user container">
                <div class="profile__user-info user__info">
                    <div class="profile__avatar user__avatar">
                        <img class="profile__picture user__picture"
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
                        <span class="user__rating-amount"><?= get_pure_data($user, 'posts_count'); ?></span>
                        <span class="profile__rating-text user__rating-text">публикаций</span>
                    </p>
                    <p class="profile__rating-item user__rating-item user__rating-item--subscribers">
                        <span class="user__rating-amount"><?= get_pure_data($user, 'subscribers_count'); ?></span>
                        <span class="profile__rating-text user__rating-text">подписчиков</span>
                    </p>
                </div>
                <div class="profile__user-buttons user__buttons">
                    <button class="profile__user-button user__button user__button--subscription button button--main"
                            type="button">Подписаться
                    </button>
                    <a class="profile__user-button user__button user__button--writing button button--green" href="#">Сообщение</a>
                </div>
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
                               href="profile.php?tab=1">Посты
                            </a>
                        </li>
                        <li class="profile__tabs-item filters__item tabs__item">
                            <a class="profile__tabs-link filters__button <?= get_switch_classname($active_tab,
                                LIKES); ?> button"
                               href="profile.php?tab=2">Лайки
                            </a>
                        </li>
                        <li class="profile__tabs-item filters__item tabs__item">
                            <a class="profile__tabs-link filters__button <?= get_switch_classname($active_tab,
                                SUBSCRIPTIONS); ?> button"
                               href="profile.php?tab=3">Подписки
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