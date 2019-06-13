<div class="mb-2 <?= $classname; ?>">
    <article class="card p-4">
        <?= $post_header_content ?? ''; ?>

        <div class="text-center font-weight-bold d-flex align-items-start justify-content-center grey lighten-5 p-5">

            <a class="mdb-color-text d-flex"
               href="<?= get_pure_data($post, 'ref'); ?>" title="Перейти по ссылке">
                <div class="mdb-color-text m-2">
                    <img class="img-fluid"  width="40" height="40" src="<?= get_favicon(get_pure_data($post, 'ref')); ?>" alt="Иконка">
                    <h3 class="h5-responsive my-3 mdb-color-text"><?= get_pure_data($post, 'title'); ?></h3>
                    <p><?= get_pure_data($post, 'text'); ?></p>
                    <span><?= get_pure_data(parse_url(get_pure_data($post, 'ref')), 'host'); ?></span>
                </div>
            </a>

        </div>
        <?= $post_footer_content ?? ''; ?>
    </article>
</div>