<main>
<section class="container">

    <h1 class="text-center">Популярное</h1>

    <div class="popular">
        <div class="row px-3">
            <div class="d-flex align-items-center justify-content-center mx-auto">
                <p class="font-weight-bold m-0 p-0 mr-2 d-none d-md-block">Сортировка:</p>
                <ul class="d-flex list-unstyled btn-group">
                    <li class="sorting__item sorting__item--popular">
                        <a class="btn btn-sm btn-mdb-color form-check-label  <?= get_mdb_active($active_sort,
                            SORT_COMMENTS, 'sorting__link'); ?>"
                           style="max-height: 50px;"
                           href="<?= rebuild_query_string($active_script, $active_query, 'sort', SORT_COMMENTS); ?>"
                            title="Сортировка по популярности">
                            <span>Популярность</span>
                        </a>
                    </li>
                    <li class="sorting__item">
                        <a class="btn btn-sm btn-mdb-color form-check-label  <?= get_mdb_active($active_sort,
                            SORT_LIKES, 'sorting__link'); ?>"
                           style="max-height: 50px;"
                           href="<?= rebuild_query_string($active_script, $active_query, 'sort', SORT_LIKES); ?>"
                           title="Сортировка по количеству лайков">
                            <span>Лайки</span>
                        </a>
                    </li>
                    <li class="sorting__item">
                        <a class="btn btn-sm btn-mdb-color form-check-label <?= get_mdb_active($active_sort,
                            SORT_DATE, 'sorting__link'); ?>"
                           style="max-height: 50px;"
                           href="<?= rebuild_query_string($active_script, $active_query, 'sort', SORT_DATE); ?>"
                           title="Сортировка по дате создания">
                            <span>Дата</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="d-block d-md-flex align-items-center mx-auto">
                <p class="font-weight-bold mr-2 d-none d-md-block">Тип контента:</p>
                <ul class="d-none d-md-flex list-unstyled">
                    <li>
                        <a class="fab btn p-2 rounded-circle rgba-white-slight <?= get_switch_classname($active_tab, FILTER_ALL); ?>"
                           href="popular.php?filter=<?= FILTER_ALL; ?>" title="Все">
                            <?= get_inline_svg('th', 16, 16, "grey", "grey"); ?>
                        </a>
                    </li>
                    <?= $filters_content; ?>
                </ul>
            </div>

        </div>


        <div class="row d-flex flex-wrap align-items-start mt-2 <?= $content_classname; ?> js-posts-container">
            <?= $posts_content; ?>
        </div>

        <?= $pagination_content; ?>

    </div>
</section>

</main>
