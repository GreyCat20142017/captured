<div class="post-details__wrapper">
    <div class="post-details__main post-details__main-block" style="padding: 60px;">
        <blockquote>
            <p>
                <?= get_pure_data($post, 'text'); ?>
            </p>
            <cite><?= get_pure_data($post, 'author'); ?></cite>
        </blockquote>
    </div>
</div>