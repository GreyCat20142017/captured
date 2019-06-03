<main>
    <h1 class="visually-hidden">Главная страница сайта по созданию микроблога readme</h1>
    <div class="page__main-wrapper page__main-wrapper--intro container">
        <section class="intro">
            <h2 class="visually-hidden">Наши преимущества</h2>
            <b class="intro__slogan">Блог, каким<br> он должен быть</b>
            <ul class="intro__advantages-list">
                <li class="intro__advantage intro__advantage--ease">
                    <p class="intro__advantage-text">
                        Есть все необходимое для&nbsp;простоты публикации
                    </p>
                </li>
                <li class="intro__advantage intro__advantage--no-excess">
                    <p class="intro__advantage-text">
                        Нет ничего лишнего, отвлекающего от сути
                    </p>
                </li>
            </ul>
        </section>
        <section class="authorization">
            <h2 class="visually-hidden">Восстановление пароля</h2>
            <form class="authorization__form form" action="password_recovery.php" method="post">
                <div class="authorization__input-wrapper form__input-wrapper <?= get_field_validation_classname($errors,
                    'email'); ?>">
                    <input class="authorization__input authorization__input--login form__input" type="text" name="email"
                           placeholder="Логин" value="<?= get_pure_data($user, 'email'); ?>">
                    <svg class="form__input-icon" width="19" height="18">
                        <use xlink:href="#icon-input-user"></use>
                    </svg>
                </div>
                <label class="visually-hidden">Логин</label>
                <span class="form__error-label form__error-label--login">Неверный логин</span>
                <p>Новый пароль будет отправлен по e-mail</p>
                <button class="authorization__submit button button--main" type="submit" name="recovery"
                        title="Если указанные данные верны, пароль будет выслан по e-mail">Воccтановить
                </button>
            </form>
        </section>
    </div>
</main>