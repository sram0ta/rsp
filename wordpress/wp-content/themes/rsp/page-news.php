<?php
get_header();
?>
<main class="main page-news main-top">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
    <div class="container news">
        <div class="news__inner grid-12">
            <?php
            $news = new WP_Query([
                'post_type'      => 'news',
                'posts_per_page' => 6,
                'paged'          => 1,
            ]);

            if ($news->have_posts()) :
                while ($news->have_posts()) : $news->the_post();
                    get_template_part('template-parts/news/item');
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <?php if ($news->max_num_pages > 1) : ?>
            <button class="news__button-more" type="button">Показать ещё </button>
        <?php endif; ?>
    </div>
</main>
<?php
get_footer();
