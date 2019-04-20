<?php if (empty($expand) || !$expand): ?>
    <div class="comments">
        <a class="comments__button button"
           href="profile-posts.php?id=<?= get_pure_data($post, 'id'); ?>">
            Показать комментарии
        </a>
    </div>
<?php else: ?>
    <div class="comments">
        <div class="comments__list-wrapper">

            <?php if (count(empty($comments) || $comments === 0)): ?>

                <small> К этому посту пока нет комментариев</small>

            <?php else: ?>

                <ul class="comments__list">
                    <?php foreach ($comments as $comment): ?>
                        <li class="comments__item user">
                            <div class="comments__avatar">
                                <a class="user__avatar-link" href="profile.php?user=<?= get_pure_data($post, 'user_id'); ?>">
                                    <img class="comments__picture"
                                         src="<?= get_avatar(get_pure_data($comment, 'avatar')); ?>"
                                         alt="Аватар пользователя">
                                </a>
                            </div>
                            <div class="comments__info">
                                <div class="comments__name-wrapper">
                                    <a class="comments__user-name" href="profile.php?user=<?= get_pure_data($post, 'user_id'); ?>">
                                        <span><?= get_pure_data($comment, 'username'); ?></span>
                                    </a>
                                    <time class="comments__time" datetime="2019-03-20">
                                        <?= get_pure_data($comment, 'creation_date'); ?>
                                    </time>
                                </div>
                                <p class="comments__text">
                                    <?= get_pure_data($comment, 'text'); ?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a class="comments__more-link" href="#">
                    <span>Показать все комментарии</span>
                    <sup class="comments__amount">45</sup>
                </a>

            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>