<section class="adding-post__quote tabs__content tabs__content--active">
    <h2 class="visually-hidden">Форма добавления цитаты</h2>
    <form class="adding-post__form form" action="adding.php?tab=4" method="post">
        <div class="adding-post__input-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
            'quote-heading'); ?>">
            <label class="adding-post__label form__label" for="quote-heading">Заголовок</label>
            <div class="form__input-section">
                <input class="adding-post__input form__input" id="quote-heading" type="text" name="quote-heading"
                       placeholder="Введите заголовок" value="<?= get_pure_data($post, 'quote-heading'); ?>">
                <button class=" form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                </button>
                <div class="form__error-text">
                    <h3 class="form__error-title">Ошибка при заполнении поля</h3>
                    <p class="form__error-desc"><?= get_field_validation_message($errors, 'quote-heading'); ?></p>
                </div>
            </div>
        </div>
        <div class="adding-post__textarea-container form__input-container">
            <div class="adding-post__input-wrapper form__textarea-wrapper <?= get_field_validation_classname($errors,
                'quote-text'); ?>">
                <label class="adding-post__label form__label" for="post-text">Текст цитаты</label>
                <div class="form__input-section">
                    <textarea class="adding-post__textarea adding-post__textarea--quote form__textarea form__input"
                              id="post-text" placeholder="Плейсхолдер инпута" name="quote-text"><?= get_pure_data($post,
                            'quote-text'); ?>
                    </textarea>
                    <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                    </button>
                    <div class="form__error-text">
                        <h3 class="form__error-title">Ошибка при заполнении поля</h3>
                        <p class="form__error-desc"><?= get_field_validation_message($errors, 'quote-text'); ?></p>
                    </div>
                </div>
            </div>
            <div class="adding-post__detail form__detail">
                <p class="adding-post__detail-text form__detail-text">
                    Желательно не превышать длину в 70 знаков, тогда цитата будет выводиться крупным шрифтом.
                </p>
            </div>
        </div>
        <div class="adding-post__textarea-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
            'quote-author'); ?>">
            <label class="adding-post__label form__label" for="quote-author">Автор</label>
            <div class="form__input-section">
                <input class="adding-post__input form__input" id="quote-author" type="text" name="quote-author"
                       value="<?= get_pure_data($post, 'quote-author'); ?>">
                <button class=" form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                </button>
                <div class="form__error-text">
                    <h3 class="form__error-title">Ошибка при заполнении поля</h3>
                    <p class="form__error-desc"><?= get_field_validation_message($errors, 'quote-author'); ?></p>
                </div>
            </div>
        </div>
        <div class="adding-post__buttons">
            <button class="adding-post__submit button button--main" type="submit" name="publish_quote">Опубликовать
            </button>
            <a class="adding-post__close" href="#">Закрыть</a>
        </div>
    </form>
</section>