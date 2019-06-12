<!--<div class="post-details__wrapper">-->
<!--    <div class="post-details__main post-details__main-block" style="padding: 60px;">-->
<!--        <blockquote>-->
<!--            <p>-->
<!--                --><?//= get_pure_data($post, 'text'); ?>
<!--            </p>-->
<!--            <cite>--><?//= get_pure_data($post, 'author'); ?><!--</cite>-->
<!--        </blockquote>-->
<!--    </div>-->
<!--</div>-->

<div class="post-details__wrapper">
    <div class="post-details__main post-details__main-block" style="padding: 60px;">
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
    </div>
</div>