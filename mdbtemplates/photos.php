<div class="mb-2 <?= $classname; ?>">
    <article class="card p-4 w-100">
        <div class="px-3 py-1 w-100">
            <?= $post_header_content ?? ''; ?>
            <h3 class="h3-responsive mdb-color-text"><?= get_pure_data($post, 'title'); ?></h3>
        </div>
        <div class="view overlay z-depth-1-half d-block">
            <img class="img-fluid w-100 d-flex" src="<?= get_photo($post); ?>" alt="Фото от пользователя">
            <a href="post_details.php?post=<?= get_pure_data($post, 'post_id'); ?>">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <?= $post_footer_content ?? ''; ?>
    </article>
</div>