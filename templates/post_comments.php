<?php if (empty($expand) || !$expand): ?>

    <div class="comments">
        <?php if (intval(get_pure_data($post, 'comments_count')) === 0): ?>
            <span class="comments__button button"> Комментариев нет</span>
        <?php else: ?>
            <a class="comments__button button"
               href="<?= rebuild_query_string($active_script, $active_query, 'expand',
                   intval(get_pure_data($post, 'post_id'))); ?>">
                Показать комментарии
            </a>
        <?php endif; ?>
    </div>

<?php else: ?>

    <div class="comments">
        <div class="comments__list-wrapper">

            <?php if (count($comments ?? []) === 0): ?>

                <small> К этому посту пока нет комментариев</small>

            <?php else: ?>

                <ul class="comments__list">
                    <?php foreach ($comments as $comment): ?>
                        <li class="comments__item user">
                            <div class="comments__avatar">
                                <a class="user__avatar-link"
                                   href="profile.php?user=<?= get_pure_data($post, 'user_id'); ?>">
                                    <img class="comments__picture"
                                         src="<?= get_avatar(get_pure_data($comment, 'avatar')); ?>"
                                         alt="Аватар пользователя">
                                </a>
                            </div>
                            <div class="comments__info">
                                <div class="comments__name-wrapper">
                                    <a class="comments__user-name"
                                       href="profile.php?user=<?= get_pure_data($post, 'user_id'); ?>">
                                        <span><?= get_pure_data($comment, 'username'); ?></span>
                                    </a>
                                    <time class="comments__time" datetime="2019-03-20">
                                        <?= get_time_ago(get_pure_data($comment, 'creation_date')); ?>
                                    </time>
                                </div>
                                <p class="comments__text">
                                    <?= get_pure_data($comment, 'text'); ?>
                                </p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <?php if ($need_more_comments): ?>
                    <a class="comments__more-link"
                       href="<?= rebuild_query_string($active_script, $active_query, 'all_comments',
                           !($shown)); ?>">
                        <span><?= $shown ? 'Cкрыть больше ' . COMMENTS_PREVIEW_COUNT . ' комментариев' : 'Показать все комментарии'; ?></span>
                        <sup class="comments__amount"><?= isnull(get_pure_data($post, 'comments_count'),
                                0); ?> </sup>
                    </a>
                <?php endif; ?>

                <a class="comments__button button"
                   href="<?= rebuild_query_string($active_script, $active_query, 'expand',
                       0); ?>">
                    Скрыть комментарии
                </a>
            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>
