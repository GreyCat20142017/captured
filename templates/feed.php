<main class="page__main page__main--feed">
    <div class="container">
        <h1 class="page__title page__title--feed">Моя лента</h1>
    </div>
    <div class="page__main-wrapper container">
        <section class="feed">
            <h2 class="visually-hidden">Лента</h2>

            <div class="<?= $content_classname; ?> js-posts-container">
                <?= $posts_content; ?>
            </div>

            <ul class="feed__filters filters">
                <li class="feed__filters-item filters__item filters__item--all">
                    <a class="filters__button  <?= get_switch_classname($active_tab, FILTER_ALL); ?>"
                       href="feed.php?filter=<?= FILTER_ALL; ?>">
                        <span>Все</span>
                    </a>
                </li>
                <?= $filters_content; ?>
            </ul>
        </section>
        <aside class="promo">
            <?= $promo_content; ?>
        </aside>
    </div>
    <div class="container" style="max-width: 760px; transform: translateX(-200px)">
        <?= $pagination_content ?? ''; ?>
    </div>

</main>

