<header style="padding-top: 88px;">
    <div class="col-sm-12 mx-auto fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark indigo">
            <div class="container mx-auto">

                <a class="navbar-brand" href="index.php" title="Трофейно-контрафактный Readme:-)">
                    <?= get_inline_svg('paw', 20, 20, "white", "white"); ?>Captured
                </a>

                <div class="btn-group">
                    <a class="nav-link dropdown-toggle font-weight-bold text-white-50" id="filters"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" title="Фильтры">
                        <?= get_inline_svg('filter', 20, 20, "white", "white"); ?>&nbsp;
                    </a>

                    <ul class="col-1 list-unstyled dropdown-menu dropdown-primary" id="filters_ul"
                        aria-labelledby="filters">
                        <li class="dropdown-item pt-4">
                            <a class="filters__button fab btn p-3 rounded-circle rgba-white-slight <?= get_switch_classname($filter_value ?? FILTER_ALL,
                                FILTER_ALL); ?>"
                               href="feed.php?filter=<?= FILTER_ALL; ?>" title="Все">
                                <?= get_inline_svg('th', 20, 20, "white", "white"); ?>
                            </a>
                        </li>
                        <?= $filters_content ?? ''; ?>
                    </ul>
                </div>

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

                    <ul class="col-12 col-md-4 list-unstyled d-flex align-items-center justify-content-center">
                        <li>
                            <a class="btn btn-outline-white rounded btn-sm"
                               href="login.php">Вход
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-outline-white rounded btn-sm" href="registration.php">Регистрация</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
</header>