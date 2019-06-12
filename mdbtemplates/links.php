<div class="<?= $classname; ?>">
    <article class="card p-4">
        <?= $post_header_content ?? ''; ?>

        <div class="text-center font-weight-bold d-flex align-items-start justify-content-start grey lighten-5 p-5">
            <img class="img-fluid"  width="40" height="40" src="<?= get_favicon(get_pure_data($post, 'ref')); ?>" alt="Иконка">
            <a class="mdb-color-text d-flex"
               href="<?= get_pure_data($post, 'ref'); ?>" title="Перейти по ссылке">

                <div class="mdb-color-text m-3">
                    <h3><?= get_pure_data($post, 'title'); ?></h3>
                    <p><?= get_pure_data($post, 'text'); ?></p>
                    <span><?= get_pure_data(parse_url(get_pure_data($post, 'ref')), 'host'); ?></span>
                </div>
            </a>

        </div>
        <?= $post_footer_content ?? ''; ?>
    </article>
</div>