<main class="">
    <h1 class="visually-hidden">Настройка параметров пользователя</h1>

    <section class=" container">
        <h2 class="py-3">Изменение параметров пользователя</h2>

        <div class="btn-group" role="group" aria-label="Показать:">
            <a class="btn btn-indigo btn-rounded <?= get_mdb_active($active, 1); ?>"
               href="user_config.php?section=1">
                <?= get_inline_svg('th', 15, 15, "white", "white"); ?>
                <span class="ml-2">Основные настройки</span>
            </a>
            <a class="btn btn-indigo btn-rounded <?= get_mdb_active($active, 2); ?>"
               href="user_config.php?section=2">
                <?= get_inline_svg('th', 15, 15, "white", "white"); ?>
                <span class="ml-2">Изменение пароля</span>
            </a>
        </div>

        <div class="tabs">


            <?php if ($active === 1): ?>

                <form
                    class="needs-validation mt-3 mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center"
                    action="user_config.php?section=1" method="post" enctype="multipart/form-data">

                    <h4>Изменение основных параметров</h4>

                    <div class="col-12 d-flex flex-column mt-2">
                        <input class="form-control <?= get_mdb_validation_classname($errors, 'email'); ?>"
                               type="text"
                               name="email" id="email" required
                               placeholder="Логин" value="<?= get_pure_data($user, 'email'); ?>">
                        <label class="visually-hidden" for="login">Логин</label>
                        <span class="invalid-feedback"><?= get_field_validation_message($errors, 'email') ?></span>
                    </div>

                    <div class="col-12 d-flex flex-column mt-2">
                        <label class="text-left" for="name">Имя</label>
                        <input class="form-control <?= get_mdb_validation_classname($errors, 'name'); ?>"
                               type="text" name="name" id="name" placeholder="Имя" required
                               value="<?= get_pure_data($user, 'name'); ?>">
                        <span class="invalid-feedback"><?= get_field_validation_message($errors, 'name') ?></span>
                    </div>


                    <div class="col-12 d-flex flex-column mt-2">
                        <label class="text-left" for="info">Информация о себе</label>
                        <textarea class="registration__textarea form__textarea form__input"
                                  id="info" name="info" placeholder="Коротко о себе в свободной форме"
                        ><?= get_pure_data($user, 'info'); ?>
                            </textarea>
                    </div>

                    <div class="file-field form__input-container">
                        <div class="d-flex justify-content-center">
                            <div class="btn btn-mdb-color btn-rounded float-left">
                                <input type="file" id="avatar" name="avatar"
                                       class="form__input-file <?= get_mdb_validation_classname($errors,
                                           'avatar'); ?>"/>
                                <?php if (!empty(get_field_validation_message($errors,
                                    'avatar'))): ?>
                                    <span class="invalid-feedback"><?= get_field_validation_message($errors,
                                            'avatar') ?></span
                                <?php endif; ?>

                                <img class="rounded-circle"
                                     src="<?= get_avatar(get_pure_data($user, 'avatar')) ?>"
                                     alt="Ava" title="Текущий аватар" width="50" height="50">
                            </div>
                        </div>

                        <div class="mb-4 form__file visually-hidden">
                            <img class="form__image" src="/img/roger.svg" width="150" height="150"
                                 alt="Предпросмотр">
                            <span class="form__file-name">dsc001.jpg</span>
                            <button class="btn btn-block btn-mdb-color form__delete-button" type="button">
                                <span>Удалить</span>
                            </button>
                        </div>
                    </div>


                    <div class="d-flex col-12 align-items-center">
                        <input class="form-control col-1" id="delete-avatar" type="checkbox" name="delete-avatar"
                               value="<?= get_pure_data($user, 'delete-avatar'); ?>"
                               title="Удалить аватар при сохранении записи в БД">
                        <label class="ml-1 text-left" for="delete-avatar">удалить аватар (если был)</label>
                    </div>


                    <p class="text-danger">
                        <small><?= $status_text ?? ''; ?></small>
                    </p>

                    <button class="btn btn-indigo mt-2" type="submit" name="change_base"> Изменить параметры
                    </button>

                </form>
            <?php endif; ?>



            <?php if ($active === 2): ?>

                <form
                    class="needs-validation mt-3 mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center"
                    action="user_config.php?section=2" method="post" ">

                <h4>Изменение пароля</h4>

                <div class="col-12 d-flex flex-column mt-2">
                    <label class="text-left" for="password">Пароль</label>
                    <input class="form-control <?= get_mdb_validation_classname($errors, 'password'); ?>"
                           type="password" id="password" name="password" placeholder="Пароль"
                           value="<?= get_pure_data($user, 'password'); ?>" required>
                    <span class="invalid-feedback"><?= get_field_validation_message($errors, 'password') ?></span>
                </div>

                <div class="col-12 d-flex flex-column mt-2">
                    <label class="text-left" for="password-repeat">Повтор пароля</label>
                    <input class="form-control <?= get_mdb_validation_classname($errors, 'password-repeat'); ?>"
                           type="password" id="password-repeat" name="password-repeat" placeholder="Повтор пароля"
                           value="<?= get_pure_data($user, 'password-repeat'); ?>">
                    <span class="invalid-feedback"><?= get_field_validation_message($errors,
                            'password-repeat') ?></span>
                </div>

                <p class="text-danger">
                    <small><?= $status_text ?? ''; ?></small>
                </p>
                <button class="btn btn-indigo mt-2" type="submit" name="change_password"> Изменить пароль</button>

                </form>

            <?php endif; ?>
        </div>

    </section>
</main>