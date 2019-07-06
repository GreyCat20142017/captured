<main class="page__main page__main--publication">
    <div class="container">
        <h1 class="page__title page__title--publication"><?= get_pure_data($post, 'title'); ?></h1>
        <section class="post-details">
            <h2 class="visually-hidden">Публикация</h2>
            <div class="post-details__wrapper post-photo">

                <?php if (intval(get_pure_data($post, 'user_id')) === intval($current_user)) : ?>
                    <a class="post-details__close button button--close"
                        <?= get_delete_post_href_title($post); ?>>
                        <span class="visually-hidden">Удалить</span>
                        <svg class="button__close-icon" width="18" height="18">
                            <use xlink:href="#icon-close"></use>
                        </svg>
                    </a>
                <?php endif; ?>

                <div class="post-details__main-block post post--details">

                    <?= $dependent_content; ?>

                    <p style="text-align: center;">
                        <small><?= get_pure_data($post, 'hashtag'); ?></small>
                    </p>
                    <div class="post__indicators">


                        <div class="post__buttons" <?= set_post_id($post); ?>>
                            <a class="post__indicator post__indicator--likes button js-indicator js-indicator--likes"
                                <?= get_like_href_title($post); ?>>
                                <svg class="post__indicator-icon" width="20" height="17">
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20"
                                     height="17">
                                    <use xlink:href="#icon-heart-active"></use>
                                </svg>
                                <span><?= isnull(get_pure_data($post, 'likes_count'), 0); ?></span>
                                <span class="visually-hidden">количество лайков</span>
                            </a>
                            <a class="post__indicator post__indicator--comments button js-indicator js-indicator--comments"
                               href="<?= rebuild_query_string($active_script, $active_query, 'all_comments',
                                   !($shown)); ?>"
                               title="Комментарии">
                                <svg class="post__indicator-icon" width="19" height="17">
                                    <use xlink:href="#icon-comment"></use>
                                </svg>
                                <span><?= isnull(get_pure_data($post, 'comments_count'), 0); ?></span>
                                <span class="visually-hidden">количество комментариев</span>
                            </a>
                            <a class="post__indicator post__indicator--repost button js-indicator js-indicator--repost"
                                <?= get_repost_href_title($post); ?>>
                                <svg class="post__indicator-icon" width="19" height="17">
                                    <use xlink:href="#icon-repost"></use>
                                </svg>
                                <span><?= isnull(get_pure_data($post, 'reposts_count'), 0); ?></span>
                                <span class="visually-hidden">количество репостов</span>
                            </a>
                        </div>
                        <span class="post__view"><?= $reviews_count_text; ?></span>
                    </div>
                    <div class="comments">

                        <?= $comments_form_content; ?>

                        <div class="comments__list-wrapper">
                            <?= $comments_content; ?>
                            <?php if ($need_more_comments): ?>
                                <a class="comments__more-link"
                                   href="<?= rebuild_query_string($active_script, $active_query, 'all_comments',
                                       !($shown)); ?>">
                                    <span><?= $shown ? 'Cкрыть больше ' . COMMENTS_PREVIEW_COUNT . ' комментариев' : 'Показать все комментарии'; ?></span>
                                    <sup class="comments__amount"><?= isnull(get_pure_data($post, 'comments_count'),
                                            0); ?> </sup>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="post-details__user user js-user">
                    <?= $user_content; ?>
                </div>
            </div>
        </section>
    </div>
</main>
