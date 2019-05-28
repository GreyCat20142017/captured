<section class="adding-post__photo tabs__content tabs__content--active">
    <h2 class="visually-hidden">Форма добавления фото</h2>
    <form class="adding-post__form form" action="adding.php?tab=1" method="post" enctype="multipart/form-data">
        <div class="adding-post__input-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
            'photo-heading'); ?>">
            <label class="adding-post__label form__label" for="photo-heading">Заголовок</label>
            <div class="form__input-section">
                <input class="adding-post__input form__input" id="photo-heading" type="text"
                       name="photo-heading" value="<?= get_pure_data($post, 'photo-heading'); ?>"
                       placeholder="Введите заголовок">
                <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                </button>
                <div class="form__error-text">
                    <h3 class="form__error-title">Ошибка при заполнении поля</h3>
                    <p class="form__error-desc"><?= get_field_validation_message($errors, 'photo-heading'); ?></p>
                </div>
            </div>
        </div>
        <div class="adding-post__input-file-container form__input-container">
            <div class="adding-post__input-file-wrapper form__input-file-wrapper <?= get_field_validation_classname($errors,
                'userpic-file-photo'); ?>">
                <!--                <label class="adding-post__file-zone form__file-zone" for="userpic-file-photo">-->
                <!--                    <span class="form__file-zone-text">Перетащите фото сюда</span>-->
                <!--                </label>-->
                <div class="adding-post__input-file-button form__input-file-button">
                    <input class="adding-post__input-file form__input-file" id="userpic-file-photo" type="file"
                           name="userpic-file-photo">
                    <span class="adding-post__input-file-text form__input-file-text form__input">Выбрать фото</span>
                    <svg class="adding-post__attach-icon form__attach-icon" width="10" height="20">
                        <use xlink:href="#icon-attach"></use>
                    </svg>
                </div>

                <div class="form__error-text">
                    <h3 class="form__error-title">Ошибка при заполнении поля</h3>
                    <p class="form__error-desc"><?= get_field_validation_message($errors, 'userpic-file-photo'); ?></p>
                </div>
            </div>

            <div class="adding-post__file form__file visually-hidden">
                <div class="adding-post__image-wrapper form__image-wrapper">
                    <img class="adding-post__image form__image" src="img/rock-adding.png" alt="Загруженное фото"
                         width="360" height="250">
                </div>
                <div class="adding-post__file-data form__file-data">
                    <span class="adding-post__file-name form__file-name">dsc-test.jpg</span>
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
            <button class="adding-post__submit button button--main" type="submit" name="publish_photo">Опубликовать
            </button>
            <a class="adding-post__close" href="profile.php">Закрыть</a>
        </div>
    </form>
</section>