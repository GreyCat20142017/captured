<article>
    <h2 class="visually-hidden">Рекламный блок</h2>
    <div class="card m-4 card-image w-100">
        <div class="text-white text-center mdb-color p-4">
            <h5 class="card-title h5-responsive"> <?= get_pure_data($banner, 'text'); ?></h5>
            <a class="btn btn-sm btn-outline-light waves-effect waves-light"
               href="<?= get_pure_data($banner, 'reference'); ?>"
               title="<?= get_pure_data($banner, 'reference'); ?>">
                <?= get_pure_data($banner, 'description'); ?>
            </a>
        </div>
    </div>
</article>
