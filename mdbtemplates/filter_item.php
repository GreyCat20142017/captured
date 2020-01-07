<li class="<?= $li_classname; ?>">
    <a class="fab btn p-2 rounded-circle rgba-white-slight <?= $a_classname; ?>"
       href="<?= rebuild_query_string($script_name, $query_string, $param, $value); ?>" title="<?= $filter_text; ?>">
        <?= $filter_fa_mdb; ?>
        <span class="<?= $vh; ?>"><?= $filter_text; ?></span>
    </a>
</li>
