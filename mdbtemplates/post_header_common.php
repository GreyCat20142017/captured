<header class="post__header post__author">
    <a class="" href="profile.php?user=<?= get_pure_data($post, 'user_id'); ?>" title="Автор">
        <div class="card-body pt-2 px-3">
            <div class="card-title d-flex mb-2 align-items-center">
                <img src="<?= get_avatar(get_pure_data($post, 'avatar')); ?>"
                     width="50" height="50" class="rounded-circle z-depth-0 ml-3" alt="ava">
                <div class="card-text d-flex flex-row mx-3 mt-3">
                    <h5 class="mdb-color-text pb-2"><strong><?= get_pure_data($post, 'username'); ?></strong></h5>
                    <span class="post__time"><?= get_pure_data($post, 'creation_date'); ?></span>
                </div>
            </div>
        </div>
    </a>
</header>