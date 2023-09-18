<header class="header">
    <div class="container">
        <div class="header__row header__row_padding">
            <div class="header__column">
                <div class="header__logo"><?php the_custom_logo(); ?></div>
            </div>
            <div class="header__line"><img src="/wp-content/uploads/wz-help-logo-part.svg" title="wz-help-logo-part" alt="wz-help-logo-part"></div>
            <div class="header__heading">
                <h2><a href="/help/"><?php _e('База знаний', 'wazzup') ?></a></h2>
            </div>
            <div class="header__search">
                <form class="header__search-form" role="search" action="<?php echo site_url('/'); ?>/help/" method="get" id="searchform">
                    <div class="header__search-container">
                        <div class="wz24h-search-form-close-btn"></div>
                        <input placeholder="<?php _e('Поиск', 'wazzup') ?>" type="search" name="s" title="<?php _e('Поиск', 'wazzup') ?>" value="" class="header__search-input">
                        <input type="hidden" name="post_type" value="help" /> 
                        <button class="elementor-search-form__submit" type="submit" title="<?php _e('Поиск', 'wazzup') ?>" aria-label="<?php _e('Поиск', 'wazzup') ?>">
                            <i aria-hidden="true" class="fas fa-search"></i>
                            <span class="screen-only"><?php _e('Поиск', 'wazzup') ?></span>
                        </button>
                    </div>
                </form>
            </div>
            <div id="menu-1-d2d8d3c" class="header__lang">
                <div class="wz-pll-container">
                    <div class="wz-pll-current-lang">
                        <span class="wz-pll-current-lang-label">
                            <?php if (get_locale() == 'ru_RU') : ?>
                                RU
                            <?php else : ?>
                                EN
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="wz-pll-lang-list">
                        <li class="lang-item lang-item-ru lang-item-first"><a lang="ru-RU" hreflang="ru-RU" href="https://wz-ru-ru.ru/help/">RU</a></li>
                        <li class="lang-item lang-item-en"><a lang="en-GB" hreflang="en-GB" href="https://wz-com-en.ru/help/">EN</a></li>
                    </div>
                    <div></div>
                </div>
            </div>
            <div class="header__buttons"><a href=""><button class="btn-reset header__btn"><?php _e('Вход в Wazzup', 'wazzup') ?></button></a></div>
            <div class="header__burger"><button class="burger" aria-label="Открыть меню" aria-expanded="false" data-burger><span class="burger__line"></span></button></div>
        </div>
        <div class="header__row header__row_menu" data-menu>
            <div class="header__column header__column_mobile">
                <nav class="header__menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-menu-help',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav>
            </div>
            <div class="header__column header__column_mobile">
                <div id="menu-2-d2d8d3c" class="header__lang header__lang_mobile">
                    <div class="wz-pll-container">
                        <div class="wz-pll-current-lang"><span class="wz-pll-current-lang-label">RU</span></div>
                        <div class="wz-pll-lang-list">
                            <li class="lang-item lang-item-12 lang-item-ru current-lang lang-item-first"><a lang="ru-RU" hreflang="ru-RU" href="https://wazzup24.ru/help/">RU</a></li>
                            <li class="lang-item lang-item-15 lang-item-en"><a lang="en-GB" hreflang="en-GB" href="https://wazzup24.com/help/">EN</a></li>
                        </div>
                        <div></div>
                    </div>
                </div>
            </div>
            <div class="header__column header__column_mobile">
                <div class="header__buttons header__buttons_mobile"><a href=""><button class="btn-reset header__btn"><?php _e('Вход в Wazzup', 'wazzup') ?></button></a></div>
            </div>
        </div>
    </div>
</header>