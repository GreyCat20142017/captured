<main class="container p-5 shadow-lg mt-2 indigo text-white rounded">
    <h1 class="visually-hidden">Главная страница сайта Captured</h1>
    <div class="row">
        <section class="col-12 col-md-6 text-center py-3">
            <h2 class="visually-hidden">Наши преимущества</h2>
            <p class="h5-responsive">Для восстановления пароля необходимо набрать существующий логин</p>
            <p class="font-weight-bold">Новый пароль будет отправлен по e-mail</p>
            <p class="font-weight-bold danger-color">СЕЙЧАС ЭТА ВОЗМОЖНОСТЬ ВРЕМЕННО ОТКЛЮЧЕНА</p>
            <p class="font-weight-bold">Пароль рекомендуется сменить при первом удачном входе в систему</p>
        </section>

        <section class="col-12 col-md-6 py-3 justify-content-center">
            <h2 class="visually-hidden">Восстановление пароля</h2>
            <form class="needs-validation mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center"
                  action="password_recovery.php" method="post">
                <div class="col-12 d-flex flex-column mt-2">
                    <input class="form-control <?= get_mdb_validation_classname($errors, 'email'); ?>" type="text"
                           name="email"
                           placeholder="Логин" value="<?= get_pure_data($user, 'email'); ?>">
                    <label class="visually-hidden">Логин</label>
                    <span class="invalid-feedback"><?= get_field_validation_message($errors, 'email') ?></span>
                </div>
                <div>
                    <button class="btn btn-indigo" type="submit">Восстановить пароль</button>
                </div>
            </form>
        </section>

    </div>
</main>
