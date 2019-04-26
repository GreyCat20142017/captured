<main class="page__main page__main--messages">
    <h1 class="visually-hidden">Личные сообщения</h1>
    <section class="messages">
        <h2 class="visually-hidden">Сообщения</h2>
        <div class="messages__contacts">
            <ul class="messages__contacts-list">

                <?php foreach ($correspondents as $correspondent): ?>
                    <li class="messages__contacts-item
                      <?= !empty(get_pure_data($correspondent, 'unread_count')) ?
                        'messages__contacts-item--new' : ''; ?>">
                        <a class="messages__contacts-tab
                         <?= get_switch_classname($active_user, get_pure_data($correspondent, 'correspondent_id'),
                            'messages__contacts-tab'); ?>"
                           href="profile.php?user=<?= get_pure_data($correspondent, 'correspondent_id'); ?>">
                            <div class="messages__avatar-wrapper">
                                <img class="messages__avatar"
                                     src="<?= get_avatar(get_pure_data($correspondent, 'correspondent_avatar')); ?>"
                                     alt="Аватар пользователя">
                                <?php if (!empty(get_pure_data($correspondent, 'unread_count'))): ?>
                                    <i class="messages__indicator"><?= get_pure_data($correspondent,
                                            'unread_count'); ?></i>
                                <?php endif; ?>
                            </div>
                            <div class="messages__info">
                  <span class="messages__contact-name">
                  <?= get_pure_data($correspondent, 'correspondent_name'); ?>
                  </span>
                                <div class="messages__preview">
                                    <p class="messages__preview-text">
                                        Озеро Байкал – огромное
                                    </p>
                                    <time class="messages__preview-time" datetime="2019-05-01T14:40">
                                        14:40
                                    </time>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>

        <div class="messages__chat">
            <div class="messages__chat-wrapper">
                <?= $chat_content; ?>
            </div>
            <div class="comments">
                <form class="comments__form form" action="#" method="post">
                    <div class="comments__my-avatar">
                        <img class="comments__picture" src="img/userpic.jpg" alt="Аватар пользователя">
                    </div>
                    <textarea class="comments__textarea form__textarea" placeholder="Ваше сообщение"></textarea>
                    <label class="visually-hidden">Ваше сообщение</label>
                    <button class="comments__submit button button--green" type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </section>
</main>