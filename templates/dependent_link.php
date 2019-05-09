<div class="post-details__wrapper">
    <div class="post-details__main-block" style="padding: 60px;">
        <a class="post-link__external"
           href="<?= get_pure_data($post, 'ref'); ?>" title="Перейти по ссылке">
            <div class="post-link__icon-wrapper">
                <img src="<?= get_favicon(get_pure_data($post, 'ref')); ?>" alt="Иконка">
            </div>
            <div class="post-link__info">
                <p><?= get_pure_data($post, 'text'); ?></p>
                <span><?= get_pure_data(parse_url(get_pure_data($post, 'ref')), 'host'); ?></span>
            </div>
            <svg class="post-link__arrow" width="11" height="16">
                <use xlink:href="#icon-arrow-right-ad"></use>
            </svg>
        </a>
    </div>
</div>