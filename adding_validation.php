<?php

    $upload_to = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['publish_photo'])) {
            $fields = [
                'photo-heading' => [
                    'description' => 'Заголовок',
                    'required' => true,
                    'validation_rules' => ['check_length:2:128']
                ],
                'userpic-file-photo' => [
                    'description' => 'Фото',
                    'required' => true,
                    'validation_rules' => [FILE_RULE]
                ],
                'hashtag' => [
                    'description' => 'Хэштег',
                    'required' => false,
                    'validation_rules' => [HASH_RULE]
                ]
            ];
            $upload_to = get_assoc_element(PATHS, PHOTOS);
            $tab = FILTER_PHOTOS;
        }

        if (isset($_POST['publish_video'])) {
            $fields = [
                'video-heading' => [
                    'description' => 'Заголовок',
                    'required' => true,
                    'validation_rules' => ['check_length:2:128']
                ],
                'video-link' => [
                    'description' => 'Видео',
                    'required' => true,
                    'validation_rules' => ['youtube_validation']
                ],
                'hashtag' => [
                    'description' => 'Хэштег',
                    'required' => false,
                    'validation_rules' => [HASH_RULE]
                ]
            ];
            $upload_to = get_assoc_element(PATHS, VIDEOS);
            $tab = FILTER_VIDEOS;
        }

        if (isset($_POST['publish_quote'])) {
            $fields = [
                'quote-heading' => [
                    'description' => 'Заголовок',
                    'required' => true,
                    'validation_rules' => ['check_length:2:128']
                ],
                'quote-text' => [
                    'description' => 'Цитата',
                    'required' => true
                ],
                'quote-author' => [
                    'description' => 'Автор',
                    'required' => true,
                    'validation_rules' => ['check_length:2:32']
                ],
                'hashtag' => [
                    'description' => 'Хэштег',
                    'required' => false,
                    'validation_rules' => [HASH_RULE]
                ]
            ];
            $tab = FILTER_QUOTES;
        }

        if (isset($_POST['publish_text'])) {
            $fields = [
                'text-heading' => [
                    'description' => 'Заголовок',
                    'required' => true,
                    'validation_rules' => ['check_length:2:128']
                ],
                'post-text' => [
                    'description' => 'Текст поста',
                    'required' => true
                ],
                'hashtag' => [
                    'description' => 'Хэштег',
                    'required' => false,
                    'validation_rules' => [HASH_RULE]
                ]

            ];
            $tab = FILTER_TEXTS;
        }

        if (isset($_POST['publish_link'])) {
            $fields = [
                'link-heading' => [
                    'description' => 'Заголовок',
                    'required' => true,
                    'validation_rules' => ['check_length:2:128']
                ],
                'post-link' => [
                    'description' => 'Ссылка',
                    'required' => true,
                    'validation_rules' => ['url_validation', 'check_length:5:255']
                ],
                'post-text' => [
                    'description' => 'Описание',
                    'required' => true
                ],
                'hashtag' => [
                    'description' => 'Хэштег',
                    'required' => false,
                    'validation_rules' => [HASH_RULE]
                ]
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
            if (!empty($image_fields)) {
                $result = try_upload_files($image_fields, $_FILES, $errors, $upload_to, $post);
                if (!empty($result)) {
                    $post['original_filename'] = strip_tags($result);
                }
            }
            $title = get_assoc_element($post, array_keys($fields)[0]);
            $add_result = add_post($connection, $post, $title, $tab, get_auth_user_property('id'));

            if (!empty($add_result)) {
                header('Location: post_details.php?post=' . $add_result);
            } else {
                header('Location: post_details.php?post=add_post_error');
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