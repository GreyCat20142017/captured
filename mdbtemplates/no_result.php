<section class="search">
    <h2 class="visually-hidden">Результаты поиска</h2>
    <div class="search__results-wrapper  container ">
        <div class="search__no-results font-weight-bold font-italic py-3">
            <p class="search__no-results-info">К сожалению, ничего не найдено.</p>
            <p class="search__no-results-info">Попробуйте изменить условие запроса.</p>
            <?= get_inline_svg('roger-white', 100, 100, 'navy', 'navy'); ?>
        </div>
        <div>
            <a class="btn btn-indigo" href="popular.php">Популярное</a>
            <a class="btn btn-light-blue" href="<?= $back; ?>">Вернуться назад</a>
        </div>
    </div>
</section>
