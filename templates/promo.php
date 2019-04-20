<article class="promo__block <?= get_banner_classname($banner); ?>">
    <h2 class="visually-hidden">Рекламный блок</h2>
    <p class="promo__text">
        <?= get_pure_data($banner, 'text'); ?>
    </p>
    <a class="promo__link" href="<?= get_pure_data($banner, 'reference'); ?>" title="<?= get_pure_data($banner, 'reference'); ?>"">
        <?= get_pure_data($banner, 'description'); ?>
    </a>
</article>
