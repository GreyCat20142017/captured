<header class="header" style="padding-top: 88px;">
    <div class="col-sm-12 mx-auto fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark indigo">
            <div class="container mx-auto">

                <a class="navbar-brand" href="index.php" title="Трофейно-контрафактный Readme:-)">
                    <?= get_inline_svg('paw', 30, 30, "white", "white"); ?></i>
                    <small class="ml-2 text-uppercase font-weight-bold">Captured</small>
                </a>

                <?php if (!empty($filters_content)): ?>
                    <div class="btn-group">
                        <a class="nav-link dropdown-toggle font-weight-bold text-white-50" id="filters"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" title="Фильтры">
                            <?= get_inline_svg('filter', 20, 20, "white", "white"); ?>
                        </a>


                        <ul class="col-1 list-unstyled dropdown-menu dropdown-primary" id="filters_ul"
                            aria-labelledby="filters">
                            <li class="dropdown-item pt-4">
                                <a class="filters__button fab btn p-3 rounded-circle rgba-white-slight <?= get_switch_classname($filter_value ?? FILTER_ALL,
                                    FILTER_ALL); ?>"
                                   href="<?= empty($script) ? '' : $script . '?filter= ' . FILTER_ALL; ?>" title="Все">
                                    <?= get_inline_svg('th', 20, 20, "grey", "grey"); ?>
                                </a>
                            </li>
                            <?= $filters_content ?? ''; ?>
                        </ul>
                    </div>
                <?php endif; ?>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                        aria-controls="basicExampleNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <form class="form-inline mr-3" action="<?= $search_script ?? 'search_result.php'; ?>" method="post">
                        <div class="md-form my-0">
                            <input class="form-control border-light"
                                   type="search" name="search" placeholder="Поиск" aria-label="Поиск"
                                   value="<?= strip_tags($search_string ?? ''); ?>">
                            <button class="btn p-1 mx-0 my-2 btn-floating" type="submit" title="Найти">
                                <?= get_inline_svg('search', 20, 20, "white", "white"); ?>
                            </button>
                        </div>
                    </form>

                    <!-- Links -->
                    <ul class="navbar-nav mt-2 ml-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= get_mdb_active($active_content, CONTENT_POPULAR, 'active'); ?>"
                                <?= get_content_href(CONTENT_POPULAR, $active_content, $filter_type, $filter_value); ?>
                               title="Популярные">
                                <?= get_inline_svg('star', 20, 20, "white", "white"); ?>
                                <span class="d-md-none ml-2">Популярные</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= get_mdb_active($active_content, CONTENT_FEED, 'active'); ?>"
                                <?= get_content_href(CONTENT_FEED, $active_content, $filter_type, $filter_value); ?>
                               title="Моя лента">
                                <?= get_inline_svg('photo-video', 20, 20, "white", "white"); ?>
                                <span class="d-md-none ml-2">Моя лента</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link <?= get_mdb_active($active_content, CONTENT_MESSAGES, 'active'); ?>"
                                <?= get_content_href(CONTENT_MESSAGES, $active_content, $filter_type, $filter_value); ?>
                               title="Сообщения">
                                <?= get_inline_svg('comments', 20, 20, "white", "white"); ?>
                                <span class="d-md-none ml-2">Сообщения</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav mt-2 ml-auto">
                        <li>
                            <a class="btn btn-outline-white rounded btn-sm col-12 col-md-auto"
                               href="login.php">Вход
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-outline-white rounded btn-sm col-12 col-md-auto"
                               href="registration.php">Регистрация</a>
                        </li>
                    </ul>

                </div>
        </nav>
    </div>
</header>
