<div class="mb-2 <?= $classname; ?>">
    <article class="card p-4 w-100">

        <?= $post_header_content ?? ''; ?>

        <div class="video-container w-100">
            <a class="video-preview mdb-gradient flex-column js-indicator js-indicator--video" title="<?= get_pure_data($post, 'title'); ?>"
               data-youtube-id="<?= get_pure_data($post, 'youtube_id') ?>">
                <span class="h5-responsive text-white"><?= get_pure_data($post, 'title') ?></span>
                <span class="text-white mb-5"><?= get_pure_data($post, 'hashtag') ?></span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"
                            fill="white"/>
                    </svg>
            </a>
        </div>
        <?= $post_footer_content ?? ''; ?>
    </article>
</div>
