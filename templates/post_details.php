<main class="page__main page__main--publication">
    <div class="container">
        <h1 class="page__title page__title--publication"><?= get_pure_data($post, 'title'); ?></h1>
        <section class="post-details">
            <h2 class="visually-hidden">Публикация</h2>
            <div class="post-details__wrapper post-photo">

                <?php if(intval(get_pure_data($post, 'id')) === intval($current_user)) : ?>
                <a class="post-details__close button button--close" href="#" title="Удалить">
                    <span class="visually-hidden">Удалить</span>
                    <svg class="button__close-icon" width="18" height="18">
                        <use xlink:href="#icon-close"></use>
                    </svg>
                </a>
                <?php endif; ?>

                <div class="post-details__main-block post post--details">

                    <?= $dependent_content; ?>

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
                                <span><?= isnull(get_pure_data($post, 'likes_count'), 0); ?></span>
                                <span class="visually-hidden">количество лайков</span>
                            </a>
                            <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                                <svg class="post__indicator-icon" width="19" height="17">
                                    <use xlink:href="#icon-comment"></use>
                                </svg>
                                <span><?= isnull(get_pure_data($post, 'comments_count'), 0); ?></span>
                                <span class="visually-hidden">количество комментариев</span>
                            </a>
                        </div>
                        <span class="post__view"><?= isnull(get_pure_data($post, 'reviews'), 0); ?> просмотров</span>
                    </div>
                    <div class="comments">
                        <form class="comments__form form" action="comment.php" method="post">
                            <div class="comments__my-avatar">
                                <img class="comments__picture" src="img/userpic.jpg" alt="Аватар пользователя">
                            </div>
                            <textarea class="comments__textarea form__textarea"
                                      placeholder="Ваш комментарий"></textarea>
                            <label class="visually-hidden">Ваш комментарий</label>
                            <button class="comments__submit button button--green" type="submit">Отправить</button>
                        </form>
                        <div class="comments__list-wrapper">
                            <?= $comments_content; ?>
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
