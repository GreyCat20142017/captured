<?php
    session_start();
    require_once('init.php');

    $post_id = isset($_GET['post']) ? intval(strip_tags($_GET['post'])) : null;
    $post = !empty($post_id) ? get_post_details($connection, $post_id) : null;

    $current_user = get_auth_user_property('id', 0);

    $is_ok = (!empty($post_id) && !empty($post));



    if ($is_ok) {
        $user = get_user_info($connection, intval(get_assoc_element($post, 'user_id')));
        $user_content = include_template('post_details_user.php', [
            'user' => $user,
            'current_user' => $current_user
        ]);

        $comments = $is_ok ? get_post_comments ($connection, $post_id, COMMENTS_PREVIEW_COUNT) : [];
        $comments_content = include_template('comments.php', [
            'comments' => $comments
        ]);
    }

    $dependent_content = include_template('dependent_' .
        get_element(TEMPLATE_NAME, get_assoc_element($post, 'category_id')) . '.php', [
        'post' => $post
    ]);

    $page_content = include_template($is_ok ? 'post_details.php' : '404.php',
        [
            'post' => $post,
            'user_content' => $is_ok ? $user_content : '',
            'comments_content' => $is_ok ? $comments_content: '',
            'dependent_content' => $is_ok ? $dependent_content : '',
            'current_user' => $current_user
        ]);

    $header_content = include_template(is_auth_user() ? 'header_logged.php' : 'header_short.php', [
        'user_name' => get_auth_user_property('name'),
        'active_content' => '',
        'filter_type' => null,
        'filter_value' => null
    ]);

    $layout_content = include_template('layout.php',
        [
            'header_content' => $header_content,
            'page_content' => $page_content,
            'title' => 'Readme: профиль',
            'is_auth' => is_auth_user(),
            'body_classname' => is_auth_user() ? 'page--main' : '',
            'user_name' => get_auth_user_property('name')
        ]);

    if (!$is_ok) {
        http_response_code(404);
    }

    print($layout_content);