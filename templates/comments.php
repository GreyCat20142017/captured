<?php if (empty($comments)): ?>
    <p>Пока нет комментариев</p>
<?php else: ?>

    <ul class="comments__list">
        <?php foreach ($comments as $comment): ?>

            <li class="comments__item user">
                <div class="comments__avatar">
                    <a class="user__avatar-link"  href="profile.php?id=<?= get_pure_data($comment, 'user_id'); ?>">
                        <img class="comments__picture" src="<?= get_avatar(get_pure_data($comment, 'avatar')); ?>"
                             alt="Аватар пользователя">
                    </a>
                </div>
                <div class="comments__info">
                    <div class="comments__name-wrapper">
                        <a class="comments__user-name" href="profile.php?id=<?= get_pure_data($comment, 'user_id'); ?>">
                            <span><?= get_pure_data($comment, 'username'); ?></span>
                        </a>
                        <time class="comments__time" datetime="2019-03-20"><?= get_time_ago(get_pure_data($comment,
                                'creation_date')); ?></time>
                    </div>
                    <p class="comments__text">
                        <?= get_pure_data($comment, 'text'); ?>
                    </p>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>