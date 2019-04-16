<?php

    /**
     * Функция принимает два аргумента: имя файла шаблона и ассоциативный массив с данными для этого шаблона.
     * Функция возвращает строку — итоговый HTML-код с подставленными данными или описание ошибки
     * @param $name string
     * @param $data array
     * @return false|string
     */
    function include_template ($name, $data) {
        $name = TEMPLATE_FOLDER . $name;
        if (!is_readable($name)) {
            return 'Шаблон с именем ' . $name . ' не существует или недоступен для чтения';
        }
        ob_start();
        extract($data);
        require $name;
        return ob_get_clean();
    }

    /** Функция формирует заполненный фрагмент шаблона на основе массива данных о постах.
     * Название шаблона (его имя совпдадает с таблицей подтипов постов) есть в результате запроса
     * @param $posts
     * @return string
     */
    function get_post_content (&$posts) {
        $content = '';
        foreach ($posts as $post) {
            $template_name = get_assoc_element($post, 'content_type') . '.php';
            $post_content = include_template($template_name, [
                'post' => $post
            ]);
            $content .= $post_content;
        }
        return $content;
    }

    /**
     * Функция формирует заполненный фрагмент шаблона на основе массива данных.
     * Также в качестве параметров передаются название шаблона и название переменной для элемента данных в этом шаблоне.
     * @param $data
     * @param $template_name
     * @param $variable_name
     * @return string
     */
    function get_various_content (&$data, $template_name, $variable_name) {
        $content = '';
        foreach ($data as $data_row) {
            $row_content = include_template($template_name, [
                $variable_name => $data_row
            ]);
            $content .= $row_content;
        }
        return $content;
    }

    /**
     * Функция возвращает название класса для баннера
     * @param $Массив с данными баннера
     * @return string
     *
     */
    function get_banner_classname (&$banner) {
        $ref = get_pure_data($banner, 'reference');
        if ((empty($ref) || trim($ref) === '#')) {
            $result = '';
        }
            else {
            $ind = intval(get_pure_data($banner, 'id'));
            $result = 'promo__block--' . (($ind % 2 === 0) ? 'barbershop' : 'technomart');
        }
        return $result;
    }