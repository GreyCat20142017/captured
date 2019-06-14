<main class="container">
    <div class="row">
        <h1 class="col-12 text-center">Вход</h1>

        <section class="col-12  py-3 justify-content-center">
            <h2 class="visually-hidden">Авторизация</h2>
            <form class="needs-validation mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center"
                  action="index.php"
                  method="post">
                <div class="col-12 d-flex flex-column mt-2">
                    <input class="form-control <?= get_mdb_validation_classname($errors, 'email'); ?>" type="text"
                           name="email"
                           placeholder="Логин" value="<?= get_pure_data($user, 'email'); ?>">
                    <label class="visually-hidden">Логин</label>
                    <span class="invalid-feedback"><?= get_field_validation_message($errors, 'email') ?></span>
                </div>
                <div class="col-12 d-flex flex-column mt-2">
                    <input class="form-control <?= get_mdb_validation_classname($errors, 'password'); ?>"
                           type="password"
                           name="password" placeholder="Пароль" value="<?= get_pure_data($user, 'password'); ?>">
                    <label class="visually-hidden">Пароль</label>
                    <span class="invalid-feedback"><?= get_field_validation_message($errors, 'password') ?></span>
                </div>
                <div>
                    <a class="font-weight-bold mdb-color-text" href="password_recovery.php">Восстановить пароль</a>
                    <button class="btn btn-indigo" type="submit">Войти</button>
                </div>
            </form>
        </section>

    </div>
</main>
