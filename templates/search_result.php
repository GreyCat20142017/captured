<main class="page__main page__main--search-results">
    <h1 class="visually-hidden">Страница результатов поиска</h1>
    <section class="search">
        <h2 class="visually-hidden">Результаты поиска</h2>
        <div class="search__query-wrapper">
            <div class="search__query container">
                <span>Вы искали:</span>
                <span class="search__query-text"><?= $search_string; ?></span>
            </div>
        </div>
        <div class="search__results-wrapper">
            <div class="search__tabs-wrapper tabs">
                <div class="container">
                    <div class="search__tabs filters">
                        <b class="search__tabs-caption filters__caption">Показать:</b>
                        <ul class="search__tabs-list filters__list tabs__list">
                            <li class="search__tabs-item filters__item tabs__item">
                                <a class="search__tabs-link filters__button filters__button--users button
                                    <?= get_switch_classname($active_tab,FILTER_ALL); ?>"
                                    href="<?= rebuild_query_string($active_script, $active_query, 'filter', FILTER_ALL); ?>">
                                    <svg class="filters__icon" width="20" height="19">
                                        <use xlink:href="#icon-user"></use>
                                    </svg>
                                    <span>Люди</span>
                                </a>
                            </li>
                            <?= $filters_content; ?>
                        </ul>
                    </div>

                    <div class="search__tab-content">
                        <?= $posts_content ?? '' ?>
                    </div>

                    <?= $pagination_content; ?>

                </div>
            </div>
        </div>
    </section>
</main>