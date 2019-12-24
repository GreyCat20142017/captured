<div class="comments mx-auto">
    <form class="comments__form form  d-flex flex-column w-100 shadow grey lighten-5 p-2 rounded"
          method="post" action="<?= $active_script . '?' . $active_query; ?>">
        <div class="d-flex align-items-start p-3">
            <img class="comments__picture rounded-circle mr-3" width="50" height=50"
                 src="<?= get_avatar(get_auth_user_property('avatar', EMPTY_AVATAR)); ?>"
                 alt="Аватар пользователя">
            <div class="form-group shadow-textarea w-100 flex-shrink-1">
                <label class="visually-hidden" for="message">Ваше сообщение</label>
                <textarea class="form-control z-depth-1" id="comment" name="comment" rows="3"
                          placeholder="Ваш комментарий..."></textarea>
            </div>
        </div>
        <button class="btn btn-mdb-color comments__submit" type="submit" name="add_comment">
            Отправить
        </button>
    </form>
</div>
