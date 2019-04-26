<main class="page__main page__main--messages">
    <h1 class="visually-hidden">Личные сообщения</h1>
    <section class="messages">
        <h2 class="visually-hidden">Сообщения</h2>
        <div class="messages__contacts">
            <ul class="messages__contacts-list">
                <li class="messages__contacts-item">
                    <a class="messages__contacts-tab messages__contacts-tab--active" href="#">
                        <div class="messages__avatar-wrapper">
                            <img class="messages__avatar" src="img/userpic-larisa.jpg" alt="Аватар пользователя">
                        </div>
                        <div class="messages__info">
                  <span class="messages__contact-name">
                    Лариса Роговая
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
                <li class="messages__contacts-item messages__contacts-item--new">
                    <a class="messages__contacts-tab" href="#">
                        <div class="messages__avatar-wrapper">
                            <img class="messages__avatar" src="img/userpic-petro.jpg" alt="Аватар пользователя">
                            <i class="messages__indicator">2</i>
                        </div>
                        <div class="messages__info">
                  <span class="messages__contact-name">
                    Петр Демин
                  </span>
                            <div class="messages__preview">
                                <p class="messages__preview-text">
                                    Ок, бро! По рукам
                                </p>
                                <time class="messages__preview-time" datetime="2019-05-01T00:15">
                                    00:15
                                </time>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="messages__contacts-item">
                    <a class="messages__contacts-tab" href="#">
                        <div class="messages__avatar-wrapper">
                            <img class="messages__avatar" src="img/userpic-mark.jpg" alt="Аватар пользователя">
                        </div>
                        <div class="messages__info">
                  <span class="messages__contact-name">
                    Марк Смолов
                  </span>
                            <div class="messages__preview">
                                <p class="messages__preview-text">
                                    Вы: Марк, ждем тебя
                                </p>
                                <time class="messages__preview-time" datetime="2019-01-02T14:40">
                                    2 янв
                                </time>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="messages__contacts-item">
                    <a class="messages__contacts-tab" href="#">
                        <div class="messages__avatar-wrapper">
                            <img class="messages__avatar" src="img/userpic-tanya.jpg" alt="Аватар пользователя">
                        </div>
                        <div class="messages__info">
                  <span class="messages__contact-name">
                    Таня Фирсова
                  </span>
                            <div class="messages__preview">
                                <p class="messages__preview-text">
                                    Вы: Девушка не
                                </p>
                                <time class="messages__preview-time" datetime="2018-09-30T14:40">
                                    31 сент
                                </time>
                            </div>
                        </div>
                    </a>
                </li>
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