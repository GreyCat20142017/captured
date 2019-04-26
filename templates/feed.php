<main class="page__main page__main--feed">
    <div class="container">
        <h1 class="page__title page__title--feed">Моя лента</h1>
    </div>
    <div class="page__main-wrapper container">
        <section class="feed">
            <h2 class="visually-hidden">Лента</h2>

            <div class="<?= $content_classname; ?>">
                <?= $posts_content; ?>
            </div>

            <ul class="feed__filters filters">
                <li class="feed__filters-item filters__item">
                    <a class="filters__button <?= get_switch_classname($active_tab,
                        FILTER_ALL); ?>" href="feed.php?filter=<?= FILTER_ALL; ?>">
                        <span>Все</span>
                    </a>
                </li>
                <li class="feed__filters-item filters__item">
                    <a class="filters__button filters__button--photo <?= get_switch_classname($active_tab,
                        FILTER_PHOTOS); ?> button" href="feed.php?filter=<?= FILTER_PHOTOS; ?>">
                        <span class="visually-hidden">Фото</span>
                        <svg class="filters__icon" width="22" height="18">
                            <use xlink:href="#icon-filter-photo"></use>
                        </svg>
                    </a>
                </li>
                <li class="feed__filters-item filters__item">
                    <a class="filters__button filters__button--video <?= get_switch_classname($active_tab,
                        FILTER_VIDEOS); ?> button" href="feed.php?filter=<?= FILTER_VIDEOS; ?>">
                        <span class="visually-hidden">Видео</span>
                        <svg class="filters__icon" width="24" height="16">
                            <use xlink:href="#icon-filter-video"></use>
                        </svg>
                    </a>
                </li>
                <li class="feed__filters-item filters__item">
                    <a class="filters__button filters__button--text <?= get_switch_classname($active_tab,
                        FILTER_TEXTS); ?> button" href="feed.php?filter=<?= FILTER_TEXTS; ?>">
                        <span class="visually-hidden">Текст</span>
                        <svg class="filters__icon" width="20" height="21">
                            <use xlink:href="#icon-filter-text"></use>
                        </svg>
                    </a>
                </li>
                <li class="feed__filters-item filters__item">
                    <a class="filters__button filters__button--quote <?= get_switch_classname($active_tab,
                        FILTER_QUOTES); ?> button" href="feed.php?filter=<?= FILTER_QUOTES; ?>">
                        <span class="visually-hidden">Цитата</span>
                        <svg class="filters__icon" width="21" height="20">
                            <use xlink:href="#icon-filter-quote"></use>
                        </svg>
                    </a>
                </li>
                <li class="feed__filters-item filters__item">
                    <a class="filters__button filters__button--link <?= get_switch_classname($active_tab,
                        FILTER_LINKS); ?> button" href="feed.php?filter=<?= FILTER_LINKS; ?>">
                        <span class="visually-hidden">Ссылка</span>
                        <svg class="filters__icon" width="21" height="18">
                            <use xlink:href="#icon-filter-link"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </section>

        <aside class="promo">
            <?= $promo_content; ?>
        </aside>

    </div>
</main>

