<?php

    session_start();
    require_once('init.php');

    $errors = [];
    $user = [];

    $is_ok = true;

    $active_tab = isset($_GET['filter']) ? trim(strip_tags($_GET['filter'])) : null;
    $category_id = empty($active_tab) || $active_tab === FILTER_ALL ? null :
        get_id_by_value($connection, 'categories', 'content_type', $active_tab);

    $page = isset($_GET['page']) ? intval(strip_tags($_GET['page'])) : 1;
    $page_count = get_posts_total_pages($connection, RECORDS_PER_PAGE, $category_id);

    dump($page_count);

    $posts = get_posts($connection, $active_tab, RECORDS_PER_PAGE, ($page - 1) * RECORDS_PER_PAGE);

    $pagination_content = include_template('pagination.php', [
        'page_count' => $page_count,
        'pages' => range(1, $page_count),
        'active_page' => $page,
        'active_query' => $_SERVER['QUERY_STRING'],
        'active_script' =>  $_SERVER['PHP_SELF']
    ]);

    $page_content = include_template('popular.php', [
        'user' => $user,
        'active_tab' => empty($active_filter) ? FILTER_ALL : $active_filter,
        'content_classname' => empty($posts) ? 'popular__posts popular__posts--no-content' : 'popular__posts',
        'active_tab' => $active_tab,
        'posts_content' => get_post_content($posts, 'popular', true),
        'pagination_content' => ($page_count > 1) ? $pagination_content : '',
        'filters_content' => get_filters_content(
            $active_tab,
            'popular.php',
            'popular__filters-item filters__item',
            'filters__button button ',
            'visually-hidden',
            false)
    ]);

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => CONTENT_POPULAR,
        'filter_type' => 'filter',
        'filter_value' => $active_tab
    ]);

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => empty($posts) ? 'Readme: моя лента (нет публикаций в текущем разделе)' : 'Readme: все',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? 'page' : '',
            'user_name' => get_auth_user_property('name')
        ]);

    print($layout_content);