<?php
get_header();
?>
    <main class="main single-news main-top">
        <div class="container news-content__inner">
            <a href="<?php the_permalink(10); ?>" class="news-content__back">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 15L8 10L13 5" stroke="#64748B" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Вернуться на страницу блога</span>
            </a>
            <div class="news-content">
                <h1 class="news-content__title"><?php the_title(); ?></h1>
                <div class="news-content__date__inner">
                    <div class="news-content__date"><?= get_the_date('d.m.Y'); ?></div>
                </div>
                <div class="news-content__information"><?php the_content(); ?></div>
            </div>
        </div>
        <div class="container read-more">
            <div class="read-more__title">Читайте также</div>
            <div class="read-more__inner grid-12">
                <?php
                global $post;

                $current_id   = get_the_ID();
                $current_date = get_the_date('Y-m-d H:i:s', $current_id );

                $news = get_posts( array(
                    'post_type'      => 'news',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                    'post__not_in'   => array( $current_id ),
                    'date_query'     => array(
                        array(
                            'before'    => $current_date,
                            'inclusive' => false,
                        ),
                    ),
                    'orderby' => 'date',
                    'order'   => 'DESC',
                ) );

                $need = 3 - count($news);

                if ( $need > 0 ) {
                    $exclude = array_merge( array( $current_id ), wp_list_pluck( $news, 'ID' ) );

                    $more = get_posts( array(
                        'post_type'      => 'news',
                        'posts_per_page' => $need,
                        'post_status'    => 'publish',
                        'post__not_in'   => $exclude,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    ) );

                    $news = array_merge( $news, $more );
                }

                foreach ( $news as $post ) {
                    setup_postdata( $post );
                    get_template_part( 'template-parts/news/item' );
                } wp_reset_postdata();
                ?>
            </div>
        </div>
    </main>
<?php
get_footer();
