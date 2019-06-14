<main class="container">
    <h1 class="visually-hidden">Личные сообщения</h1>
    <section class="row p-4">
        <h2 class="visually-hidden">Сообщения</h2>
        <div class="col-12 col-md-4 messages__contacts">
            <ul class="list-unstyled shadow-lg py-3">

                <?php foreach ($correspondents as $correspondent): ?>
                    <li class="messages__contacts-tab d-flex p-2 justify-content-center
                        <?= !empty(get_pure_data($correspondent,
                        'unread_count')) ? 'messages__contacts-item--new' : ''; ?>
                        <?= get_mdb_active(intval($active_user),
                        intval(get_pure_data($correspondent, 'correspondent_id')), 'messages__contacts-tab'); ?>">
                        <a href="messages.php?user=<?= get_pure_data($correspondent, 'correspondent_id'); ?>">

                            <div class="d-flex pt-2">
                                <div class="position-relative mr-2 pl-3">
                                    <img class="rounded-circle" width="60" height="60"
                                         src="<?= get_avatar(get_pure_data($correspondent, 'correspondent_avatar')); ?>"
                                         alt="Аватар пользователя">
                                    <?php if (!empty(get_pure_data($correspondent, 'unread_count'))): ?>
                                        <i class="position-absolute text-white indigo rounded-circle py-1 px-2"
                                           style="top: -5px; right: -20px;">
                                            <?= get_pure_data($correspondent, 'unread_count'); ?>
                                        </i>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex flex-column messages__info mdb-color-text pr-3">
                                  <span class="messages__contact-name">
                                  <?= get_pure_data($correspondent, 'correspondent_name'); ?>
                                  </span>
                                    <div class="messages__preview">
                                        <p class="messages__preview-text">
                                            <small><?= get_pure_data($correspondent, 'message_part'); ?></small>
                                            <small>
                                                <time class="messages__preview-time" datetime="2019-05-01T14:40"
                                                      title= <?= get_pure_data($correspondent, 'creation_date'); ?>>
                                                    <?= date('H:i',
                                                        strtotime(get_pure_data($correspondent, 'creation_date'))); ?>
                                                </time>
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>

        <div class="col-12 col-md-8 messages__chat">
            <?php if (empty($active_user)): ?>
                <h3 class="h4-responsive mb-5 text-center">Необходимо выбрать пользователя для просмотра и
                    отправки сообщений</h3>
            <?php else: ?>
                <div class="messages__chat-wrapper">
                    <?= $chat_content; ?>
                </div>

                <div class="comments mx-auto">
                    <form class="comments__form form  d-flex flex-column w-100"
                          action="messages.php?user=<?= $active_user; ?>" method="post">
                        <div class="d-flex align-items-start p-3">
                            <img class="comments__picture rounded-circle mr-3" width="50" height=50"
                                 src="<?= get_avatar(get_auth_user_property('avatar', EMPTY_AVATAR)); ?>"
                                 alt="Аватар пользователя">
                            <div class="form-group shadow-textarea w-100 flex-shrink-1">
                                <label class="visually-hidden" for="message">Ваше сообщение</label>
                                <textarea class="form-control z-depth-1" id="message" name="message" rows="3"
                                          placeholder="Ваше сообщение..."></textarea>
                            </div>
                        </div>
                        <button class="btn btn-indigo comments__submit" type="submit" name="add_message">
                            Отправить
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </div>

    </section>
</main>