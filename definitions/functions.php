<?php

    require_once('constants.php');
    require_once('connection.php');
    require_once('helpers.php');
    require_once('db_functions.php');
    require_once('validation_functions.php');
    require_once('session_functions.php');
    require_once('template_functions.php');

    /**
     * Функция проверяет существование ключа ассоциативного массива и возвращает значение по ключу, если
     * существуют ключ и значение. В противном случае будет возвращена пустая строка или пустой массив (если передан
     * третий параметр, запрашивающий пустой массив в случае отсутствия значения)
     * @param array  $data
     * @param string $key
     * @param bool   $array_return
     * @return array|string
     */
    function get_assoc_element ($data, $key, $array_return = false) {
        $empty_value = $array_return ? [] : '';
        return !empty($data) && is_array($data) && array_key_exists($key,
            $data) && !empty($data[$key]) ? $data[$key] : $empty_value;
    }

    /**
     * Функция проверяет существование ключа ассоциативного массива и устанавливает значение по ключу,
     * если существуют ключ. Возвращает true в случае успеха.
     * @param $data
     * @param $key
     * @param $value
     * @return bool
     */
    function set_assoc_element ($data, $key, $value) {
        $result = false;
        if (!empty($data) && array_key_exists($key, $data) && !empty($data[$key])) {
            $data[$key] = $value;
            $result = true;
        }
        return $result;
    }

    /**
     * Функция проверяет существование элемента массива и возвращает его, если он существует.
     * В противном случае будет возвращена пустая строка
     * @param         $array
     * @param         $index
     * @param boolean $array_return
     * @return any|string|array
     */
    function get_element ($array, $index, $array_return = false) {
        $empty_value = $array_return ? [] : '';
        return is_array($array) && isset($array[$index]) ? $array[$index] : $empty_value;
    }

    /**
     * Функция для предотвращения пустых атрибутов class в шаблоне.
     * Возвращает часть тега с названием класса, либо пустую строку
     * @param string $classname
     * @return string
     */
    function get_classname ($classname) {
        return empty($classname) ? '' : ' class="' . $classname . '" ';
    }

    /**
     * Функция проверяет наличие данных в массиве по ключу, фильтрует содержимое функцией strip_tags и убирает пробелы
     * @param $data
     * @param $key
     * @return string
     */
    function get_pure_data ($data, $key) {
        return !empty($data) && array_key_exists($key,
            $data) && !empty($data[$key]) ? trim(strip_tags($data[$key])) : '';
    }

    /**
     * Функция возвращает значение атрибута selected для выпадающего списка
     * @param $element_id
     * @param $current_id
     * @return string
     */
    function get_selected_state ($element_id, $current_id) {
        return $element_id === $current_id ? ' selected ' : '';
    }

    /** Функция пытается получить параметр msg из массива _GET. В случае неудачи выводит стандартное сообщение.
     * @param        $get
     * @param string $standard_message
     * @return string
     */
    function get_error_info (&$get, $standard_message = 'Данной страницы не существует на сайте.') {
        $message = get_pure_data($get, 'msg');
        return empty($message) ? $standard_message : $message;
    }

    /**
     * Функция позаимствована на просторах интернета. Проверяет является ли нечто существующей папкой.
     * @param $folder
     * @return bool
     */
    function folder_exists ($folder) {
        $path = realpath($folder);
        return ($path !== false AND is_dir($path));
    }

    /**
     * Функция проверяет, существует ли путь, при отсутствии - пытается создать. Возвращает true, если путь существует
     * @param $base
     * @return bool
     */
    function check_and_repair_path ($base) {
        $result = folder_exists($base);
        return $result ? $result : mkdir(trim($base), 0700, true);
    }

    /**
     * Функция возвращает название класса для кнопки пагинации активной страницы
     * @param $page
     * @param $active
     * @return string
     */
    function get_active_page_classname ($page, $active) {
        return ($page === $active) ? 'pagination-item-active' : '';
    }

    /**
     * Возвращает текст href для кнопки пагинации "Назад"
     * @param $pagination_context
     * @param $active
     * @param $pre_page_string
     * @return string
     */
    function get_prev_href ($pagination_context, $active, $pre_page_string) {
        return $active > 1 ? ' href="' . $pagination_context . '.php?' . $pre_page_string . 'page=' . ($active - 1) . '"' : '';
    }

    /**
     * Функция возвращает текст href для кнопки пагинации "Вперед"
     * @param $pagination_context
     * @param $active
     * @param $last
     * @param $pre_page_string
     * @return string
     */
    function get_next_href ($pagination_context, $active, $last, $pre_page_string) {
        return $active < $last ? ' href="' . $pagination_context . '.php?' . $pre_page_string . 'page=' . ($active + 1) . '"' : '';
    }

    /**
     * Функция возвращает текст href для кнопки пагинации № n
     * @param $pagination_context
     * @param $page
     * @param $pre_page_string
     * @return string
     */
    function get_page_href ($pagination_context, $page, $pre_page_string) {
        return 'href="' . $pagination_context . '.php?' . $pre_page_string . 'page=' . ($page) . '"';
    }

    /**
     * Функция возвращает время в формате H:i:s, принимая в качестве параметра количество оставшихся секунд.
     * @param $seconds_left
     * @return string
     */
    function get_formatted_time_from_seconds ($seconds_left) {
        $seconds_left = empty($seconds_left) ? 0 : $seconds_left;
        $days = floor($seconds_left / (3600 * 24));
        $time = floor($seconds_left % (3600 * 24));
        $parts = explode(':', gmdate('H:i:s', $time));
        $parts[0] = intval($parts[0]) + $days * 24;
        return implode(':', $parts);
    }

    /** Функция возвращает атрибут в зависимости от передаваемого параметра
     * @param $value
     * @return string
     */
    function get_checked_attribute ($value) {
        return ($value) ? ' checked ' : '';
    }

    /**
     * Функция возвращает имя класса для задачи в зависимости от ее статуса и времени, оставшегося до завершения
     * @param $status
     * @param $seconds_left
     * @return string
     */
    function get_task_classname ($status, $seconds_left) {
        $seconds_left = empty($seconds_left) ? 0 : $seconds_left;
        $result = ($status) ? 'task--completed' : '';
        $result .= ($seconds_left <= 24 * 3600) ? ' ' . 'task--important' : '';
        return $result;
    }

    /**
     * Функция возвращает имя активного класса при совпадении индексов вкладок
     * @param $current
     * @param $tab
     * @return string
     */
    function get_current_tab_classname ($current, $tab) {
        return $current === $tab ? ' tasks-switch__item--active ' : '';
    }

    /**
     * Функция возвращает ссылку в зависимости от установленных фильтров и текущего проекта
     * @param      $current_filter
     * @param      $show_completed
     * @param null $project_id
     * @return string
     */
    function get_href_by_current_filters ($current_filter, $show_completed, $project_id = null) {
        return 'index.php?condition=' . $current_filter . '&show_completed=' . $show_completed . ($project_id ? '&project_id=' . $project_id : '');
    }

    /**
     * Функция возвращает "чистое" читабельное имя файла без уникального идентификатора, либо изначальное имя файла
     * @param $name
     * @return bool|string
     */
    function get_pure_filename ($name) {
        return substr($name, 0, mb_strlen(UI_START)) === UI_START ? substr($name, TRANCATED_COUNT) : $name;
    }

    /**
     * Функция с просторов интернета, проверяющая, существует ли файл.
     * @param $filePath
     * @return bool
     */
    function is_file_exists ($filePath) {
        return is_file($filePath) && file_exists($filePath);
    }

    /**
     * Функция "пересобирает" строку запроса при изменении одного из параметров
     * Пример использования:
     * 'active_query' => $_SERVER['QUERY_STRING'], - пример передаваемых в шаблон параметров
     * 'active_script' => $_SERVER['PHP_SELF'],  - пример переедаваемых в шаблон параметров
     * 'shown' => $show_all
     *  где $show_all = !empty($_GET['all_comments']); - пример использования для включения-выключения параметра
     *  в шаблоне: href="<?= rebuild_query_string($active_script, $active_query, 'all_comments', !($shown)); ?>">
     * @param $script
     * @param $query
     * @param $param
     * @param $value
     * @return string
     */
    function rebuild_query_string ($script, $query, $param, $value) {
        mb_parse_str($query, $items);
        $items[$param] = $value;
        if ($param !== 'page' && isset($items['page']) ) {
            $items['page'] = 1;
        }
        return $script . '?' . http_build_query($items);
    }

    /**
     * Функция возвращает форму слова для числа по переданному массиву словоформ и числу
     * @param $source_number
     * @param $text_forms
     * @return mixed
     */
    function get_text_form ($source_number, $text_forms) {
        $source_number = abs(intval($source_number, 10)) % 100;
        $temporary_number = $source_number % 10;
        if ($source_number > 10 && $source_number < 20) {
            return $text_forms[2];
        }
        if ($temporary_number > 1 && $temporary_number < 5) {
            return $text_forms[1];
        }
        if ($temporary_number === 1) {
            return $text_forms[0];
        }
        return $text_forms[2];
    }

    /** Функция возвращает ссылку на видео youtube
     * @param $post
     * @param $field_name
     * @return string
     */
    function get_pure_youtube_link($post, $field_name) {
     return 'http://www.youtube.com/embed/'. get_pure_data($post, $field_name) . '?autoplay=0';
    }

    /**
     * Функция отправляет письмо с новым паролем
     * @param $data
     * @return int
     */
    function send_new_password ($data) {
        try {
            $transport = new Swift_SmtpTransport('phpdemo.ru', 25);
            $transport->setUsername('keks@phpdemo.ru');
            $transport->setPassword('htmlacademy');

            $message_text = 'Уважаемый пользователь.' . PHP_EOL .
                'Ваш новый пароль: ' . get_assoc_element($data, 'password') . PHP_EOL .
                'Рекомендуется сменить его при первом входе в систему.';
            $message = new Swift_Message('Уведомление от сервиса «Captured»');
            $type = $message->getHeaders()->get('Content-Type');
            $type->setValue('text/plain');
            $type->setParameter('charset', 'utf-8');
            /**
             * Здесь должно бы быть get_assoc_element($data, 'email'), но вдруг 'левые' адреса все-таки существуют.
             * Поэтому... так...
             */
            $message->setTo([TEST_EMAIL => 'Пользователю сервиса']);
            $message->setBody($message_text, 'text/plain');
            $message->setFrom('keks@phpdemo.ru', 'Captured');
            $mailer = new Swift_Mailer($transport);
            $result = $mailer->send($message);

        } catch (Exception $e) {
        }
        return $result;
    }