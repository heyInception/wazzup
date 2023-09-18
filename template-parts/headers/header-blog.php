<header class="header">
    <div class="container">
        <div class="header__row header__row_padding">
            <div class="header__column">
                <div class="header__logo">
                    <?php the_custom_logo(); ?>
                </div>
            </div>
            <div class="header__burger">
                <button class="burger" aria-label="Открыть меню" aria-expanded="false" data-burger>
                    <span class="burger__line"></span>
                </button>
            </div>
            <div class="header__row header__row_menu" data-menu>
                <div class="header__column header__column_mobile">
                    <nav class="header__menu">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'wz_blog_header',
                                'menu_id'        => 'blog-header',
                            )
                        );
                        ?>
                    </nav>
                </div>
                <div class="header__column header__column_mobile">
                    <div class="header__buttons">
                        <a href=""><button class="btn-reset header__btn"><?php _e('Вход', 'wazzup') ?></button></a>
                        <a href=""><button class="btn-reset header__btn"><?php _e('Регистрация', 'wazzup') ?></button></a>
                    </div>
                </div>
                <div class="header__column header__column_mobile">
                    <div class="header__lang">
                        <div class="wz-lang-switcher ">
                            <div class="wz-lang-list ">
                                <div class="wz-lang-list__item"><a href="https://wz-com-en.ru/main-blog/">USA (EN)</a></div>
                                <div class="wz-lang-list__item"><a href="https://wz-ru-ru.ru/main-blog/">Россия (RU)</a></div>
                                <div class="wz-lang-list__item"><a href="https://wz-es-es.ru/main-blog/">América Latina (ES)</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>