<?php if (empty($comments)): ?>
    <p class="font-italic font-weight-bold">Пока нет комментариев</p>
<?php else: ?>

    <ul class="list-unstyled">
        <?php foreach ($comments as $comment): ?>

            <li class="d-flex text-left">
                <div class="mr-2">
                    <a class="user__avatar-link" href="profile.php?id=<?= get_pure_data($comment, 'user_id'); ?>">
                        <img class="comments__picture rounded-circle"
                             src="<?= get_avatar(get_pure_data($comment, 'avatar')); ?>"
                             alt="Аватар пользователя">
                    </a>
                </div>
                <div class="comments__info">
                    <div class="comments__name-wrapper">
                        <a class="mdb-color-text font-weight-bold"
                           href="profile.php?id=<?= get_pure_data($comment, 'user_id'); ?>">
                            <span><?= get_pure_data($comment, 'username'); ?></span>
                        </a>
                        <time class="comments__time" datetime="2019-03-20">
                            <small>(<?= get_time_ago(get_pure_data($comment, 'creation_date')); ?>)</small>
                        </time>
                    </div>
                    <p class="comments__text text-left">
                        <?= get_pure_data($comment, 'text'); ?>
                    </p>
                    <hr>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>