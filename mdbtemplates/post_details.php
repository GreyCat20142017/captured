<main class="container">
    <section class="post-details">
        <h2 class="visually-hidden">Детальная информация о публикации</h2>
        <div class="row text-center">

            <div class="position-relative col-12 col-lg-8 rgba-stylish-slight order-1 order-lg-0">

                <h3 class="h2-responsive p-2"><?= get_pure_data($post, 'title'); ?></h3>

                <?php if (intval(get_pure_data($post, 'user_id')) === intval($current_user)) : ?>
                    <a class="position-absolute"
                        <?= get_delete_post_href_title($post); ?>>
                        <span class="visually-hidden">Удалить</span>
                        <svg class="button__close-icon" width="18" height="18">
                            <use xlink:href="#icon-close"></use>
                        </svg>
                    </a>
                <?php endif; ?>

                <?= $dependent_content; ?>

                <p class="text-center">
                    <small><?= get_pure_data($post, 'hashtag'); ?></small>
                </p>

                <div class="indicators js-posts-container d-flex justify-content-between align-items-center px-2 pb-3">

                    <div class="buttons" <?= set_post_id($post); ?>>
                        <a class="ml-1 mdb-color-text js-indicator js-indicator--likes"
                            <?= get_like_href_title($post); ?>>
                            <?= get_inline_svg('heart', 20, 20, 'grey', 'grey'); ?>
                            <span <?= set_post_id($post, '-like'); ?>>
                                <?= isnull(get_pure_data($post, 'likes_count'), 0); ?>
                            </span>
                            <span class="visually-hidden">количество лайков</span>
                        </a>
                        <a class="ml-1 mdb-color-text js-indicator js-indicator--comments"
                           href="<?= rebuild_query_string($active_script, $active_query, 'all_comments',
                               !($shown)); ?>"
                           title="Комментарии">
                            <?= get_inline_svg('comments', 20, 20, 'grey', 'grey'); ?>
                            <span <?= set_post_id($post, '-comment'); ?>>
                                <?= isnull(get_pure_data($post, 'comments_count'), 0); ?>
                            </span>
                            <span class="visually-hidden">количество комментариев</span>
                        </a>
                        <a class="js-indicator js-indicator--repost ml-1 mdb-color-text"
                            <?= get_repost_href_title($post); ?>>
                            <?= get_inline_svg('sync-alt', 20, 20, 'grey', 'grey'); ?>
                            <span <?= set_post_id($post, '-repost'); ?>>
                                <?= isnull(get_pure_data($post, 'reposts_count'), 0); ?>
                            </span>
                            <span class="visually-hidden">количество репостов</span>
                        </a>
                    </div>
                    <div>
                        <?= get_inline_svg('eye', 20, 20, 'grey', 'grey'); ?>
                        <span class="m-1 ost__view"><?= $reviews_count_text; ?></span>
                    </div>
                </div>

                <div class="comments">

                    <?= $comments_form_content; ?>

                    <div class="comments__list-wrapper mt-2 p-3 mdb-color-text">
                        <?= $comments_content; ?>
                        <?php if ($need_more_comments): ?>
                            <a class="comments__more-link"
                               href="<?= rebuild_query_string($active_script, $active_query, 'all_comments',
                                   !($shown)); ?>">
                                <span><?= $shown ? 'Cкрыть больше ' . COMMENTS_PREVIEW_COUNT . ' комментариев' : 'Показать все комментарии'; ?></span>
                                <sup class="comments__amount"><?= isnull(get_pure_data($post, 'comments_count'),
                                        0); ?> </sup>
                            </a>
                        <? endif; ?>
                    </div>

                </div>
            </div>

            <div class="post-details__user user col-12 col-lg-4">
                <?= $user_content; ?>
            </div>
        </div>
    </section>

</main>