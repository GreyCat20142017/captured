<section class="section">
    <h2 class="visually-hidden">Форма добавления фото</h2>
    <form class="needs-validation mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center"
          action="adding.php" method="post" enctype="multipart/form-data">

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="photo-heading">Заголовок</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'photo-heading'); ?>" type="text"
                   name="photo-heading" id="photo-heading" required
                   placeholder="Заголовок" value="<?= get_pure_data($post, 'photo-heading'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'photo-heading') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="hashtag">Хештеги</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'hashtag'); ?>" type="text"
                   name="hashtag" id="hashtag"  title="Через пробел, не более 5-ти, начинаются #"
                   placeholder="Хештеги" value="<?= get_pure_data($post, 'hashtag'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'hashtag') ?></span>
        </div>

        <div class="file-field form__input-container mt-3">
            <div class="d-flex justify-content-center">
                <div class="btn btn-mdb-color btn-rounded float-left">
                    <label for="userpic-file-photo">Файл с фото в формате jpg, png, svg (до 200Кб)</label>
                    <input type="file" id="userpic-file-photo" name="userpic-file-photo"
                           class="form__input-file w-100 <?= get_mdb_validation_classname($errors,
                               'userpic-file-photo'); ?>"/>
                    <?php if (!empty(get_field_validation_message($errors,
                        'userpic-file-photo'))): ?>
                        <span class="invalid-feedback"><?= get_field_validation_message($errors,
                                'userpic-file-photo') ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <p class="mdb-color-text"><small>Загружаемый файл должен быть изображением в формате jpeg, png, svg и размером не более 200Кб</small></p>

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

        <p class="text-danger">
            <small><?= $status_text ?? ''; ?></small>
        </p>

        <div class="buttons d-flex flex-wrap">
            <button class="btn btn-sm btn-mdb-color mt-2" type="submit" name="publish_photo">Опубликовать</button>
            <a class="btn btn-sm btn-light-blue mt-2" href="profile.php">Закрыть</a>
        </div>
    </form>
</section>
