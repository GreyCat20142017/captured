<footer>
    <div class="card-footer text-black-50 mt-2">
        <a class="mr-2 text-black-50" <?= get_like_href_title($post); ?>>
        <span <?= set_post_id($post, '-like'); ?>>
                <?= isnull(get_pure_data($post, 'likes_count'), 0); ?>
        </span>
            <i class="far fa-heart ml-1"></i>

        </a>
        <a class="mr-2 text-black-50" href="post_details.php?post=<?= get_pure_data($post, 'post_id'); ?>"
           title="Комментарии и другая детальная информация о публикации">
            <span  <?= set_post_id($post, '-comment'); ?>>
                <?= isnull(get_pure_data($post, 'comments_count'), 0); ?>
            </span>
            <i class="far fa-comment ml-1"></i>
        </a>
        <a class="mr-2 text-black-50" <?= get_repost_href_title($post); ?>>
             <span <?= set_post_id($post, '-repost'); ?>>
                <?= isnull(get_pure_data($post, 'reposts_count'), 0); ?>
            </span>
            <i class="fas fa-sync ml-1"></i>
        </a>
    </div>
</footer>