<section class="section">
    <h2 class="visually-hidden">Форма добавления текста</h2>

    <form class="needs-validation mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center"
          action="adding.php?tab=3" method="post">

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="text-heading">Заголовок</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'text-heading'); ?>" type="text"
                   name="text-heading" id="text-heading" required
                   placeholder="Заголовок" value="<?= get_pure_data($post, 'text-heading'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'text-heading') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="hashtag">Хештеги</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'hashtag'); ?>" type="text"
                   name="hashtag" id="hashtag" title="Через пробел, не более 5-ти, начинаются #"
                   placeholder="Хештеги" value="<?= get_pure_data($post, 'hashtag'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'hashtag') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="post-text">Текст поста</label>
            <textarea class="form-control  <?= get_mdb_validation_classname($errors, 'post-text'); ?>"
                      id="post-text" name="post-text"
                      placeholder="Введите текст публикации" required title="Введите текст публикации"
            ><?= get_pure_data($post, 'post-text'); ?></textarea>
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'post-text') ?></span>
        </div>

        <p class="text-danger">
            <small><?= $status_text ?? ''; ?></small>
        </p>

        <div class="buttons d-flex">
            <button class="btn btn-mdb-color mt-2" type="submit" name="publish_text">Опубликовать</button>
            <a class="btn btn-light-blue mt-2" href="profile.php">Закрыть</a>
        </div>
    </form>
</section>

