<footer class="post__footer">
    <div class="post__indicators">
        <div class="post__buttons">
            <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                <svg class="post__indicator-icon" width="20" height="17">
                    <use xlink:href="#icon-heart"></use>
                </svg>
                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20" height="17">
                    <use xlink:href="#icon-heart-active"></use>
                </svg>
                <span><?= isnull(get_pure_data($post, 'likes_count'), 0); ?></span>
                <span class="visually-hidden">количество лайков</span>
            </a>
            <a class="post__indicator post__indicator--repost button" href="#" title="Репост">
                <svg class="post__indicator-icon" width="19" height="17">
                    <use xlink:href="#icon-repost"></use>
                </svg>
                <span><?= isnull(get_pure_data($post, 'reposts_count'), 0); ?></span>
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