<main class="container">
    <div class="row">
        <section class="col-12 col-md-6 py-3 justify-content-center">
            <h2 class="text-center">Регистрация</h2>
            <form class="needs-validation mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center"
                  action="registration.php" method="post" enctype="multipart/form-data">

                <div class="col-12 d-flex flex-column mt-2">
                    <label class="text-left" for="email">E-mail</label>
                    <input class="form-control <?= get_mdb_validation_classname($errors, 'email'); ?>" type="text"
                           name="email" id="email" required
                           placeholder="Логин (e-mail)" value="<?= get_pure_data($user, 'email'); ?>">
                    <span class="invalid-feedback"><?= get_field_validation_message($errors, 'email') ?></span>
                </div>

                <div class="col-12 d-flex flex-column mt-2">
                    <label class="text-left" for="name">Имя</label>
                    <input class="form-control <?= get_mdb_validation_classname($errors, 'name'); ?>"
                           type="text" name="name"  id="name" placeholder="Имя"  required
                           value="<?= get_pure_data($user, 'name'); ?>">
                    <span class="invalid-feedback"><?= get_field_validation_message($errors, 'name') ?></span>
                </div>

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


                <div class="col-12 d-flex flex-column mt-2">
                    <label class="text-left" for="text-info">Информация о себе</label>

                    <textarea class="registration__textarea form__textarea form__input"
                              id="text-info" name="text-info"
                              placeholder="Коротко о себе в свободной форме">
                        <?= get_pure_data($user, 'text-info'); ?>
                    </textarea>

                </div>

                <div class="file-field form__input-container">
                    <div class="d-flex justify-content-center">
                        <div class="btn btn-mdb-color btn-rounded float-left">
                            <input type="file" id="userpic-file" name="userpic-file"
                                   class="form__input-file <?= get_mdb_validation_classname($errors,
                                       'userpic-file'); ?>"/>
                            <?php if (!empty(get_field_validation_message($errors,
                                'userpic-file'))): ?>
                                <span class="invalid-feedback"><?= get_field_validation_message($errors,
                                        'userpic-file') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-4 form__file visually-hidden">
                        <img class="form__image" src="/img/roger.svg" width="150" height="150" alt="Предпросмотр">
                        <span class="form__file-name">dsc001.jpg</span>
                        <button class="btn btn-block btn-mdb-color form__delete-button" type="button">
                            <span>Удалить</span>
                            <svg class="form__delete-icon" width="12" height="12">
                                <use xlink:href="#icon-close"></use>
                            </svg>
                        </button>
                    </div>
                </div>

                <p class="text-danger"><small><?= $status_text ?? ''; ?></small></p>


                <button class="btn btn-indigo mt-2" type="submit">Зарегистрироваться</button>

            </form>
        </section>
    </div>
</main>
