<?php
add_action('wp_ajax_load_more_news', 'theme_load_more_news');
add_action('wp_ajax_nopriv_load_more_news', 'theme_load_more_news');

function theme_load_more_news() {
    $page = isset($_POST['page']) ? max(1, (int) $_POST['page']) : 1;

    $query = new WP_Query([
        'post_type'      => 'news',
        'posts_per_page' => 6,
        'paged'          => $page,
    ]);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/news/item');
        }
        wp_reset_postdata();
    }

    wp_die();
}
