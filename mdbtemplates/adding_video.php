<section class="section">
    <h2 class="visually-hidden">Форма добавления видео</h2>
    <form class="needs-validation mx-auto col-11 p-3 white mdb-color-text rounded shadow-lg text-center"
          action="adding.php?tab=2" method="post">

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="video-heading">Заголовок</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'video-heading'); ?>" type="text"
                   name="video-heading" id="video-heading" required
                   placeholder="Заголовок" value="<?= get_pure_data($post, 'video-heading'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'video-heading') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="hashtag">Хештеги</label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'hashtag'); ?>" type="text"
                   name="hashtag" id="hashtag" title="Через пробел, не более 5-ти, начинаются #"
                   placeholder="Хештеги" value="<?= get_pure_data($post, 'hashtag'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'hashtag') ?></span>
        </div>

        <div class="col-12 d-flex flex-column mt-2 text-left">
            <label for="video-link">Видео на youtube <small>(id или ссылка)</small></label>
            <input class="form-control <?= get_mdb_validation_classname($errors, 'video-link'); ?>" type="text"
                   name="video-link" id="hashtag" required title="Видео на youtube (yotube-id или ссылка)"
                   placeholder="Видео на youtube (yotube-id или ссылка)"
                   value="<?= get_pure_data($post, 'video-link'); ?>">
            <span class="invalid-feedback"><?= get_field_validation_message($errors, 'video-link') ?></span>
        </div>


        <?php if (!empty(get_pure_data($post, 'video-link') && empty(get_field_validation_message($errors,
                'video-link')))): ?>
            <div class="d-flex">
                <div class="post-video__preview">
                    <iframe class="post-video__preview"
                        <?= get_video_size('popular'); ?>
                            src="http://www.youtube.com/embed/<?= extract_youtube_id(get_pure_data($post,
                                'video-link')) ?>?autoplay=0">
                    </iframe>
                </div>
                <div class="adding-post__file-data form__file-data">
                    <span class="adding-post__file-name form__file-name">Видео</span>
                    <a href="delete_video.php" class="adding-post__delete-button form__delete-button button">
                        <span>Удалить</span>
                        <svg class="adding-post__delete-icon form__delete-icon" width="12" height="12">
                            <use xlink:href="#icon-close"></use>
                        </svg>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <p class="text-danger">
            <small><?= $status_text ?? ''; ?></small>
        </p>

        <div class="buttons d-flex flex-wrap">
            <button class="btn btn-sm btn-mdb-color mt-2" type="submit" name="publish_video">Опубликовать</button>
            <a class="btn btn-sm btn-light-blue mt-2" href="profile.php">Закрыть</a>
        </div>
    </form>
</section>
