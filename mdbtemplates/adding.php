<main class="page__main page__main--adding-post">
    <div class="container">
        <h1 class="text-center">Добавить публикацию</h1>
    </div>
    <div class="adding-post container">
        <div class="adding-post__tabs-wrapper tabs">
            <div class="adding-post__tabs filters">
                <ul class="list-unstyled d-flex justify-content-center six-buttons">
                    <?= $filters_content; ?>
                </ul>
            </div>
            <div class="adding-post__tab-content">
                <?= $tab_content; ?>
            </div>
        </div>
    </div>
</main>
