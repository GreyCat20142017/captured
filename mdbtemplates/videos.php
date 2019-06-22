<div class="mb-2 <?= $classname; ?>">
    <article class="card p-4 w-100">

        <?= $post_header_content ?? ''; ?>

        <div title="<?= get_pure_data($post, 'title'); ?>">
            <iframe class="w-100" style="min-height: 300px; max-width: 100%;" class="post-video__preview" <?= get_video_id($post); ?>
                 src="<?= get_pure_youtube_link($post, 'youtube_id'); ?>">
            </iframe>
        </div>

        <?= $post_footer_content ?? ''; ?>
    </article>
</div>