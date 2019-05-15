<section class="page__main page__main--popular">
    <div class="container">
        <h1 class="page__title page__title--popular">Популярное</h1>
    </div>
    <div class="popular container">
        <div class="popular__filters-wrapper">
            <div class="popular__sorting sorting">
                <b class="popular__sorting-caption sorting__caption">Сортировка:</b>
                <ul class="popular__sorting-list sorting__list">
                    <li class="sorting__item sorting__item--popular">
                        <a class="sorting__link <?= get_switch_classname($active_sort,
                            SORT_COMMENTS, 'sorting__link'); ?>"
                           href="<?= rebuild_query_string($active_script, $active_query, 'sort', SORT_COMMENTS); ?>">
                            <span>Популярность</span>
                            <svg class="sorting__icon" width="10" height="12">
                                <use xlink:href="#icon-sort"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="sorting__item">
                        <a class="sorting__link <?= get_switch_classname($active_sort,
                            SORT_LIKES, 'sorting__link'); ?>"
                           href="<?= rebuild_query_string($active_script, $active_query, 'sort', SORT_LIKES); ?>">
                            <span>Лайки</span>
                            <svg class="sorting__icon" width="10" height="12">
                                <use xlink:href="#icon-sort"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="sorting__item">
                        <a class="sorting__link <?= get_switch_classname($active_sort,
                            SORT_DATE, 'sorting__link'); ?>"
                           href="<?= rebuild_query_string($active_script, $active_query, 'sort', SORT_DATE); ?>">
                            <span>Дата</span>
                            <svg class="sorting__icon" width="10" height="12">
                                <use xlink:href="#icon-sort"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="popular__filters filters">
                <b class="popular__filters-caption filters__caption">Тип контента:</b>
                <ul class="popular__filters-list filters__list">
                    <li class="popular__filters-item popular__filters-item--all filters__item filters__item--all">
                        <a class="filters__button filters__button--ellipse filters__button--all <?= get_switch_classname($active_tab,
                            FILTER_ALL); ?>"
                           href="<?= rebuild_query_string($active_script, $active_query, 'filter', FILTER_ALL); ?>">
                            <span>Все</span>
                        </a>
                    </li>
                    <?= $filters_content; ?>
                </ul>
            </div>

        </div>


        <div class="<?= $content_classname; ?>">
            <?= $posts_content; ?>
        </div>

        <?= $pagination_content; ?>

    </div>
</section>