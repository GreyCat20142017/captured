<div class="post__main">
    <div class="post-video__block">
        <div class="post-video__preview" title="<?= get_pure_data($post, 'title'); ?>">
            <iframe class="img-fluid mx-auto"  width="90%" <?= get_video_id($post); ?>
                 src="<?= get_pure_youtube_link($post, 'youtube_id'); ?>">
            </iframe>
        </div>
    </div>
</div>