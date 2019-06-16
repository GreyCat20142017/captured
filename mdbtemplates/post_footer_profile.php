<footer>
    <div class="card-footer text-black-50 mt-2" <?= set_post_id($post); ?>>
        <a class="mr-2 text-black-50 js-indicator js-indicator--likes" <?= get_like_href_title($post); ?>>
        <span <?= set_post_id($post, '-like'); ?>>
                <?= isnull(get_pure_data($post, 'likes_count'), 0); ?>
        </span>
            <?= get_inline_svg('heart', 15, 15, "grey", "grey"); ?>
        </a>
        <a class="mr-2 text-black-50 js-indicator js-indicator--comments" href="post_details.php?post=<?= get_pure_data($post, 'post_id'); ?>"
           title="Комментарии и другая детальная информация о публикации">
            <span  <?= set_post_id($post, '-comment'); ?>>
                <?= isnull(get_pure_data($post, 'comments_count'), 0); ?>
            </span>
            <?= get_inline_svg('comment', 15, 15, "grey", "grey"); ?>
        </a>
        <a class="mr-2 text-black-50 js-indicator js-indicator--repost" <?= get_repost_href_title($post); ?>>
             <span <?= set_post_id($post, '-repost'); ?>>
                <?= isnull(get_pure_data($post, 'reposts_count'), 0); ?>
            </span>
            <?= get_inline_svg('sync-alt', 15, 15, "grey", "grey"); ?>
        </a>
    </div>
    <p class="text-center">
        <?= get_pure_data($post, 'hashtag'); ?>
    </p>
    <?= $post_comments_content; ?>
</footer>