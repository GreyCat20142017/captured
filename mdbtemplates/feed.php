<main class="container">
    <div >
        <h1 class="text-center">Моя лента</h1>
    </div>
    <div class="row mx-auto">
        <section class="col-12 col-md-8">
            <h2 class="visually-hidden">Лента</h2>

            <div class="<?= $content_classname; ?> js-posts-container">
                <?= $posts_content; ?>
            </div>
        </section>

        <ul class="col-1 list-unstyled d-none d-md-block">
            <li class="pt-4">
                <a class="fab btn p-3 rounded-circle rgba-white-slight <?= get_switch_classname($active_tab, FILTER_ALL); ?>"
                   href="feed.php?filter=<?= FILTER_ALL; ?>" title="Все">
                    <?= get_inline_svg('th', 20, 20, "white", "white"); ?>
                </a>
            </li>
            <?= $filters_content; ?>
        </ul>

        <aside class="col-3 d-none d-lg-block">
            <?= $promo_content; ?>
        </aside>
    </div>
    <div style="max-width: 760px; transform: translateX(-200px)">
        <?= $pagination_content ?? ''; ?>
    </div>

</main>

