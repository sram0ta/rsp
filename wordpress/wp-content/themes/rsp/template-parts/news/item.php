<a href="<?php the_permalink(); ?>" class="news__item">
    <span class="news__item__content">
        <h2 class="news__item__content__title"><?php the_title(); ?></h2>
        <span class="news__item__content__description"> <?= wp_trim_words(wp_strip_all_tags( get_the_content() ), 60, '…'); ?></span>
    </span>
    <span class="news__item__content-wrapper">
        <span class="news__item__date"><?= get_the_date('d.m.Y'); ?></span>
    </span>
</a>
