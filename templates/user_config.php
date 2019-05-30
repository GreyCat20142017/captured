<main class="page__main page__main--search-results">
    <h1 class="visually-hidden">Настройка параметров пользователя</h1>

    <section class="registration container">
        <h2 class="visually-hidden">Форма изменения параметров</h2>
        <form class="registration__form form" action="user_config.php" method="post" enctype="multipart/form-data">

            <div class="registration__input-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
                'email'); ?>">
                <label class="registration__label form__label" for="email">Электронная почта<span
                        class="form__input-required">*</span></label>
                <div class="form__input-section">
                    <input class="registration__input form__input" id="registration-email" type="email" name="email"
                           value="<?= get_pure_data($user, 'email'); ?>" placeholder="Укажите эл.почту" required>
                    <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                    </button>
                    <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc"><?= get_field_validation_message($errors, 'email'); ?></p>
                    </div>
                </div>
            </div>
            <div class="registration__input-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
                'name'); ?>">
                <label class="registration__label form__label" for="email">Имя<span
                        class="form__input-required">*</span></label>
                <div class="form__input-section">
                    <input class="registration__input form__input" id="registration-email" type="text" name="name"
                           value="<?= get_pure_data($user, 'name'); ?>" placeholder="Укажите имя" required>
                    <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                    </button>
                    <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc"><?= get_field_validation_message($errors, 'name'); ?></p>
                    </div>
                </div>
            </div>
            <div class="registration__input-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
                'password'); ?>">
                <label class="registration__label form__label" for="registration-password">Пароль<span
                        class="form__input-required">*</span></label>
                <div class="form__input-section">
                    <input class="registration__input form__input" id="registration-password" type="password"
                           value="<?= get_pure_data($user, 'password'); ?>" name="password"
                           placeholder="Придумайте пароль" required>
                    <button class="form__error-button button button--main" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                    </button>
                    <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc"><?= get_field_validation_message($errors, 'password'); ?></p>
                    </div>
                </div>
            </div>
            <div class="registration__input-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
                'password-repeat'); ?>">
                <label class="registration__label form__label" for="registration-password-repeat">Повтор пароля<span
                        class="form__input-required">*</span></label>
                <div class="form__input-section">
                    <input class="registration__input form__input" id="registration-password-repeat" type="password"
                           value="<?= get_pure_data($user, 'password-repeat'); ?>" name="password-repeat"
                           placeholder="Повторите пароль" required>
                    <button class="form__error-button button button--main" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                    </button>
                    <div class="form__error-text">
                        <h3 class="form__error-title">Заголовок сообщения</h3>
                        <p class="form__error-desc"><?= get_field_validation_message($errors, 'password-repeat'); ?></p>
                    </div>
                </div>
            </div>
            <div class="registration__textarea-wrapper form__textarea-wrapper">
                <label class="registration__label form__label" for="text-info">Информация о себе</label>
                <div class="form__input-section">
                    <textarea class="registration__textarea form__textarea form__input" id="info" name="info"
                              placeholder="Коротко о себе в свободной форме" name="info"><?= get_pure_data($user,
                            'info'); ?>

                    </textarea>
                </div>
            </div>
            <div class="registration__input-file-container form__input-container">
                <div  class="registration__input-file-wrapper form__input-file-wrapper
                    <?= get_field_validation_classname($errors,'avatar'); ?>">

                    <div class="form__error-text">
                        <h3 class="form__error-title">Ошибка при заполнении поля</h3>
                        <p class="form__error-desc"><?= get_field_validation_message($errors, 'avatar'); ?></p>
                    </div>
                    <div class="registration__input-file-button form__input-file-button">
                        <input class="registration__input-file form__input-file" id="avatar" type="file"
                               name="avatar">
                        <span class="registration__input-file-text form__input-file-text">Выбрать фото</span>
<!--                        <svg class="registration__attach-icon form__attach-icon" width="10" height="20">-->
<!--                            <use xlink:href="#icon-attach"></use>-->
<!--                        </svg>-->
                        <img class="registration__image form__image"
                             src="<?= get_avatar(get_pure_data($user, 'avatar')) ?>"
                             alt="Загруженное фото"  style="margin-left: auto; margin-right: 10px;" width="50" height="50">
                    </div>
                </div>
                <div class="registration__file form__file visually-hidden">
                    <div class="registration__image-wrapper form__image-wrapper">
                        <img class="registration__image form__image"
                             src="<?= get_avatar(get_pure_data($user, 'avatar')) ?>"
                             alt="Загруженное фото"  width="100" height="100">
                    </div>
                    <div class="registration__file-data form__file-data">
                        <span class="registration__file-name form__file-name">Аватар</span>
                        <button class="registration__delete-button form__delete-button button" type="button">
                            <span>Удалить</span>
                            <svg class="registration__delete-icon form__delete-icon" width="12" height="12">
                                <use xlink:href="#icon-close"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <p><?= $status_text ?? ''; ?></p>
            <button class="registration__submit button button--main" type="submit">Отправить</button>
        </form>
    </section>

</main>