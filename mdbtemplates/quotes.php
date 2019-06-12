<div class="<?= $classname; ?>">
<article class="card p-4">
    <?= $post_header_content ?? ''; ?>
    <div class="text-white text-center font-weight-bold d-flex align-items-start justify-content-center blue-gradient p-5">
        <i class="fas fa-quote-left mr-1"></i>
        <blockquote>
            <p>
                <?= get_pure_data($post, 'text'); ?>
            </p>
            <cite><?= get_pure_data($post, 'author'); ?></cite>
        </blockquote>
        </blockquote>
        <i class="fas fa-quote-right ml-1"></i>
    </div>
    <?= $post_footer_content ?? ''; ?>
</article>
</div>