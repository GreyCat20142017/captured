<div class="mb-2 <?= $classname; ?>">
    <article class="card py-4 px-2 w-100">
        <?= $post_header_content ?? ''; ?>
        <div
            class="text-white text-center font-weight-bold d-flex align-items-start justify-content-center blue-gradient p-5 rounded">
            <?= get_inline_svg('quote-left', 20, 20, "white", "white"); ?>
            <blockquote class="mx-1">
                <p style="w-100 px-2">
                    <?= get_pure_data($post, 'text'); ?>
                </p>
                <cite><?= get_pure_data($post, 'author'); ?></cite>
            </blockquote>
            <?= get_inline_svg('quote-right', 20, 20, "white", "white"); ?>
        </div>
        <?= $post_footer_content ?? ''; ?>
    </article>
</div>