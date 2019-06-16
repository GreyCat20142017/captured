<?php

    session_start();
    require_once('init.php');

    if (!is_auth_user()) {
        http_response_code(302);
        header('Location: login.php');
    }

    $errors = [];
    $user = [];
    $is_ok = true;
    $search_string = get_auth_user_property('last_search', $search_string ?? '') ?? '';
    $active_tab = isset($_GET['filter']) ? strip_tags($_GET['filter']) : null;

    $page = isset($_GET['page']) ? intval(strip_tags($_GET['page'])) : 1;

    $user_id = intval(get_auth_user_property('id'));
    $page_count = get_feed_total_pages($connection, $user_id, RECORDS_PER_PAGE);
    $posts = get_posts_for_feed($connection, $user_id, $active_tab, RECORDS_PER_PAGE,
        ($page - 1) * RECORDS_PER_PAGE);
    $banners = get_banners($connection);

    $pagination_content = include_template('pagination.php', [
        'page_count' => $page_count,
        'pages' => range(1, $page_count),
        'active_page' => $page,
        'active_query' => $_SERVER['QUERY_STRING'],
        'active_script' => $_SERVER['PHP_SELF']
    ]);

    $filters_content = get_filters_content(
        $active_tab,
        $_SERVER['PHP_SELF'],
        $_SERVER['QUERY_STRING'],
        'feed__filters-item filters__item ',
        'filters__button button ',
        'visually-hidden',
        false);

    $use_mdb = !empty(get_auth_user_property('mdb', MDB));
    if ($use_mdb) {
        $filters_dropdown_content = get_filters_content(
            $active_tab,
            $_SERVER['PHP_SELF'],
            $_SERVER['QUERY_STRING'],
            'feed__filters-item filters__item dropdown-item',
            'filters__button button ',
            'visually-hidden',
            false);
    }

    $page_content = include_template('feed.php', [
        'user' => $user,
        'posts_content' => get_post_content($posts, 'feed'),
        'promo_content' => get_various_content($banners, 'promo.php', 'banner'),
        'pagination_content' => ($page_count > 1) ? $pagination_content : '',
        'active_tab' => empty($active_tab) ? FILTER_ALL : $active_tab,
        'content_classname' => empty($posts) ? 'feed__wrapper feed__wrapper--no-content' : 'feed__wrapper',
        'filters_content' => $filters_content
    ]);

    $header_content = include_template('header_logged.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => CONTENT_FEED,
        'filter_type' => 'filter',
        'filter_value' => $active_tab,
        'search_string' => $search_string,
        'unread_count' => get_unread_count($connection, get_auth_user_property('id')),
        'filters_content' => $filters_dropdown_content ?? $filters_content,
        'script' => $_SERVER['PHP_SELF']
    ]);

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => empty($posts) ? 'Readme: моя лента (нет публикаций в текущем разделе)' : 'Readme: все',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? 'page--main' : '',
            'user_name' => get_auth_user_property('name'),
            'js_scripts' => ['backend.js', 'ajax.js']
        ]);

    print($layout_content);