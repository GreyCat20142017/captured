<main class="page__main page__main--publication">
    <div class="container">
        <h1 class="page__title page__title--publication">Наконец, обработала фотки!</h1>
        <section class="post-details">
            <h2 class="visually-hidden">Публикация</h2>
            <div class="post-details__wrapper post-photo">
                <a class="post-details__close button button--close" href="#" title="Удалить">
                    <span class="visually-hidden">Удалить</span>
                    <svg class="button__close-icon" width="18" height="18">
                        <use xlink:href="#icon-close"></use>
                    </svg>
                </a>
                <div class="post-details__main-block post post--details">
                    <div class="post-details__image-wrapper post-photo__image-wrapper">
                        <img src="img/rock-default.jpg" alt="Фото от пользователя" width="760" height="507">
                    </div>
                    <div class="post__indicators">
                        <div class="post__buttons">
                            <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                                <svg class="post__indicator-icon" width="20" height="17">
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20"
                                     height="17">
                                    <use xlink:href="#icon-heart-active"></use>
                                </svg>
                                <span>250</span>
                                <span class="visually-hidden">количество лайков</span>
                            </a>
                            <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                                <svg class="post__indicator-icon" width="19" height="17">
                                    <use xlink:href="#icon-comment"></use>
                                </svg>
                                <span>25</span>
                                <span class="visually-hidden">количество комментариев</span>
                            </a>
                        </div>
                        <span class="post__view">500 просмотров</span>
                    </div>
                    <div class="comments">
                        <form class="comments__form form" action="#" method="post">
                            <div class="comments__my-avatar">
                                <img class="comments__picture" src="img/userpic.jpg" alt="Аватар пользователя">
                            </div>
                            <textarea class="comments__textarea form__textarea"
                                      placeholder="Ваш комментарий"></textarea>
                            <label class="visually-hidden">Ваш комментарий</label>
                            <button class="comments__submit button button--green" type="submit">Отправить</button>
                        </form>
                        <div class="comments__list-wrapper">
                            <ul class="comments__list">
                                <li class="comments__item user">
                                    <div class="comments__avatar">
                                        <a class="user__avatar-link" href="#">
                                            <img class="comments__picture" src="img/userpic-larisa.jpg"
                                                 alt="Аватар пользователя">
                                        </a>
                                    </div>
                                    <div class="comments__info">
                                        <div class="comments__name-wrapper">
                                            <a class="comments__user-name" href="#">
                                                <span>Лариса Роговая</span>
                                            </a>
                                            <time class="comments__time" datetime="2019-03-20">1 ч назад</time>
                                        </div>
                                        <p class="comments__text">
                                            Красота!!!1!
                                        </p>
                                    </div>
                                </li>
                                <li class="comments__item user">
                                    <div class="comments__avatar">
                                        <a class="user__avatar-link" href="#">
                                            <img class="comments__picture" src="img/userpic-larisa.jpg"
                                                 alt="Аватар пользователя">
                                        </a>
                                    </div>
                                    <div class="comments__info">
                                        <div class="comments__name-wrapper">
                                            <a class="comments__user-name" href="#">
                                                <span>Лариса Роговая</span>
                                            </a>
                                            <time class="comments__time" datetime="2019-03-18">2 дня назад</time>
                                        </div>
                                        <p class="comments__text">
                                            Озеро Байкал – огромное древнее озеро в горах Сибири к северу от монгольской
                                            границы. Байкал считается самым глубоким озером в мире. Он окружен сетью
                                            пешеходных маршрутов, называемых Большой байкальской тропой. Деревня
                                            Листвянка, расположенная на западном берегу озера, – популярная отправная
                                            точка для летних экскурсий. Зимой здесь можно кататься на коньках и собачьих
                                            упряжках.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <a class="comments__more-link" href="#">
                                <span>Показать все комментарии</span>
                                <sup class="comments__amount">45</sup>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="post-details__user user">
                    <?= $user_content; ?>
                </div>
            </div>
        </section>
    </div>
</main>
