<header style="padding-top: 80px;">
    <div class="col-sm-12 mx-auto fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark indigo">
            <div class="container mx-auto">

                <a class="navbar-brand" href="index.php" title="Трофейно-контрафактный Readme:-)">
                    <i class="fas fa-paw mx-3"></i>Captured
                </a>

                <div class="btn-group">
                    <a class="nav-link dropdown-toggle font-weight-bold text-white-50" id="filters"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" title="Фильтры">
                        <i class="fas fa-filter text-white-50"></i> &nbsp;
                    </a>


                    <ul class="col-1 list-unstyled dropdown-menu dropdown-primary" id="filters_ul"
                        aria-labelledby="filters">
                        <li class="dropdown-item pt-4">
                            <a class="filters__button fab btn p-3 rounded-circle rgba-white-slight <?= get_switch_classname($filter_value ?? FILTER_ALL,
                                FILTER_ALL); ?>"
                               href="feed.php?filter=<?= FILTER_ALL; ?>" title="Все">
                                <i class="fas fa-th"></i>
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
                                <i class="fas fa-search text-white"></i>
                            </button>
                        </div>
                    </form>

                    <!-- Links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= get_mdb_active($active_content, CONTENT_POPULAR, 'active'); ?>"
                                <?= get_content_href(CONTENT_POPULAR, $active_content, $filter_type, $filter_value); ?>
                               title="Популярные">
                                <i class="far fa-star btn-lg"></i>
                                <span class="d-md-none ml-2">Популярные</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= get_mdb_active($active_content, CONTENT_FEED, 'active'); ?>"
                                <?= get_content_href(CONTENT_FEED, $active_content, $filter_type, $filter_value); ?>
                               title="Моя лента">
                                <i class="fas fa-align-justify btn-lg"></i>
                                <span class="d-md-none ml-2">Моя лента</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link <?= get_mdb_active($active_content, CONTENT_MESSAGES, 'active'); ?>"
                                <?= get_content_href(CONTENT_MESSAGES, $active_content, $filter_type, $filter_value); ?>
                               title="Сообщения">
                                <i class="far fa-comments btn-lg"></i>
                                <span class="d-md-none ml-2">Сообщения</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown d-flex my-2 mx-3">
                            <img src="<?= get_avatar(get_auth_user_property('avatar')) ?>" width="40" height="40"
                                 class="rounded-circle z-depth-0 mr-2" alt="ava">

                            <a class="nav-link dropdown-toggle font-weight-bold" id="navbarDropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false"><?= $user_name; ?> &nbsp;</a>

                            <div class="dropdown-menu dropdown-primary px-2" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="profile.php">Профиль</a>
                                <a class="dropdown-item" href="messages.php">Сообщения
                                    <i>(<?= $unread_count ?? 0; ?>)</i>
                                </a>
                                <a class="dropdown-item" href="user_config.php">Настройки</a>
                                <a class="dropdown-item" href="logout.php">Выход</a>
                            </div>
                        </li>

                    </ul>

                </div>
                <!-- Collapsible content -->
                <a class="btn btn-outline text-white border" href="adding.php"><i class="fas fa-plus mr-2"></i> Пост</a>
            </div>
        </nav>
    </div>
</header>
