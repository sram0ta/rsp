<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rsp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body class="body">
<?php wp_body_open(); ?>
<header class="header grid-12 container">
    <div class="header__logo">
        <?php the_custom_logo(); ?>
    </div>
    <nav class="header__navigation">
        <a href="#" class="header__navigation__link">Каталог</a>
        <a href="#" class="header__navigation__link">О нас</a>
        <a href="<?= get_the_permalink('10')  ?>" class="header__navigation__link">Блог</a>
        <a href="<?= get_the_permalink('69')  ?>" class="header__navigation__link">Галерея</a>
        <a href="<?= get_the_permalink('77')  ?>" class="header__navigation__link">Контакты</a>
    </nav>
    <div class="header__information">
        <div class="header__information-wrapper">
            <a href="tel:<?= $phone_tel = preg_replace('/[^0-9+]/', '', get_field('phone', 77)); ?>" class="header__information__link"><?= get_field('phone',77 ); ?></a>
            <a href="mailto:<?= get_field('email',77 ); ?>" class="header__information__link"><?= get_field('email',77 ); ?></a>
        </div>
        <a href="#form" class="header__information__button">
            <span>Оформить заказ</span>
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.47965 0H12V10.5204H8.76297V5.52602L2.28891 12.0001L0 9.71117L6.47406 3.23703H1.47965V0Z" fill="white"/>
            </svg>
        </a>
    </div>
</header>
