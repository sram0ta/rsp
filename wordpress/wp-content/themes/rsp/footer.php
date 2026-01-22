<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rsp
 */

?>
<footer class="footer container">
    <div class="footer__inner grid-12">
        <div class="footer__content">
            <div class="footer__content__information">
                <div class="footer__content__information__logo">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="footer__content__information__title">Ведущий производитель уплотнений в России</div>
            </div>
            <div class="footer__content__contacts">
                <div class="footer__content__contacts__inner">
                    <div class="footer__content__contacts__social">
                        <a href="tel:<?= $phone_tel = preg_replace('/[^0-9+]/', '', get_field('phone', 77)); ?>"><?= get_field('phone',77 ); ?></a>
                        <a href="mailto:<?= get_field('email',77 ); ?>"><?= get_field('email',77 ); ?></a>
                    </div>
                    <div class="footer__content__contacts__address"><?= get_field('address', 77); ?></div>
                </div>
                <div class="footer__content__contacts__navigation">
                    <a href="#" class="footer__content__contacts__navigation__link">О компании</a>
                    <a href="#" class="footer__content__contacts__navigation__link">Галерея</a>
                    <a href="#" class="footer__content__contacts__navigation__link">Блог</a>
                    <a href="#" class="footer__content__contacts__navigation__link">Контакты</a>
                </div>
            </div>
        </div>
        <div class="form">
            <div class="anchor" id="form"></div>
            <div class="form__title">Оставьте ваши контактные данные,<br>мы свяжемся с вами в ближайшее время</div>
            <?= do_shortcode('[contact-form-7 id="dde2771"]') ?>
        </div>
    </div>
</footer>
<div class="after-footer container grid-12">
    <div class="after-footer__information">
        © ООО «ЭРСИПИ» 2024<br>
        ИНН: 34 35 309 985
    </div>
    <a href="#" class="after-footer__develop" target="_blank">Разработка Effect Web</a>
    <div class="after-footer__links">
        <a href="#">Политика конфиденциальности</a>
        <a href="#">Согласие на обработку персональных данных</a>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
