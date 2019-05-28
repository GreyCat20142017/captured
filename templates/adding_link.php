<section class="adding-post__link tabs__content tabs__content--active">
    <h2 class="visually-hidden">Форма добавления ссылки</h2>
    <form class="adding-post__form form" action="adding.php?tab=5" method="post">
        <div class="adding-post__input-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
            'link-heading'); ?>">
            <label class="adding-post__label form__label" for="link-heading">Заголовок</label>
            <div class="form__input-section">
                <input class="adding-post__input form__input" id="link-heading" type="text" name="link-heading"
                       placeholder="Введите заголовок" value="<?= get_pure_data($post, 'link-heading'); ?>">
                <button class=" form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                </button>
                <div class="form__error-text">
                    <h3 class="form__error-title">Ошибка при заполнении поля</h3>
                    <p class="form__error-desc"><?= get_field_validation_message($errors, 'link-heading'); ?></p>
                </div>
            </div>
        </div>

        <div class="adding-post__textarea-wrapper form__textarea-wrapper <?= get_field_validation_classname($errors,
            'post-text'); ?>">
            <label class="adding-post__label form__label" for="post-text">Описание ссылки</label>
            <div class="form__input-section">
                <textarea class="adding-post__textarea form__textarea form__input" id="post-text"
                          placeholder="Введите текст публикации" name="post-text"><?= get_pure_data($post, 'post-text'); ?>
                </textarea>
                <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span></button>
                <div class="form__error-text">
                    <h3 class="form__error-title">Ошибка при заполнении поля</h3>
                    <p class="form__error-desc"><?= get_field_validation_message($errors, 'post-text'); ?></p>
                </div>
            </div>
        </div>

        <div class="adding-post__textarea-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
            'post-link'); ?>">
            <label class="adding-post__label form__label" for="post-link">Ссылка</label>
            <div class="form__input-section">
                <input class="adding-post__input form__input" id="post-link" type="text" name="post-link" value="<?= get_pure_data($post, 'post-link'); ?>">
                <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span></button>
                <div class="form__error-text">
                    <h3 class="form__error-title">Ошибка при заполнении поля</h3>
                    <p class="form__error-desc"><?= get_field_validation_message($errors, 'post-link'); ?></p>
                </div>
            </div>
        </div>

        <div class="adding-post__buttons">
            <button class="adding-post__submit button button--main" type="submit" name="publish_link">Опубликовать
            </button>
            <a class="adding-post__close" href="close.php">Закрыть</a>
        </div>
    </form>
</section>