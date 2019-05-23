<article class="<?= $classname; ?>__post post post-link">
    <?= $post_header_content ?? ''; ?>
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
    <?= $post_footer_content ?? ''; ?>
</article>