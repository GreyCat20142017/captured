<?php

    $upload_to = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['publish_photo'])) {
            $fields = [
                'photo-heading' => ['description' => 'Заголовок', 'required' => true],
                'userpic-file-photo' => ['description' => 'Фото', 'required' => true, 'validation_rules' => [FILE_RULE]]
            ];
            $upload_to = get_assoc_element(PATHS,PHOTOS);
            $tab = FILTER_PHOTOS;
        }
        if (isset($_POST['publish_video'])) {
            $fields = [
                'video-heading' => ['description' => 'Заголовок', 'required' => true],
                'userpic-file-video' => ['description' => 'Видео', 'required' => true, 'validation_rules' => ['youtube_validation']]
            ];
            $upload_to = get_assoc_element(PATHS,VIDEOS);
            $tab = FILTER_VIDEOS;
        }
        if (isset($_POST['publish_quote'])) {
            $fields = [
                'quote-heading' => ['description' => 'Заголовок', 'required' => true],
                'quote-text' => ['description' => 'Цитата', 'required' => true],
                'quote-author' => ['description' => 'Автор', 'required' => true]
            ];
            $tab = FILTER_QUOTES;
        }
        if (isset($_POST['publish_text'])) {
            $fields = [
                'text-heading' => ['description' => 'Заголовок', 'required' => true],
                'post-text' => ['description' => 'Текст поста', 'required' => true]
            ];
            $tab = FILTER_TEXTS;
        }
        if (isset($_POST['publish_link'])) {
            $fields = [
                'link-heading' => ['description' => 'Заголовок', 'required' => true],
                'post-link' => ['description' => 'Ссылка', 'required' => true, 'validation_rules' => ['url_validation']],
                'post-text' => ['description' => 'Описание', 'required' => true]
            ];
            $tab = FILTER_LINKS;
        }


        $post = array_map(function ($item) {
            return trim(strip_tags($item));
        }, $_POST);


        $errors = get_validation_result($fields, $post, $_FILES);
        $status_ok = empty(get_form_validation_classname($errors)) && is_auth_user();

        $image_fields = get_file_fields($fields);
        if ($status_ok) {
            try_upload_files($image_fields, $_FILES, $errors, $upload_to,  $post);
            $title = get_assoc_element($post, array_keys($fields)[0]);
            $add_result = add_post($connection, $post, $title, $tab, get_auth_user_property('id'));

            if (!empty($add_result)) {
                header('Location: post_details.php?post=' . $add_result);
            } else {
                header('Location: post_details.php?post=add_post_error' );
            }
        }
        /**
         * Если были ошибки, изображения нужно загрузить снова в любом случае
         */
        $_FILES = [];
        foreach ($image_fields as $key_image_field => $image_field) {
            $description = get_assoc_element($fields, $key_image_field);
            set_assoc_element($description, 'errors', []);
        }

    } 