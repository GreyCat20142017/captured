<footer class="post__footer post__indicators">
    <div class="post__buttons">
        <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
            <svg class="post__indicator-icon" width="20" height="17">
                <use xlink:href="#icon-heart"></use>
            </svg>
            <svg class="post__indicator-icon post__indicator-icon--like-active" width="20"
                 height="17">
                <use xlink:href="#icon-heart-active"></use>
            </svg>
            <span><?= isnull(get_pure_data($post, 'likes_count'), 0); ?></span>
            <span class="visually-hidden">количество лайков</span>
        </a>
        <a class="post__indicator post__indicator--comments button"
           href="post_details.php?post=<?= get_pure_data($post, 'post_id'); ?>"
           title="Комментарии и другая детальная информация о публикации">
            <svg class="post__indicator-icon" width="19" height="17">
                <use xlink:href="#icon-comment"></use>
            </svg>
            <span><?= isnull(get_pure_data($post, 'comments_count'), 0); ?></span>
            <span class="visually-hidden">количество комментариев</span>
        </a>
    </div>
</footer>