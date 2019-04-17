<article class="feed__post post post-video">
    <header class="post__header post__author">
        <a class="post__author-link" href="#" title="Автор">
            <div class="post__avatar-wrapper">
                <img class="post__author-avatar" src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>"
                     alt="Аватар пользователя">
            </div>
            <div class="post__info">
                <b class="post__author-name">Петр Демин</b>
                <span class="post__time">5 часов назад</span>
            </div>
        </a>
    </header>
    <div class="post__main">
        <div class="post-video__block">
            <div class="post-video__preview">
                <img src="img/coast.jpg" alt="Превью к видео" width="760" height="396">
            </div>
            <div class="post-video__control">
                <button class="post-video__play post-video__play--paused button button--video"
                        type="button"><span class="visually-hidden">Запустить видео</span></button>
                <div class="post-video__scale-wrapper">
                    <div class="post-video__scale">
                        <div class="post-video__bar">
                            <div class="post-video__toggle"></div>
                        </div>
                    </div>
                </div>
                <button
                    class="post-video__fullscreen post-video__fullscreen--inactive button button--video"
                    type="button"><span class="visually-hidden">Полноэкранный режим</span></button>
            </div>
            <button class="post-video__play-big button" type="button">
                <svg class="post-video__play-big-icon" width="27" height="28">
                    <use xlink:href="#icon-video-play-big"></use>
                </svg>
                <span class="visually-hidden">Запустить проигрыватель</span>
            </button>
        </div>
    </div>
    <?= $post_footer_content; ?>
</article>