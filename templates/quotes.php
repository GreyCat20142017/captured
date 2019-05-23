<article class="<?= $classname; ?>__post post post-quote">
    <?= $post_header_content ?? ''; ?>
    <div class="post__main">
        <blockquote>
            <p>
                <?= get_pure_data($post, 'text'); ?>
            </p>
            <cite><?= get_pure_data($post, 'author'); ?></cite>
        </blockquote>
    </div>
    <?= $post_footer_content ?? ''; ?>
</article>