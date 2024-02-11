<?php
add_action('wp_ajax_custom_form_submit', 'custom_form_submit_callback');
add_action('wp_ajax_nopriv_custom_form_submit', 'custom_form_submit_callback');

function custom_form_submit_callback()
{
    global $wpdb;

    $data = array();
    parse_str($_POST['data'], $data);

// Получаем данные из POST-запроса
    $material = $data['material'];
    $area_before = isset($data['area-before']) ? $data['area-before'] : 0;
    $area_after = isset($data['area-after']) ? $data['area-after'] : 0;
    $cost_before = isset($data['cost-before']) ? $data['cost-before'] : 0;
    $cost_after = isset($data['cost-after']) ? $data['cost-after'] : 0;

// Получаем ID рубрики по ее slug
    $category = get_category_by_slug($material);
    $category_id = $category->term_id;

// Подготовка параметров для запроса
    $args = array(
        'post_type' => 'post', 
        'posts_per_page' => -1, 
        'cat' => $category_id,
    );

// Добавляем мета-запросы только если значения не пустые
    if (!empty($area_before) && !empty($area_after)) {
        $args['meta_query'][] = array(
            'key' => 'square',
            'value' => array($area_before, $area_after),
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN',
        );
    }

    if (!empty($cost_before) && !empty($cost_after)) {
        $args['meta_query'][] = array(
            'key' => 'price',
            'value' => array($cost_before, $cost_after),
            'type' => 'NUMERIC',
            'compare' => 'BETWEEN',
        );
    }

// Выполнение запроса
    $query = new WP_Query($args);

// Подготовка данных для возврата
    $posts = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_data = array(
                'title' => get_the_title(),
                'permalink' => get_permalink(),
                'preview' => wp_get_attachment_url(get_post_meta(get_the_ID(), 'preview', true)),
                'price' => get_post_meta(get_the_ID(), 'price', true),
                'square' => get_post_meta(get_the_ID(), 'square', true),
            );
            $posts[] = $post_data;
        }
    }

// Возвращаем ответ в формате JSON
    $response = array(
        'success' => true,
        'posts' => $posts,
    );
    echo json_encode($response);

// Сбрасываем данные запроса
    wp_reset_postdata();
    wp_die();
}