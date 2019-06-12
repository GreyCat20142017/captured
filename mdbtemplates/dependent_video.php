<div class="post__main">
    <div class="post-video__block">
        <div class="post-video__preview" title="<?= get_pure_data($post, 'title'); ?>">
            <iframe class="post-video__preview" <?= get_video_id($post); ?>
                <?= get_video_size($classname); ?> src="<?= get_pure_youtube_link($post, 'youtube_id'); ?>">
            </iframe>
        </div>
    </div>
</div>