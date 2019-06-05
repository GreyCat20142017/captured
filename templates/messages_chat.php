<?php if (!empty($messages)): ?>
    <ul class="messages__list">
        <?php foreach ($messages as $message): ?>
            <li class="messages__item <?= intval(get_pure_data($message, 'is_own')) ? 'messages__item--my' : ''; ?>">
                <div class="messages__info-wrapper">
                    <div class="messages__item-avatar">
                        <a class="messages__author-link"
                           href="profile.php?user=<?= get_pure_data($message, 'author_id'); ?>">
                            <img class="messages__avatar"
                                 src="<?= get_avatar(get_pure_data($message, 'author_avatar')); ?>"
                                 alt="Аватар пользователя">
                        </a>
                    </div>
                    <div class="messages__item-info">
                        <a class="messages__author"
                           href="profile.php?user=<?= get_pure_data($message, 'author_id'); ?>">
                            <?= get_pure_data($message, 'author_name'); ?>
                        </a>
                        <time class="messages__time" datetime="2019-05-01T14:40">
                            <?= get_pure_data($message, 'creation_date'); ?>
                        </time>
                    </div>
                </div>
                <p class="messages__text">
                    <?= get_pure_data($message, 'text'); ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
    <div style="margin-top: 20px;">
        <?= $pagination_content ?? ''; ?>
    </div>
<?php endif; ?>