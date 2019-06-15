<main class="page__main page__main--search-results">
    <h1 class="visually-hidden">Страница результатов поиска</h1>
    <section class="search">
        <h2 class="visually-hidden">Результаты поиска</h2>
        <div class="search__query-wrapper container">
            <div class="p-3 font-weight-bold font-italic indigo-text">
                <span>Вы искали:</span>
                <span class="search__query-text"><?= htmlspecialchars($search_string); ?></span>
            </div>
        </div>
        <div class="search__results-wrapper">
            <div class="search__tabs-wrapper tabs">
                <div class="container">
                    <div class="search__tabs filters">
                        <ul class="list-unstyled d-flex justify-content-center six-buttons">

                            <li class="search__tabs-item filters__item tabs__item">
                                <a class="fab btn p-3 rounded-circle rgba-white-slight search__tabs-link
                                filters__button button filters__button--video  waves-effect waves-light
                                <?= get_switch_classname($active_tab, FILTER_ALL); ?>"
                                   href="<?= rebuild_query_string($active_script, $active_query, 'filter',
                                       FILTER_ALL); ?>" title="Люди">
                                    <?= get_inline_svg('address-card', 20, 20, 'grey', 'grey'); ?>
                                    <span>Люди</span>
                                </a>
                            </li>

                            <?= $filters_content; ?>
                        </ul>
                    </div>

                    <div class="search__tab-content" style="margin-bottom: 15px;">
                        <?= $posts_content ?? '' ?>
                    </div>

                    <?= $pagination_content; ?>

                </div>
            </div>
        </div>
    </section>
</main>