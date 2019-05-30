<footer class="post__footer">
    <div class="post__indicators">
        <div class="post__buttons" <?= set_post_id($post); ?>>
            <a class="post__indicator post__indicator--likes button" <?= get_like_href_title($post); ?>>
                <svg class="post__indicator-icon" width="20" height="17">
                    <use xlink:href="#icon-heart"></use>
                </svg>
                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20" height="17">
                    <use xlink:href="#icon-heart-active"></use>
                </svg>
                <span <?= set_post_id($post, '-like'); ?>>
                    <?= isnull(get_pure_data($post, 'likes_count'), 0); ?>
                </span>
                <span class="visually-hidden">количество лайков</span>
            </a>
            <a class="post__indicator post__indicator--comments button"
               href="post_details.php?post=<?= get_pure_data($post, 'post_id'); ?>"
               title="Комментарии и другая детальная информация о публикации">
                <svg class="post__indicator-icon" width="19" height="17">
                    <use xlink:href="#icon-comment"></use>
                </svg>
                <span  <?= set_post_id($post, '-comment'); ?>>
                    <?= isnull(get_pure_data($post, 'comments_count'),
                        0); ?>
                </span>
                <span class="visually-hidden">количество комментариев</span>
            </a>
            <a class="post__indicator post__indicator--repost button" <?= get_repost_href_title($post); ?>>
                <svg class="post__indicator-icon" width="19" height="17">
                    <use xlink:href="#icon-repost"></use>
                </svg>
                <span <?= set_post_id($post, '-repost'); ?>>
                    <?= isnull(get_pure_data($post, 'reposts_count'),
                        0); ?>
                </span>
                <span class="visually-hidden">количество репостов</span>
            </a>
        </div>
        <time class="post__time" datetime="2019-01-30T23:41"><?= get_pure_data($post, 'creation_date'); ?></time>
    </div>
    <p class="post__tags">
        <?= get_pure_data($post, 'hashtag'); ?>
    </p>
    <?= $post_comments_content; ?>
</footer>