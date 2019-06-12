<div class="<?= $classname; ?>">
    <article class="card p-4">

        <?= $post_header_content ?? ''; ?>

        <div title="<?= get_pure_data($post, 'title'); ?>">
            <iframe style="max-width: 95%;" class="post-video__preview" <?= get_video_id($post); ?>
                <?= get_video_size($classname); ?> src="<?= get_pure_youtube_link($post, 'youtube_id'); ?>">
            </iframe>
        </div>

        <?= $post_footer_content ?? ''; ?>
    </article>
</div>