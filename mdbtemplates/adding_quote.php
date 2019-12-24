<section class="section">
    <h2 class="visually-hidden">Форма добавления цитаты</h2>

    <form class="needs-validation mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center"
          action="adding.php?tab=4" method="post">

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="quote-heading">Заголовок</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'quote-heading'); ?>" type="text"
                   name="quote-heading" id="quote-heading" bredotmp
                   placeholder="Заголовок" value="<?= get_pure_data($post, 'quote-heading'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'quote-heading') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="hashtag">Хештеги</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'hashtag'); ?>" type="text"
                   name="hashtag" id="hashtag" bredotmp title="Через пробел, не более 5-ти, начинаются #"
                   placeholder="Хештеги" value="<?= get_pure_data($post, 'hashtag'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'hashtag') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="quote-text">Текст поста</label>
            <textarea class="form-control <?= get_mdb_validation_classname($errors, 'quote-text'); ?>"
                      id="quote-text" name="quote-text"
                      placeholder="Введите текст цитаты" bredotmp title="Введите текст цитаты"
            ><?= get_pure_data($post, 'quote-text'); ?></textarea>
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'quote-text') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="quote-author">Автор</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'quote-author'); ?>"
                   type="text" name="quote-author" id="quote-author" bredotmp
                   value="<?= get_pure_data($post, 'quote-author'); ?>"
                   placeholder="Автор цитаты">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'quote-author') ?></span>
        </div>

        <p class="text-danger">
            <small><?= $status_text ?? ''; ?></small>
        </p>

        <div class="buttons d-flex">
            <button class="btn btn-mdb-color mt-2" type="submit" name="publish_quote">Опубликовать</button>
            <a class="btn btn-light-blue mt-2" href="profile.php">Закрыть</a>
        </div>
    </form>
</section>
