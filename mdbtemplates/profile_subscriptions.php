<section class="<?= empty($is_search) ? 'profile__subscriptions' : 'search__user'; ?>">
    <?php if (empty($is_search)): ?>
        <h2 class="visually-hidden">Подписки</h2>
    <?php endif; ?>
    <ul class="list-unstyled js-subscriptions-container p-4 shadow-lg">
        <?php foreach ($subscriptions as $subscription): ?>
            <li class="row user align-items-center shadow-sm my-3 p-1">
                    <div class="col-12 col-md-6 d-flex align-items-center">
                        <a class="mr-2 p-2" href="profile.php?user=<?= get_pure_data($subscription, 'blogger_id'); ?>">
                            <img class="rounded-circle img-fluid" height="60" width="60"
                                 src="<?= get_avatar(get_pure_data($subscription, 'avatar')); ?>"
                                 alt="Аватар пользователя">
                        </a>

                        <div class="d-flex flex-column">
                            <a class="mdb-color-text font-weight-bold"
                               href="profile.php?user=<?= get_pure_data($subscription, 'blogger_id'); ?>">
                                <span><?= get_pure_data($subscription, 'blogger_name'); ?></span>
                            </a>
                            <time class="post-mini__time user__additional" datetime="2014-03-20T20:20">
                                <small>
                                    <?= get_time_ago(get_pure_data($subscription, 'registration_date'),
                                        true) . ' на сайте'; ?>
                                </small>
                            </time>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 d-flex justify-content-between px-3 pt-2 pseudo-table">
                        <p class="d-flex flex-column text-center">
                        <span class="h5-responsive indigo-text font-weight-bold">
                            <?= isnull(get_pure_data($subscription,'posts_count'), 0); ?>
                        </span>
                            <span class="post-mini__rating-text user__rating-text">
                             <?= get_text_form(get_pure_data($subscription, 'posts_count'),
                                 ['публикация', 'публикации', 'публикаций']); ?>
                        </span>
                        </p>
                        <p class="d-flex flex-column text-center">
                        <span class="h5-responsive indigo-text font-weight-bold"
                            <?= set_blogger_id($subscription, '-content', 'blogger_id'); ?>>
                            <?= isnull(get_pure_data($subscription, 'subscribers_count'), 0); ?>
                        </span>
                            <span class="post-mini__rating-text user__rating-text">
                               <?= get_text_form(get_pure_data($subscription, 'subscribers_count'),
                                   ['подписчик', 'подписчика', 'подписчиков']); ?>
                        </span>
                        </p>
                    </div>

                    <div class="col-12 col-md-3">
                        <?php if (is_auth_user()): ?>
                            <a <?= get_subscription_href_title(get_pure_data($subscription, 'blogger_id',
                                'Подписаться/отписаться')); ?>
                                class="btn btn-block btn-indigo user__button--subscription"
                                <?= set_blogger_id($subscription, '', 'blogger_id'); ?>>
                                <?= in_array(get_pure_data($subscription, 'blogger_id'),
                                    $auth_user_subscriptions ?? []) ?
                                    'Отписаться' : 'Подписаться'; ?>
                            </a>
                        <?php endif; ?>
                    </div>

            </li>
        <?php endforeach; ?>
    </ul>
</section>