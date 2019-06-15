<section class="section">
    <h2 class="visually-hidden">Форма добавления текста</h2>

    <form class="needs-validation mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center"
          action="adding.php?tab=5" method="post">

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="link-heading">Заголовок</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'link-heading'); ?>" type="text"
                   name="link-heading" id="link-heading" bredotmp
                   placeholder="Заголовок" value="<?= get_pure_data($post, 'link-heading'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'link-heading') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="hashtag">Хештеги</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'hashtag'); ?>" type="text"
                   name="hashtag" id="hashtag" bredotmp title="Через пробел, не более 5-ти, начинаются #"
                   placeholder="Хештеги" value="<?= get_pure_data($post, 'hashtag'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'hashtag') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="post-text">Описание ссылки</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'post-text'); ?>" type="text"
                   name="post-text" id="post-text" bredotmp
                   placeholder="Описание ссылки" value="<?= get_pure_data($post, 'post-text'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'post-text') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="post-link">Ссылка</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'post-link'); ?>" type="text"
                   name="post-link" id="post-link" bredotmp
                   placeholder="Ссылка" value="<?= get_pure_data($post, 'post-link'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'post-link') ?></span>
        </div>

        <p class="text-danger">
            <small><?= $status_text ?? ''; ?></small>
        </p>

        <div class="buttons d-flex">
            <button class="btn btn-indigo mt-2" type="submit" name="publish_link">Опубликовать</button>
            <a class="btn btn-light-blue mt-2" href="profile.php">Закрыть</a>
        </div>
    </form>
</section>
