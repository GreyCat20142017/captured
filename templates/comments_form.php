<form class="comments__form form" method="post" action="<?= $active_script . '?' . $active_query; ?>">
    <div class="comments__my-avatar">
        <img class="comments__picture" src="<?= get_avatar(get_auth_user_property('avatar')) ?>"
             alt="Аватар пользователя">
    </div>

    <div class="form__textarea-wrapper <?= get_field_validation_classname($errors,
        'comment'); ?>">
        <textarea class="comments__textarea form__textarea" name="comment" placeholder="Ваш комментарий"></textarea>
        <button class="form__error-button button" type="button">!<span
                class="visually-hidden">Информация об ошибке</span>
        </button>
        <div class="form__error-text">
            <h3 class="form__error-title">Ошибка при заполнении поля</h3>
            <p class="form__error-desc"><?= get_field_validation_message($errors, 'comment'); ?></p>
        </div>
        <label class="visually-hidden">Ваш комментарий</label>
    </div>

    <button class="comments__submit button button--green" type="submit" name="add_comment">Отправить</button>

</form>