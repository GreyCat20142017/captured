<main class="page__main page__main--login">
    <div class="container">
        <h1 class="page__title page__title--login">Вход</h1>
    </div>
    <section class="login container">
        <h2 class="visually-hidden">Форма авторизации</h2>
        <form class="login__form form" action="login.php" method="post">
            <div class="login__input-wrapper form__input-wrapper <?= get_field_validation_classname ($errors, 'email'); ?>">
                <label class="login__label form__label" for="login-email">Электронная почта</label>
                <div class="form__input-section">
                    <input class="login__input form__input" id="login-email" type="email" name="email"
                           placeholder="Укажите эл.почту" value="<?= get_pure_data($user, 'email'); ?>">
                    <button class="form__error-button button" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                    </button>
                    <div class="form__error-text">
                        <h3 class="form__error-title">Некорректный e-mail</h3>
                        <p class="form__error-desc"><?= get_field_validation_message($errors, 'email') ?></p>
                    </div>
                </div>
            </div>
            <div class="login__input-wrapper form__input-wrapper <?= get_field_validation_classname ($errors, 'password'); ?>">
                <label class="login__label form__label" for="login-password">Пароль</label>
                <div class="form__input-section">
                    <input class="login__input form__input" id="login-password" type="password" name="password"
                           placeholder="Введите пароль" value="<?= get_pure_data($user, 'password'); ?>">
                    <button class="form__error-button button button--main" type="button">!<span class="visually-hidden">Информация об ошибке</span>
                    </button>
                    <div class="form__error-text">
                        <h3 class="form__error-title">Проблема с паролем</h3>
                        <p class="form__error-desc"><?= get_field_validation_message($errors, 'password') ?></p>
                    </div>
                </div>
            </div>
            <button class="login__submit button button--main" type="submit" name="loginbtn">Отправить</button>
        </form>
    </section>
</main>
