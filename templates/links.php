<article class="feed__post post post-link">
    <header class="post__header post__author">
        <a class="post__author-link" href="#" title="Автор">
            <div class="post__avatar-wrapper">
                <img class="post__author-avatar" src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>"
                     alt="Аватар пользователя">
            </div>
            <div class="post__info">
                <b class="post__author-name"><?= get_pure_data($post, 'username'); ?></b>
                <span class="post__time"><?= get_pure_data($post, 'creation_date'); ?></span>
            </div>
        </a>
    </header>
    <div class="post__main">
        <div class="post-link__wrapper">
            <a class="post-link__external"
               href="<?= get_pure_data($post, 'ref'); ?>" title="Перейти по ссылке">
                <div class="post-link__icon-wrapper">
                    <img src="<?= get_favicon(get_pure_data($post, 'ref')); ?>" alt="Иконка">
                </div>
                <div class="post-link__info">
                    <h3><?= get_pure_data($post, 'title'); ?></h3>
                    <p><?= get_pure_data($post, 'text'); ?></p>
                    <span><?= get_pure_data(parse_url(get_pure_data($post, 'ref')), 'host'); ?></span>
                </div>
                <svg class="post-link__arrow" width="11" height="16">
                    <use xlink:href="#icon-arrow-right-ad"></use>
                </svg>
            </a>
        </div>
    </div>
    <?= $post_footer_content; ?>
</article>