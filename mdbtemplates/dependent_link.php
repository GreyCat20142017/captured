<div class="post-details__wrapper">
    <div class="white shadow-sm rounded py-4 mb-2">
        <a class="mdb-color-text mt-2"
           href="<?= get_pure_data($post, 'ref'); ?>" title="Перейти по ссылке">
            <div class="post-link__icon-wrapper">
                <img src="<?= get_favicon(get_pure_data($post, 'ref')); ?>" alt="Иконка">
            </div>
            <div class="mdb-color-text p-2 mb-2 font-weight-bold">
                <p class="p-2"><?= get_pure_data($post, 'text'); ?></p>
                <span class="h5-responsive"><?= get_pure_data(parse_url(get_pure_data($post, 'ref')), 'host'); ?></span>
            </div>
        </a>
    </div>
</div>