<section class="adding-post__video tabs__content tabs__content--active">
    <h2 class="visually-hidden">Форма добавления видео</h2>
    <form class="adding-post__form form" action="adding.php" method="post" enctype="multipart/form-data">
        <div class="adding-post__input-wrapper form__input-wrapper">
            <label class="adding-post__label form__label" for="video-heading">Заголовок</label>
            <div class="form__input-section">
                <input class="adding-post__input form__input" id="video-heading" type="text" name="video-heading"
                       placeholder="Введите заголовок">
                <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                </button>
                <div class="form__error-text">
                    <h3 class="form__error-title">Заголовок сообщения</h3>
                    <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                </div>
            </div>
        </div>
        <div class="adding-post__input-file-container form__input-container">
            <div class="adding-post__input-file-wrapper form__input-file-wrapper">
                <label class="adding-post__file-zone form__file-zone" for="userpic-file-video">
                    <span class="form__file-zone-text">Перетащите видео сюда</span>
                </label>
                <div class="adding-post__input-file-button form__input-file-button">
                    <input class="adding-post__input-file form__input-file" id="userpic-file-video" type="file"
                           name="userpic-file-video">
                    <span class="adding-post__input-file-text form__input-file-text form__input-file-text--video">Выбрать видео</span>
                    <svg class="adding-post__attach-icon form__attach-icon" width="10" height="20">
                        <use xlink:href="#icon-attach"></use>
                    </svg>
                </div>
            </div>
            <div class="adding-post__file form__file">
                <div class="adding-post__image-wrapper form__image-wrapper">
                    <img class="adding-post__image form__image" src="img/coast-adding.png" alt="Загруженное фото"
                         width="360" height="250">
                </div>
                <div class="adding-post__file-data form__file-data">
                    <span class="adding-post__file-name form__file-name">dji777.mov</span>
                    <button class="adding-post__delete-button form__delete-button button" type="button">
                        <span>Удалить</span>
                        <svg class="adding-post__delete-icon form__delete-icon" width="12" height="12">
                            <use xlink:href="#icon-close"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="adding-post__buttons">
            <button class="adding-post__submit button button--main" type="submit" name="publish_video">Опубликовать</button>
            <a class="adding-post__close" href="#">Закрыть</a>
        </div>
    </form>
</section>