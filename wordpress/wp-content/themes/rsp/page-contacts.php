<?php
get_header();
?>
    <main class="main page-contacts main-top">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="contacts grid-12">
                <div class="contacts__content">
                    <div class="contacts__content__social">
                        <a href="tel:<?= $phone_tel = preg_replace('/[^0-9+]/', '', get_field('phone', 77)); ?>" class="contacts__content__social__item">
                            <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <foreignObject x="-3.06667" y="-3.06667" width="52.1333" height="52.1333"><div xmlns="http://www.w3.org/1999/xhtml" style="backdrop-filter:blur(1.53px);clip-path:url(#bgblur_0_1_3619_clip_path);height:100%;width:100%"></div></foreignObject><g data-figma-bg-blur-radius="3.06667">
                                    <path d="M0 23C0 10.2975 10.2975 0 23 0C35.7025 0 46 10.2975 46 23C46 35.7025 35.7025 46 23 46C10.2975 46 0 35.7025 0 23Z" fill="#2E67F8"/>
                                    <mask id="mask0_1_3619" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="13" y="13" width="20" height="20">
                                        <rect x="13.3999" y="13.4004" width="19.1999" height="19.1999" fill="#D9D9D9"/>
                                    </mask>
                                    <g mask="url(#mask0_1_3619)">
                                        <path d="M29.3597 30.2007C27.6931 30.2007 26.0464 29.8374 24.4198 29.1107C22.7931 28.3841 21.3131 27.3541 19.9798 26.0207C18.6465 24.6874 17.6165 23.2074 16.8898 21.5808C16.1631 19.9541 15.7998 18.3074 15.7998 16.6408C15.7998 16.4008 15.8798 16.2008 16.0398 16.0408C16.1998 15.8808 16.3998 15.8008 16.6398 15.8008H19.8798C20.0665 15.8008 20.2331 15.8641 20.3798 15.9908C20.5265 16.1174 20.6131 16.2674 20.6398 16.4408L21.1598 19.2408C21.1864 19.4541 21.1798 19.6341 21.1398 19.7808C21.0998 19.9274 21.0264 20.0541 20.9198 20.1608L18.9798 22.1208C19.2465 22.6141 19.5631 23.0907 19.9298 23.5507C20.2965 24.0107 20.6998 24.4541 21.1398 24.8807C21.5531 25.2941 21.9864 25.6774 22.4398 26.0307C22.8931 26.3841 23.3731 26.7074 23.8798 27.0007L25.7598 25.1207C25.8798 25.0007 26.0364 24.9107 26.2298 24.8507C26.4231 24.7907 26.6131 24.7741 26.7998 24.8007L29.5597 25.3607C29.7464 25.4141 29.8997 25.5107 30.0197 25.6507C30.1397 25.7907 30.1997 25.9474 30.1997 26.1207V29.3607C30.1997 29.6007 30.1197 29.8007 29.9597 29.9607C29.7997 30.1207 29.5997 30.2007 29.3597 30.2007Z" fill="white"/>
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="bgblur_0_1_3619_clip_path" transform="translate(3.06667 3.06667)"><path d="M0 23C0 10.2975 10.2975 0 23 0C35.7025 0 46 10.2975 46 23C46 35.7025 35.7025 46 23 46C10.2975 46 0 35.7025 0 23Z"/>
                                    </clipPath></defs>
                            </svg>
                            <span class="contacts__content__social__item__title"><?= get_field('phone',77 ); ?></span>
                        </a>
                        <a href="mailto:<?= get_field('email',77 ); ?>" class="contacts__content__social__item">
                            <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <foreignObject x="-3.06667" y="-3.06667" width="52.1333" height="52.1333"><div xmlns="http://www.w3.org/1999/xhtml" style="backdrop-filter:blur(1.53px);clip-path:url(#bgblur_0_1_3622_clip_path);height:100%;width:100%"></div></foreignObject><g data-figma-bg-blur-radius="3.06667">
                                    <path d="M0 23C0 10.2975 10.2975 0 23 0C35.7025 0 46 10.2975 46 23C46 35.7025 35.7025 46 23 46C10.2975 46 0 35.7025 0 23Z" fill="#2E67F8"/>
                                    <mask id="mask0_1_3622" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="13" y="13" width="20" height="20">
                                        <rect x="13.3999" y="13.4004" width="19.1999" height="19.1999" fill="#D9D9D9"/>
                                    </mask>
                                    <g mask="url(#mask0_1_3622)">
                                        <path d="M16.6 29.4005C16.16 29.4005 15.7833 29.2439 15.47 28.9305C15.1567 28.6172 15 28.2405 15 27.8005V18.2006C15 17.7606 15.1567 17.3839 15.47 17.0706C15.7833 16.7573 16.16 16.6006 16.6 16.6006H29.3999C29.8399 16.6006 30.2166 16.7573 30.5299 17.0706C30.8433 17.3839 30.9999 17.7606 30.9999 18.2006V27.8005C30.9999 28.2405 30.8433 28.6172 30.5299 28.9305C30.2166 29.2439 29.8399 29.4005 29.3999 29.4005H16.6ZM23 23.8006L29.3999 19.8006V18.2006L23 22.2006L16.6 18.2006V19.8006L23 23.8006Z" fill="white"/>
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="bgblur_0_1_3622_clip_path" transform="translate(3.06667 3.06667)"><path d="M0 23C0 10.2975 10.2975 0 23 0C35.7025 0 46 10.2975 46 23C46 35.7025 35.7025 46 23 46C10.2975 46 0 35.7025 0 23Z"/>
                                    </clipPath></defs>
                            </svg>
                            <span class="contacts__content__social__item__title"><?= get_field('email',77 ); ?></span>
                        </a>
                    </div>
                    <div class="contacts__content__inner">
                        <div class="contacts__content__address"><?= get_field('address', 77); ?></div>
                        <div class="contacts__content__time"><?php the_field('time'); ?></div>
                    </div>
                </div>
                <div class="contacts__map">
                    <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A66845b67e61ae051bf6de15c6d3220b14186ddd19c1ade08f837c2936281740d&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();
