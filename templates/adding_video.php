<section class="adding-post__video tabs__content tabs__content--active">
    <h2 class="visually-hidden">Форма добавления видео</h2>
    <form class="adding-post__form form" action="adding.php?tab=2" method="post">
        <div class="adding-post__input-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
            'video-heading'); ?>">
            <label class="adding-post__label form__label" for="video-heading">Заголовок</label>
            <div class="form__input-section">
                <input class="adding-post__input form__input" id="video-heading" type="text" name="video-heading"
                       placeholder="Введите заголовок" value="<?= get_pure_data($post, 'video-heading'); ?>">
                <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                </button>
                <div class="form__error-text">
                    <h3 class="form__error-title">Заголовок сообщения</h3>
                    <p class="form__error-desc"><?= get_field_validation_message($errors, 'video-heading'); ?></p>
                </div>
            </div>
        </div>

        <div class="adding-post__textarea-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
            'video-link'); ?>">
            <label class="adding-post__label form__label" for="post-link">Видео на youtube (yotube-id или ссылка)</label>
            <div class="form__input-section">
                <input class="adding-post__input form__input" id="post-video" type="text" name="video-link"
                       value="<?= get_pure_data($post, 'video-link'); ?>">
                <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                </button>
                <div class="form__error-text">
                    <h3 class="form__error-title">Ошибка при заполнении поля</h3>
                    <p class="form__error-desc"><?= get_field_validation_message($errors, 'video-link'); ?></p>
                </div>
            </div>
        </div>

        <?php if (!empty(get_pure_data($post, 'video-link') && empty(get_field_validation_message($errors,
                'video-link')))): ?>
            <div class="adding-post__input-file-container form__input-container">
                <div class="adding-post__file form__file">
                    <div class="adding-post__image-wrapper form__image-wrapper">
                        <div class="post-video__preview">
                            <iframe class="post-video__preview"
                                <?= get_video_size('popular'); ?>
                                    src="http://www.youtube.com/embed/<?= extract_youtube_id(get_pure_data($post,
                                        'video-link')) ?>?autoplay=0">
                            </iframe>
                        </div>
                    </div>
                    <div class="adding-post__file-data form__file-data">
                        <span class="adding-post__file-name form__file-name">Видео</span>
                        <a href="delete_video.php" class="adding-post__delete-button form__delete-button button">
                            <span>Удалить</span>
                            <svg class="adding-post__delete-icon form__delete-icon" width="12" height="12">
                                <use xlink:href="#icon-close"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="adding-post__buttons">
            <button class="adding-post__submit button button--main" type="submit" name="publish_video">Опубликовать
            </button>
            <a class="adding-post__close" href="#">Закрыть</a>
        </div>
    </form>
</section>