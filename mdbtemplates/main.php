<main class="container p-5 shadow-lg mt-2 mdb-color text-white rounded">
    <h1 class="visually-hidden">Главная страница сайта Captured</h1>
    <div class="row">

        <section class="col-12 col-md-6 text-center py-2">
            <h2 class="visually-hidden">Наши преимущества</h2>
            <p class="h4-responsive" title="МикроблоX без свитера">Бложек. По мотивам одного проекта.</p>
            <ul class="list-unstyled">
                <li>
                    <?= get_inline_svg('paw', 20, 20, "white", "white"); ?>
                    <p class="font-italic">
                        Очень интересненький проектик...
                    </p>
                </li>
                <li>
                    <?= get_inline_svg('paw', 20, 20, "white", "white"); ?>
                    <p class="font-italic">
                        Жаль, что только для "малиновых штанов"...
                    </p>
                </li>
                <li >
                    <?= get_inline_svg('paw', 20, 20, "#FFCCE9", "#FFCCE9"); ?>
                    <p class="font-italic" style="color: #FFCCE9;">
                        Но... "Если есть на этом Плюке гравицапа, так достанем. Не такое доставали…" !
                    </p>
                </li>
            </ul>
        </section>

        <section class="col-12 col-md-6 py-3 justify-content-center">
            <h2 class="visually-hidden">Авторизация</h2>
            <form class="needs-validation mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center" action="index.php"
                  method="post">
                <div class="col-12 d-flex flex-column mt-2">
                    <label class="text-left m-0 p-0" for="email"><small>логин:</small></label>
                    <input class="form-control <?= get_mdb_validation_classname($errors, 'email'); ?>" type="text"
                           name="email" id="email" title="Логин (e-mail)"
                           placeholder="логин (e-mail)" value="<?= get_pure_data($user, 'email'); ?>">
                    <span class="invalid-feedback"><?= get_field_validation_message($errors, 'email') ?></span>
                </div>
                <div class="col-12 d-flex flex-column mt-2">
                    <label class="text-left m-0 p-0"  for="password" title="Пароль"><small>пароль:</small></label>
                    <input class="form-control <?= get_mdb_validation_classname($errors, 'password'); ?>"
                           type="password" id="password" title="Пароль"
                           name="password" placeholder="пароль" value="<?= get_pure_data($user, 'password'); ?>">
                    <span class="invalid-feedback"><?= get_field_validation_message($errors, 'password') ?></span>
                </div>
                <div class="mt-3">
                    <a class="font-weight-bold mdb-color-text" href="password_recovery.php" title="Восстановление пароля">
                        восстановить пароль
                    </a>
                    <button class="btn btn-mdb-color btn-sm" type="submit" title="Выполнить вход">Войти</button>
                </div>
            </form>
        </section>

    </div>
</main>
