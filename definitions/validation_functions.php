<?php
    /**
     * Функция возращает название класса для формы на основе переданного массива с результатами валидации
     * @param        $errors
     * @param string $status
     * @return string
     */
    function get_form_validation_classname (&$errors, $status = '') {
        return isset($errors) && array_reduce($errors, function ($total, $item) {
            $total += is_array($item) ? count($item) : 0;
            return $total;
        }) > 0 || !empty($status) ? 'form--invalid' : '';
    }

    /**
     * Функция возращает текст сообщения для формы на основе переданного массива с результатами валидации
     * @param $errors
     * @return string
     */
    function get_form_validation_message (&$errors) {
        return isset($errors) && array_reduce($errors, function ($total, $item) {
            $total += is_array($item) ? count($item) : 0;
            return $total;
        }) > 0 ? 'Пожалуйста, исправьте ошибки в форме' : '';
    }

    /**
     * Функция возращает название класса для обертки поля формы на основе переданного массива с результатами валидации
     * и названия поля Для изображения передается название класса.
     * @param        $errors
     * @param        $field_name
     * @param string $success_classname
     * @return string
     */
    function get_field_validation_classname (&$errors, $field_name, $success_classname = '') {
        $success_classname = is_array($errors) && count($errors) === 0 ? '' : $success_classname;
        $field_errors = get_assoc_element($errors, $field_name);
        return is_array($field_errors) && count($field_errors) > 0 ? ' form__input-wrapper--error ' : $success_classname;
    }

    /**
     * Функция возвращает описание ошибок валадации для поля по массиву ошибок и названию поля (название поля - ключ в
     * массиве с ошибками)
     * @param $errors
     * @param $field_name
     * @return string
     */
    function get_field_validation_message (&$errors, $field_name) {
        $field_errors = get_assoc_element($errors, $field_name);
        return is_array($field_errors) ? join('. ', $field_errors) : '';
    }

    /**
     * Функция возвращает результат валидации в виде ассоциативного массива с ключом 'Имя поля' по массиву с описанием
     * полей формы Сначала добавляются результаты проверок на required, затем - результаты дополнительных специфических
     * @param $fields
     * @param $form_data
     * @param $files
     * @return array
     */
    function get_validation_result ($fields, $form_data, &$files) {
        $errors = [];
        foreach ($fields as $field_name => $field) {
            $errors[$field_name] = [];
            $current_field = get_assoc_element($form_data, $field_name);
            if (get_assoc_element($field, 'required') &&
                empty($current_field) &&
                !in_array(FILE_RULE, get_assoc_element($field, 'validation_rules', true))) {
                add_error_message($errors, $field_name,
                    'Поле ' . get_assoc_element($field, 'description') . ' (' . $field_name . ') необходимо заполнить');
            }

            if (isset($field['validation_rules']) && is_array($field['validation_rules'])) {
                $rules = $field['validation_rules'];
                foreach ($rules as $rule) {
                    $is_required = get_assoc_element($field, 'required');
                    $is_special = get_assoc_element($field, 'special');
                    $rule_complexity = get_rule_complexity($rule);
                    if ($rule === FILE_RULE) {
                        $result = get_file_validation_result($field_name, $files, $is_required);
                    } elseif ($rule === HASH_RULE) {
                        hash_tag_validation(get_assoc_element($form_data, $field_name), $field_name, $errors);
                    } elseif (!$rule_complexity) {
                        $result = get_additional_validation_result($rule, $current_field);
                    } else {
                        $function_arguments = get_assoc_element($rule_complexity, 'arguments', true);
                        array_unshift($function_arguments, $form_data);
                        array_push($function_arguments, $field_name);
                        $function_name = get_assoc_element($rule_complexity, 'rule');
                        $result = call_user_func_array($function_name, $function_arguments);
                    }

                    if (!empty($result) && ($is_required || $is_special)) {
                        add_error_message($errors, $field_name, $result);
                    }
                }
            }
        }
        return $errors;
    }

    function nothing ($first, $second, $third) {

    }
    /** Всмомогательная функция для "сложных" правил валидации. Проверяет совпадение двух указанных полей формы
     * @param $data
     * @param $first
     * @param $second
     * @return string
     *
     */
    function equal_to ($data, $first, $second) {
        return get_assoc_element($data, $first) === get_assoc_element($data, $second) ? '' :
            'Значения полей ' . $first . ' и ' . $second . ' должны совпадать!';
    }

    /**
     * /** Всмомогательная функция для "сложных" правил валидации. Проверяет длину строки.
     * @param $value
     * @param $min
     * @param $max
     * @return string
     */
    function check_length ($data, $min, $max, $field_name) {
        $value = get_assoc_element($data, $field_name);
        $result = (mb_strlen($value, 'utf-8') >= intval($min) && mb_strlen($value, 'utf-8') <= intval($max));
        return $result ? '' : 'Поле должно быть строкой длиной от ' . $min . ' до ' . $max . ' символов';
    }

    /**
     * @param $rule
     * @return array|bool
     */
    function get_rule_complexity ($rule) {
        $tmp = explode(':', $rule);
        if (count($tmp) > 1) {
            $result = [
                'rule' => $tmp[0],
                'arguments' => array_slice($tmp, 1)
            ];
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * Функция возвращает результат проверки правильности выбора значения из списка
     * @param $item_value
     * @return string
     */
    function get_list_validation_result ($item_value) {
        return empty($item_value) || ($item_value === EMPTY_ITEM) ? 'Необходимо выбрать элемент!' : '';
    }

    /**
     * Функция проверяет, явяется ли параметр датой в формате ДД.ММ.ГГГГ больше текущей минимум на 1 день
     * @param $date
     * @return string
     */
    function get_date_validation_result ($date) {
        $error_message = 'Необходима дата в формате ДД.ММ.ГГГГ больше или равна текущей ';
        $now = date_create("now");
        $new_date = date_create_from_format('d.m.Y', $date);
        if (!$new_date || $date !== date_format($new_date, 'd.m.Y')) {
            $status = $error_message;
        } else {
            $status = ($new_date >= $now) ? '' : $error_message;
        }
        return $status;
    }

    /**
     * Функция-распределитель для вызова дополнительных проверок (правильности email и т.д)
     * @param $kind
     * @param $current_field
     * @return string
     */
    function get_additional_validation_result ($kind, $current_field) {
        switch ($kind) {
            case 'project_validation':
                return get_project_validation_result($current_field);
            case 'youtube_validation':
                return get_youtube_validation_result($current_field);
            case 'email_validation':
                return !filter_var($current_field, FILTER_VALIDATE_EMAIL) ? 'Email должен быть корректным' : '';
            case 'url_validation':
                return !filter_var($current_field, FILTER_VALIDATE_URL) ? 'Url должен быть корректным' : '';
            case 'date_validation':
                return get_date_validation_result($current_field);
            case 'auth_validation':
                return is_auth_user() ? '' : 'Необходимо авторизоваться';

            default:
                return '';
        }
    }

    /**
     * Функция проверяет, являются ли загружаемые файлы допустимого типа. Дальнейшие действия по загрузке и проверке
     * вынесены в другую функцию
     * @param $field_name
     * @param $files
     * @param $is_required
     * @return string
     */
    function get_file_validation_result ($field_name, &$files, $is_required) {
        if (isset($files[$field_name]['name'])) {
            if (intval(get_assoc_element($files[$field_name], 'error')) !== 0) {
                return 'Файл не загружен';
            }
            $tmp_name = $files[$field_name]['tmp_name'];
            $file_size = $files[$field_name]['size'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $file_type = finfo_file($finfo, $tmp_name);
            $is_ok = in_array($file_type, VALID_FILE_TYPES) && ($file_size <= MAX_FILE_SIZE);
            return $is_ok ? '' : 'Загружаемый файл должен быть в формате jpeg, png, txt или pdf и размером не более 200Кб';
        }
        return $is_required ? 'Необходимо загрузить файл в формате jpeg, png  (не более 200Кб)' : '';
    }

    /**
     * Фильтрует список описаний полей для последующей обработки загрузки изображений
     * @param $fields
     * @return array
     */
    function get_file_fields ($fields) {
        return array_filter($fields, function ($item) {
            return
                isset($item['validation_rules']) && is_array($item['validation_rules']) ?
                    in_array(FILE_RULE, $item['validation_rules'])
                    : false;
        });
    }

    /**
     * Функция пытается загрузить файл и записать путь к нему в данные формы, либо пополняет массив ошибок
     * @param $file_fields
     * @param $files
     * @param $errors
     * @param $file_path
     * @param $data
     */
    function try_upload_files ($file_fields, &$files, &$errors, $file_path, &$data) {
        foreach ($file_fields as $field_name => $field) {
            $tmp_name = $files[$field_name]['tmp_name'];
            if (!empty($tmp_name) && is_uploaded_file($tmp_name)) {
                $path = UI_START . uniqid('', true) . '.' . pathinfo($files[$field_name]['name'], PATHINFO_EXTENSION);
                if (check_and_repair_path($file_path)) {
                    move_uploaded_file($tmp_name, $file_path . $path);
                    $data[$field_name] = $path;
                    $original_filename = pathinfo($files[$field_name]['name'],
                            PATHINFO_FILENAME) . '.' . pathinfo($files[$field_name]['name'], PATHINFO_EXTENSION);
                } else {
                    add_error_message($errors, $field_name, 'Произошла ошибка при создании папки для загрузки файлов');
                }
            } else {
                $is_required = get_assoc_element($field, 'required');
                if ($is_required) {
                    add_error_message($errors, $field_name,
                        'Загрузка файла невозможна: ' . $files[$field_name]['tmp_name']);
                }
            }
        }
        return $original_filename ?? '';
    }

    /**
     * Функция добавляет описание ошибки в предназначенный для этого массив
     * @param $errors
     * @param $field_name
     * @param $error_message
     */
    function add_error_message (&$array, $field_name, $error_message) {
        if (isset($array) && array_key_exists($field_name, $array)) {
            array_push($array[$field_name], $error_message);
        }
    }

    /**
     * Добавляет только уникальные значения в массив
     * @param $array
     * @param $error_message
     */
    function add_if_not_exist (&$array, $error_message) {
        if (isset($array) && !in_array($error_message, $array)) {
            array_push($array, $error_message);
        }
    }

    /**
     * Функция по мотивам функции от HTML Academy. Проверяет, что переданная ссылка ведет на публично доступное видео с
     * youtube
     * @param string $youtube_url Ссылка на youtube видео
     * @return bool
     */
    function check_youtube_url ($youtube_url) {
        $res = false;
        $id = extract_youtube_id($youtube_url);
        if ($id) {
            $api_data = ['id' => $id, 'part' => 'id, status', 'key' => 'AIzaSyDkxJIV293lh3sfvW4GEi3WRVUvEQml_Mc'];
            $url = "https://www.googleapis.com/youtube/v3/videos?" . http_build_query($api_data);
            $resp = file_get_contents($url);
            if ($resp && $json = json_decode($resp, true)) {
                $res = $json['pageInfo']['totalResults'] > 0 && $json['items'][0]['status']['privacyStatus'] == 'public';
            }
        }
        return $res;
    }

    /**
     * Функция возвращает результат валидации ссылки youtube
     * @param $video
     * @return string
     */
    function get_youtube_validation_result ($video) {
        $result = 'Поле должно быть либо корректным videoId yotube (длиной 11 символов) либо правильной ссылкой youtube';
        $youtube_url = $video;
        if (mb_strlen(trim($video), 'utf-8') === 11) {
            $youtube_url = 'https://www.youtube.com/watch?v=' . $video;
        }
        return (filter_var($youtube_url, FILTER_VALIDATE_URL) && check_youtube_url($youtube_url)) ? '' : $result;
    }

    /**
     * Функция добавляет ошибки валидации хеш-тега в массив ошибок, в случае наличия таковых
     * @param $hashtag
     * @param $field_name
     * @param $errors
     */
    function hash_tag_validation ($hashtag, $field_name, &$errors) {
        if (!empty($hashtag)) {
            $tags = explode(' ', $hashtag);
            $tags_errors = [];
            foreach ($tags as $tag) {
                if (mb_substr($tag, 0, 1) !== '#') {
                    add_if_not_exist($tags_errors, SINGLE_TAG_RULES[NEED_START_HASH] ?? ' ошибка');
                }
                if ((mb_substr($tag, 0, 1) === '#') && (mb_strlen($tag, 'utf-8') < HASH_TAG_MIN_LENGTH)) {
                    add_if_not_exist($tags_errors, SINGLE_TAG_RULES[NOT_ONLY_HASH] ?? ' ошибка');
                }
                if ((mb_substr($tag, 0, 1) === '#') && (mb_strlen($tag, 'utf-8') > HASH_TAG_MAX_LENGTH)) {
                    add_if_not_exist($tags_errors, SINGLE_TAG_RULES[MAX_HASH_LENGTH] ?? 'ошибка');
                }
                $hash_count = preg_match_all('/#/', $tag, $hashes_in_tag);
                if ($hash_count > 1) {
                    add_if_not_exist($tags_errors, SINGLE_TAG_RULES[NEED_SPACE] ?? 'ошибка');
                }
            };

            if (count($tags) > count(array_unique($tags))) {
                add_if_not_exist($tags_errors, COMMON_TAG_RULES[DOUBLE_DETECTED] ?? 'ошибка');
            }
            if (count(array_unique($tags)) > HASH_TAG_MAX_AMOUNT) {
                add_if_not_exist($tags_errors, COMMON_TAG_RULES[TOO_MANY_TAGS] ?? 'ошибка');
            }

            if (mb_strlen($hashtag, 'utf-8') > 255) {
                add_if_not_exist($tags_errors, 'Длина хештега не должна превышать 255 символов');
            }

            if (count($tags_errors) > 0) {
                add_error_message($errors, $field_name, implode(' | ', $tags_errors));
            }
        }
    }