<?php

    session_start();
    require_once('init.php');

    $errors = [];
    $user = [];
    $db_user = [];
    $posts = [];
    $is_ok = true;

    /**
     * В режиме поиска FILTER_ALL  = FILTER_PEOPLE, но чтобы не плодить сущности и не усложнять код...
     */
    $active_tab = isset($_GET['filter']) ? trim(strip_tags($_GET['filter'])) : FILTER_ALL;
    $active_sort = SORT_DATE;

    $search_string = isset($_POST['search']) ? strip_tags($_POST['search']) : (get_auth_user_property('last_search',
            $search_string ?? '') ?? '');

    $category_id = empty($active_tab) || $active_tab === FILTER_ALL ? null :
        get_id_by_value($connection, 'categories', 'content_type', $active_tab);
    $page = isset($_GET['page']) ? intval(strip_tags($_GET['page'])) : 1;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {

        $search_string = strip_tags($_POST['search']);

    }
    if ($active_tab === FILTER_ALL) {
        $page_count = get_posts_authors_total_pages($connection, RECORDS_PER_PAGE, true, $search_string);
        $posts = get_posts_authors($connection, RECORDS_PER_PAGE, ($page - 1) * RECORDS_PER_PAGE, $search_string);
    } else {
        $page_count = get_posts_total_pages($connection, RECORDS_PER_PAGE, $category_id);
        $posts = get_posts($connection, $active_tab, RECORDS_PER_PAGE, ($page - 1) * RECORDS_PER_PAGE, $active_sort,
            $search_string);
    }

    $pagination_content = include_template('pagination.php', [
        'page_count' => $page_count,
        'pages' => range(1, $page_count),
        'active_page' => $page,
        'active_query' => $_SERVER['QUERY_STRING'],
        'active_script' => $_SERVER['PHP_SELF']
    ]);

    if (empty($posts)) {

        $content = include_template('no_result.php', [
            'back' => $_SERVER['HTTP_REFERER'] ?? 'popular.php'
        ]);

    } else {
        $logged_user_id = get_auth_user_property('id');
        $auth_user_subscriptions = array_values(array_column( get_auth_user_subscriptions($connection, $logged_user_id),
            'blogger_id'));
        $content = ($active_tab === FILTER_ALL) ?
            include_template('profile_subscriptions.php', [
                'subscriptions' => $posts,
                'is_own' => false,
                'logged_user_id' => $logged_user_id,
                'auth_user_subscriptions' => $auth_user_subscriptions,
            ]) :
            get_post_content($posts, 'search__tabs-item ', true);

    }

    $page_content = include_template('search_result.php', [
        'user' => $user,
        'errors' => $errors,
        'search_string' => $search_string,
        'content_classname' => empty($posts) ? 'tabs__content tabs__content--no-content' : 'tabs__content',
        'active_tab' => $active_tab,
        'active_sort' => $active_sort,
        'posts_content' => $content,
        'pagination_content' => ($page_count > 1) ? $pagination_content : '',
        'filters_content' => get_filters_content(
            $active_tab,
            $_SERVER['PHP_SELF'],
            $_SERVER['QUERY_STRING'],
            'search__tabs-item filters__item tabs__item',
            'search__tabs-link filters__button button',
            '',
            false),
        'active_query' => $_SERVER['QUERY_STRING'],
        'active_script' => $_SERVER['PHP_SELF']
    ]);

    $header_content = include_template(is_auth_user() ? 'header_logged.php' : 'header_normal.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => '',
        'filter_type' => null,
        'filter_value' => null,
        'search_string' => $search_string,
        'search_script' => 'search_result.php' . (isset($active_tab) ? '?filter=' . $active_tab : ''),
        'unread_count' => is_auth_user() ? get_unread_count($connection, get_auth_user_property('id')) : 0
    ]);

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => 'Readme: все',
            'is_auth' => is_auth_user(),
            'body_classname' => '',
            'user_name' => get_auth_user_property('name')
        ]);

    $_SESSION[CAPTURED_SESSION]['last_search'] = $search_string;

    print($layout_content);