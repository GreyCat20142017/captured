<?php if (!empty($messages)): ?>
    <ul class="messages__list list-unstyled rounded p-3" style="background-color: navy;">
        <?php foreach ($messages as $message): ?>
            <li class="rounded mb-2 p-2 messages__item
             <?= intval(get_pure_data($message, 'is_own')) ? ' ml-5 lime lighten-5 ' : ' mr-5 grey lighten-5'; ?>">
                <div class="messages__info-wrapper d-flex">
                    <div class="messages__item-avatar">
                        <a class="messages__author-link"
                           href="profile.php?user=<?= get_pure_data($message, 'author_id'); ?>">
                            <img class="messages__avatar rounded-circle mr-2" width="50" height="50"
                                 src="<?= get_avatar(get_pure_data($message, 'author_avatar')); ?>"
                                 alt="Аватар пользователя">
                        </a>
                    </div>
                    <div class="messages__item-info pl-2">
                        <a class="messages__author font-weight-bold mdb-color-text"
                           href="profile.php?user=<?= get_pure_data($message, 'author_id'); ?>">
                            <?= get_pure_data($message, 'author_name'); ?>
                        </a>
                        <time class="messages__time" datetime="2019-05-01T14:40"
                              title="<?= get_pure_data($message, 'creation_date'); ?>">
                            <small> (<?= get_time_ago(get_pure_data($message, 'creation_date')); ?>)</small>
                        </time>
                    </div>
                </div>
                <p class="messages__text p-3 mt-3 font-italic font-weight-bold  shadow-lg rounded">
                    <?= get_pure_data($message, 'text'); ?>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
    <div style="margin-top: 20px;">
        <?= $pagination_content ?? ''; ?>
    </div>
<?php endif; ?>
