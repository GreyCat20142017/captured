<article class="feed__post post post-photo">
    <header class="post__header post__author">
        <a class="post__author-link" href="#" title="Автор">
            <div class="post__avatar-wrapper">
                <img class="post__author-avatar" src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>" alt="Аватар пользователя"
                     width="60" height="60">
            </div>
            <div class="post__info">
                <b class="post__author-name"><?= get_pure_data($post, 'username'); ?></b>
                <span class="post__time"><?= get_pure_data($post, 'creation_date'); ?></span>
            </div>
        </a>
    </header>
    <div class="post__main">
        <h2>Наконец, обработала фотки!</h2>
        <div class="post-photo__image-wrapper">
            <img src="<?= get_pure_data($post, 'filename'); ?>" alt="Фото от пользователя" width="760" height="396">
        </div>
    </div>
    <footer class="post__footer post__indicators">
        <div class="post__buttons">
            <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                <svg class="post__indicator-icon" width="20" height="17">
                    <use xlink:href="#icon-heart"></use>
                </svg>
                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20"
                     height="17">
                    <use xlink:href="#icon-heart-active"></use>
                </svg>
                <span><?= get_pure_data($post, 'likes_count'); ?></span>
                <span class="visually-hidden">количество лайков</span>
            </a>
            <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                <svg class="post__indicator-icon" width="19" height="17">
                    <use xlink:href="#icon-comment"></use>
                </svg>
                <span><?= get_pure_data($post, 'comments_count'); ?></span>
                <span class="visually-hidden">количество комментариев</span>
            </a>
        </div>
    </footer>
</article>