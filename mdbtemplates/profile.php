<main class="page__main page__main--profile container grey lighten-5">
    <h1 class="visually-hidden">Профиль</h1>

    <div class="profile profile--<?= $active_tab; ?>">
        <div class="shadow-lg rounded my-3 w-100 p-2">
            <div class="js-user container d-flex justify-content-between align-items-center p-0 m-0 row w-100">
                <div class="col-12 col-lg-4 d-flex align-items-center justify-content-center">
                    <div>
                        <img class="rounded-circle" width="60" height="60"
                             src="<?= get_avatar(get_pure_data($user, 'avatar')); ?>" alt="Аватар пользователя">
                    </div>
                    <div class="mdb-color-text ml-3">
                        <span class="font-weight-bold"><?= get_pure_data($user, 'username'); ?></span>
                        <p>
                            <small>
                            <time datetime="2014-03-20">
                                &nbsp;<?= '(' . get_time_ago(get_pure_data($user, 'registration_date'),
                                    true) . ' на сайте)'; ?>
                            </time>
                        </small>
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 font-weight-bold">
                    <p class="d-flex flex-column align-items-center justify-content-center w-100">
                        <span class="indigo-text h4-responsive"><?= isnull(get_pure_data($user, 'posts_count'),
                                0); ?></span>
                        <span class="profile__rating-text user__rating-text">
                            <?= get_text_form(get_pure_data($user, 'posts_count'),
                                ['публикация', 'публикации', 'публикаций']); ?>
                        </span>
                    </p>
                    <p class="d-flex flex-column align-items-center">
                        <span class="indigo-text h4-responsive" <?= set_blogger_id($user, '-content'); ?>>
                            <?= isnull(get_pure_data($user, 'subscribers_count'), 0); ?>
                        </span>
                        <span class="profile__rating-text user__rating-text">
                              <?= get_text_form(get_pure_data($user, 'subscribers_count'),
                                  ['подписчик', 'подписчика', 'подписчиков']); ?>
                        </span>
                    </p>
                </div>

                <?php if (!$is_own): ?>
                    <div class="col-12 col-lg-3 text-center">
                        <a class="btn btn-block mb-2 btn-mdb-color user__button--subscription
                            button button--main js-subscription-single"
                        <a <?= get_subscription_href_title(get_pure_data($user, 'user_id'),
                            'Подписаться/отписаться от автора ' . get_pure_data($user, 'username')); ?>
                           <?= set_blogger_id($user); ?>>
                            <?= in_array(get_pure_data($user, 'user_id'),
                                $auth_user_subscriptions ?? []) ?
                                'Отписаться' : 'Подписаться'; ?>
                        </a>
                        <a class="btn btn-block btn-light-green profile__user-button user__button user__button--writing button button--green"
                           <?= get_message_href_title($user); ?>>Сообщение</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <div class="container">
            <div class="btn-group" role="group" aria-label="Показать:">
                <a class="btn btn-sm btn-mdb-color btn-rounded <?= get_mdb_active($active_tab,
                    POSTS); ?>"
                   href="<?= rebuild_query_string($active_script, $active_query, 'tab', 1); ?>">
                    <?= get_inline_svg('th', 15, 15, "white", "white"); ?>
                    <span class="ml-2">Посты</span>
                </a>
                <a class="btn btn-sm btn-mdb-color btn-rounded <?= get_mdb_active($active_tab,
                    LIKES); ?>"
                   href="<?= rebuild_query_string($active_script, $active_query, 'tab', 2); ?>">
                    <?= get_inline_svg('heart', 15, 15, "white", "white"); ?>
                    <span class="ml-2">Лайки</span>
                </a>
                <a class="btn btn-sm btn-mdb-color btn-rounded <?= get_mdb_active($active_tab,
                    SUBSCRIPTIONS); ?>"
                   href="<?= rebuild_query_string($active_script, $active_query, 'tab', 3); ?>">
                    <?= get_inline_svg('address-card', 15, 15, "white", "white"); ?>
                    <span class="ml-2">Подписки</span>
                </a>
            </div>
        </div>


        <div class="profile__tab-content px-1 px-md-5 py-3">
            <?= $profile_tab_content ?? ''; ?>
        </div>
        <div style="max-width: 760px; padding: 15px;">
            <?= $pagination_content ?? ''; ?>
        </div>

    </div>

</main>
