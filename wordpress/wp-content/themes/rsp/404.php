<?php
get_header();
?>
    <main class="main page-error">
        <div class="container">
            <div class="error__inner">
                <h1 class="error__title">404</h1>
                <div class="error__wrapper">
                    <div class="error__sub-title">Страница не найдена</div>
                    <div class="error__description">Возможно вы ввели неверный адрес или страница была перемещена / удалена. Вернитесь на главную, чтобы продолжить поиски.</div>
                </div>
                <a href="<?= home_url(); ?>" class="error__link">На главную</a>
            </div>
            <div class="error__icon">:(</div>
        </div>
    </main>
<?php
get_footer();
