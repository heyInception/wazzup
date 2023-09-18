<footer class="footer">
    <div class="container">
        <div class="footer__row">
            <div class="footer__column">
                <div class="footer__wrap">
                    <div class="footer__logo"><img src="<?php echo get_template_directory_uri(); ?>/img/wz-logo-mobile.svg" alt=""></div>
                    <div class="footer__bottom footer__bottom_date">Wazzup 2017-2023</div>
                </div>
            </div>
            <div class="footer__column">
                <div class="footer__head">Интеграции</div>
                <div class="footer__wrap">
                    <ul class="footer__menu">
                        <li><a href="/whatsapp-crm/">WhatsApp для CRM</a></li>
                        <li><a href="/telegram-crm/">Telegram для CRM</a></li>
                        <li><a href="/vk-crm/">ВКонтакте для CRM</a></li>
                        <li><a href="/whatsapp-business-api/">WhatsApp Business API</a></li>
                        <li><a href="/instagram-business-api/">Instagram Business API</a></li>
                    </ul>
                </div>
                <div class="footer__bottom"><a href="/privacy-policy/">Политика конфиденциальности</a></div>
            </div>
            <div class="footer__column">
                <div class="footer__head">Информация</div>
                <div class="footer__wrap">
                    <ul class="footer__menu">
                        <li><a href="/pricing/">Тарифы</a></li>
                        <li><a href="/help/ru/">База знаний</a></li>
                        <li><a href="/official-partnership/">Интеграторам</a></li>
                        <li><a href="/techpartner-ru/">CRM-системам</a></li>
                        <li><a href="/help/ru/whatsapp-api-ru/">API</a></li>
                    </ul>
                </div>
                <div class="footer__bottom"><a href="/user-agreement/">Пользовательское соглашение</a></div>
            </div>
            <div class="footer__column">
                <div class="footer__head">О компании</div>
                <div class="footer__wrap">
                    <ul class="footer__menu">
                        <li><a href="/main-blog/">Блог</a></li>
                        <li><a href="/vacancies/" class="wz-ru">Вакансии</a></li>
                        <li><a href="/category/cases/" class="wz-ru">Кейсы</a></li>
                        <li><a href="/contact/">Контакты</a></li>
                    </ul>
                </div>
                <div class="footer__bottom"><a href="/user-agreement-with-partner/">Партнерское соглашение</a>
                </div>
            </div>
            <div class="footer__column footer__column_last">
                <div class="footer__img"><a href=""><img src="https://wazzup24.ru/wp-content/uploads/2021/12/sk-logo-ru-137x40-1.png" alt=""></a></div>
            </div>
        </div>
        <div class="footer__items footer__items_mobile"><span>Wazzup 2017-2023</span> <a href="/privacy-policy/">Политика конфиденциальности</a> <a href="/user-agreement/">Пользовательское соглашение</a> <a href="/user-agreement-with-partner/">Партнерское соглашение</a></div>
    </div>
</footer>

<script>
    jQuery(document).ready(function($) {

        function setLocation(curLoc) {
            try {
                history.pushState(null, null, curLoc);
                return;
            } catch (e) {}
            location.hash = '#' + curLoc;
        }

        function ajaxAction(url, flag) {
            if (!url.includes('#')) {
                let jqxhr = $.ajax({
                        method: "GET",
                        url: myajax.url,
                        data: {
                            action: 'get_kb_single',
                            url: url
                        }
                    })
                    .done(function(msg) {
                        let json = $.parseJSON(msg);
                        $('#wz24h-title-wrapper h1').text(json[0]);
                        $('#wz24h-content-wrapper.entry-content').html(json[1]);
                        $('head title').text(`${json[0]} - Wazzup База знаний по сервису`);
                        if (flag) {
                            setLocation(urlLink);
                        }
                        $('#sp-ea-accordion-js-js').remove();
                        $.getScript("/wp-content/plugins/easy-accordion-free/public/assets/js/collapse.min.js", function(data, textStatus, jqxhr) {});
                        $('#sp-ea-accordion-config-js').remove();
                        $.getScript("/wp-content/plugins/easy-accordion-free/public/assets/js/script.js", function(data, textStatus, jqxhr) {});
                        console.log(json);
                    })
                    .fail(function(jqXHR, textStatus) {
                        console.log("wz24h-kb-ajax error: " + textStatus);
                    })
                    .always(function() {
                        console.log("wz24h-kb-ajax complete");
                        $('html').scrollTop(0);
                    });
                jqxhr.always(function() {
                    console.log("wz24h-kb-ajax second complete");
                    $('html').scrollTop(0);
                });
            }
        }

        function getUrlParameter(sParam) {
            let sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
            return false;
        };

        console.log(getUrlParameter('active_child'));

        $('.wz-branch-menu>ul>li>a').hover(function() {
            $(this).parent().children('span').addClass('wz24h-arrow-menu-hovered');
        }, function() {
            $(this).parent().children('span').removeClass('wz24h-arrow-menu-hovered');
        });

        $('.wz-branch-menu>ul>li>ul>li>a').hover(function() {
            $(this).parent().children('span').addClass('wz24h-arrow-menu-hovered');
        }, function() {
            $(this).parent().children('span').removeClass('wz24h-arrow-menu-hovered');
        });

        //setTimeout(function() {

        $('.wz-branch-menu>ul>li').each(function(index, value) {
            if ($(value).find('ul').length) {
                //if ($(window).width() > 1199 ) {
                $(value).prepend('<span class="wz24h-accordion-arrow-500"></span>');
                /*}else{
                    $(value).append('<span class="wz24h-accordion-arrow-500"></span>');
                }*/
                $(value).children('ul').css({
                    'height': '0'
                });
            }
            /*$($(value)).css({'height':`${$('#wz24h-menu-wrapper').find(value).children('a').height()}px`});*/
        });

        $('.wz-branch-menu>ul>li>ul>li').each(function(index, value) {
            if ($(value).find('ul').length) {
                //if ($(window).width() > 1199 ) {
                $(value).prepend('<span class="wz24h-accordion-arrow-400"></span>');
                /*}else{
                    $(value).append('<span class="wz24h-accordion-arrow-400"></span>');
                }*/
                $(value).children('ul').css({
                    'height': '0'
                });
            }
            /*console.log($(value));
            console.log($(value).children('a').height());
            $($(value)).css({'height':`${$('#wz24h-menu-wrapper').find(value).children('a').height()}px`});*/

            /*$($(value)).css({'height':'fit-content'});*/
        });

        //}, 900);

        $('#wz24h-menu-wrapper .wz24h-accordion-arrow-500').click(function() {
            if ($(this).hasClass('wz24h-arrow-menu-opened')) {
                $(this).parent().removeClass('wz24h-menu-opened');
                $(this).removeClass('wz24h-arrow-menu-opened');
            } else {
                $('#wz24h-menu-wrapper .wz-branch-menu>ul .wz24h-accordion-arrow-500').parent().removeClass('wz24h-menu-opened');
                $('#wz24h-menu-wrapper .wz-branch-menu>ul .wz24h-accordion-arrow-500').removeClass('wz24h-arrow-menu-opened');
                $(this).parent().addClass('wz24h-menu-opened');
                $(this).addClass('wz24h-arrow-menu-opened');
            }
        });

        $('#wz24h-content-wrapper-intermediate .wz24h-accordion-arrow-500').click(function() {
            if ($(this).hasClass('wz24h-arrow-menu-opened')) {
                $(this).parent().removeClass('wz24h-menu-opened');
                $(this).removeClass('wz24h-arrow-menu-opened');
            } else {
                $('#wz24h-content-wrapper-intermediate .wz-branch-menu>ul .wz24h-accordion-arrow-500').parent().removeClass('wz24h-menu-opened');
                $('#wz24h-content-wrapper-intermediate .wz-branch-menu>ul .wz24h-accordion-arrow-500').removeClass('wz24h-arrow-menu-opened');
                $(this).parent().addClass('wz24h-menu-opened');
                $(this).addClass('wz24h-arrow-menu-opened');
            }
        });

        $('.wz24h-accordion-arrow-400').click(function() {
            $(this).parent().toggleClass('wz24h-menu-opened');
            $(this).toggleClass('wz24h-arrow-menu-opened');
        });

        /*$('#wz24h-menu-wrapper .wz-branch-menu>ul>li').each(function (index, value) {
            $(value).addClass('wz24h-menu-opened');
            $(value).find('.wz24h-accordion-arrow-500').addClass('wz24h-arrow-menu-opened'); 
        });*/

        $('#wz24h-content-wrapper-intermediate .wz-branch-menu>ul>li').each(function(index, value) {
            if (index < 2 && !getUrlParameter('active_child')) {
                $(value).addClass('wz24h-menu-opened');
                $(value).find('.wz24h-accordion-arrow-500').addClass('wz24h-arrow-menu-opened');
            }
        });

        let url = window.location.href;
        let urlLink = '';

        if ($(`.wz-branch-menu>ul [href="${url}"]`).prev().hasClass('wz24h-accordion-arrow-400')) {
            $(`.wz-branch-menu>ul [href="${url}"]`).parent().toggleClass('wz24h-menu-opened');
            $(`.wz-branch-menu>ul [href="${url}"]`).prev().toggleClass('wz24h-arrow-menu-opened');
        }

        /*if ($(`.wz-branch-menu>ul [href="${url}"]`).prev().hasClass('wz24h-accordion-arrow-500')) {
            $(`.wz-branch-menu>ul [href="${url}"]`).parent().toggleClass('wz24h-menu-opened');
            $(`.wz-branch-menu>ul [href="${url}"]`).prev().toggleClass('wz24h-arrow-menu-opened');
        }*/

        if ($(`.wz-branch-menu>ul [href="${url}"]`).parent().parent().parent().children().hasClass('wz24h-accordion-arrow-500')) {
            $(`.wz-branch-menu>ul [href="${url}"]`).parent().parent().parent().addClass('wz24h-menu-opened');
            $(`.wz-branch-menu>ul [href="${url}"]`).parent().parent().parent().children().addClass('wz24h-arrow-menu-opened');
        }

        if ($(`.wz-branch-menu>ul [href="${url}"]`).parents('ul.sub-menu').parents('ul.sub-menu').parent().children().hasClass('wz24h-accordion-arrow-500')) {
            $(`.wz-branch-menu>ul [href="${url}"]`).parents('ul.sub-menu').parents('ul.sub-menu').parent().toggleClass('wz24h-menu-opened');
            $(`.wz-branch-menu>ul [href="${url}"]`).parents('ul.sub-menu').parents('ul.sub-menu').parent().children().toggleClass('wz24h-arrow-menu-opened');
        }

        if (!$(`.wz-branch-menu>ul [href="${url}"]`).parent().hasClass('menu-item-has-children')) {
            $(`.wz-branch-menu>ul [href="${url}"]`).parents('ul.sub-menu').parent().children('.wz24h-accordion-arrow-400').toggleClass('wz24h-arrow-menu-opened').parent().toggleClass('wz24h-menu-opened');
            /*$('#kb_menu').animate({'opacity':'1'}, 900);*/
        } else {
            /*$('#kb_menu').animate({'opacity':'1'}, 900);*/
        }

        if ($(window).width() < 1199) {
            $('a.kb-parent:not(a.kb-main)').attr('href', `${$('.kb-parent').attr('href')}?active_child=${$('.wz-branch-menu>ul .current_page_item').attr('id')}`);

            if (getUrlParameter('active_child')) {

                if ($(`#${getUrlParameter('active_child')}`).parent().prev().prev().hasClass('wz24h-accordion-arrow-400')) {
                    $(`#${getUrlParameter('active_child')}`).addClass('current-menu-item');
                    $(`#${getUrlParameter('active_child')}`).parent().parent().toggleClass('wz24h-menu-opened');
                    $(`#${getUrlParameter('active_child')}`).parent().prev().prev().toggleClass('wz24h-arrow-menu-opened');
                    $(`#${getUrlParameter('active_child')}`).parent().parent().parent().parent().toggleClass('wz24h-menu-opened');
                    $(`#${getUrlParameter('active_child')}`).parent().parent().parent().prev().prev().toggleClass('wz24h-arrow-menu-opened');
                }

                if ($(`.${getUrlParameter('active_child')}`).parent().prev().prev().hasClass('wz24h-accordion-arrow-500')) {
                    $(`.${getUrlParameter('active_child')}`).addClass('current-menu-item');
                    $(`.${getUrlParameter('active_child')}`).parent().parent().toggleClass('wz24h-menu-opened');
                    $(`.${getUrlParameter('active_child')}`).parent().prev().prev().toggleClass('wz24h-arrow-menu-opened');
                }
            }
        }

        $('#wz24h-content-wrapper-intermediate .wz-branch-menu>ul a').click(function(e) {
            if ($(this).attr('href') == '#') {
                e.preventDefault();
                linkElement = $(this);

                if ($(this).prev().hasClass('wz24h-accordion-arrow-400')) {
                    console.log('find-400');
                    $(this).parent().toggleClass('wz24h-menu-opened');
                    $(this).prev().toggleClass('wz24h-arrow-menu-opened');
                }

                if ($(this).prev().hasClass('wz24h-accordion-arrow-500')) {
                    console.log('find-500');
                    if ($(this).prev().hasClass('wz24h-arrow-menu-opened')) {
                        $(this).parent().removeClass('wz24h-menu-opened');
                        $(this).prev().removeClass('wz24h-arrow-menu-opened');
                    } else {
                        $('#wz24h-content-wrapper-intermediate .wz-branch-menu>ul .wz24h-accordion-arrow-500').parent().removeClass('wz24h-menu-opened');
                        $('#wz24h-content-wrapper-intermediate .wz-branch-menu>ul .wz24h-accordion-arrow-500').removeClass('wz24h-arrow-menu-opened');
                        $(this).parent().addClass('wz24h-menu-opened');
                        $(this).prev().addClass('wz24h-arrow-menu-opened');
                    }
                }
            }
        });

        $('#wz24h-menu-wrapper .wz-branch-menu>ul a').click(function(e) {
            //console.log('indexOf main: ' + $(this).parents('.menu').attr('id').indexOf('main'));
            //if ($(this).parents('.menu').attr('id') != 'menu-kb-main') {

            if ($(this).parents('.menu').attr('id').indexOf('main') == -1) {
                e.preventDefault();
                urlLink = $(this).attr('href');
                linkElement = $(this);

                //if ($(this).parent().parent().prev().prev().hasClass('wz24h-accordion-arrow-400') || $(this).parent().parent().prev().prev().hasClass('wz24h-accordion-arrow-500')) {
                $('#wz24h-menu-wrapper .wz-branch-menu>ul a').parent().removeClass('current-menu-item');
                $(this).parent().addClass('current-menu-item');
                //}

                if ($(window).width() < 1199) {
                    $('a.kb-parent:not(a.kb-main)').attr('href', `${$('.kb-parent').attr('href')}?active_child=${$('.wz-branch-menu>ul .current_page_item').attr('id')}`);
                }

                $('#wz24h-menu-wrapper .wz-branch-menu>ul .wz24h-accordion-arrow-400').each(function(index, value) {
                    if (linkElement.parent().parent().prev().prev().hasClass('wz24h-accordion-arrow-400')) {
                        if ($(this).parent().children().children().children(`a[href="${urlLink}"]`).get(0) != linkElement.get(0)) {
                            $(this).parent().removeClass('wz24h-menu-opened');
                            $(this).removeClass('wz24h-arrow-menu-opened');
                        }
                    } else {
                        if ($(this).prev().hasClass('wz24h-arrow-menu-opened')) {
                            $(this).parent().removeClass('wz24h-menu-opened');
                            $(this).removeClass('wz24h-arrow-menu-opened');
                        }
                    }
                });

                /*$('#wz24h-menu-wrapper .wz-branch-menu>ul .wz24h-accordion-arrow-500').each(function (index, value) {
                    if (linkElement.parent().parent().prev().prev().hasClass('wz24h-accordion-arrow-500')) {
                        if ($(this).parent().children().children().children(`a[href="${urlLink}"]`).get(0) != linkElement.get(0)) {
                            $(this).parent().removeClass('wz24h-menu-opened');
                            $(this).removeClass('wz24h-arrow-menu-opened'); 
                        }
                    }else{
                        if ($(this).prev().hasClass('wz24h-arrow-menu-opened')) {
                            $(this).parent().removeClass('wz24h-menu-opened');
                            $(this).removeClass('wz24h-arrow-menu-opened'); 
                        }
                    }
                });*/

                if ($(this).prev().hasClass('wz24h-accordion-arrow-400')) {
                    console.log('find-400');
                    $(this).parent().toggleClass('wz24h-menu-opened');
                    $(this).prev().toggleClass('wz24h-arrow-menu-opened');
                }

                if ($(this).prev().hasClass('wz24h-accordion-arrow-500')) {
                    console.log('find-500');
                    if ($(this).prev().hasClass('wz24h-arrow-menu-opened')) {
                        $('#wz24h-menu-wrapper .wz-branch-menu>ul .wz24h-accordion-arrow-500').parent().removeClass('wz24h-menu-opened');
                        $('#wz24h-menu-wrapper .wz-branch-menu>ul .wz24h-accordion-arrow-500').removeClass('wz24h-arrow-menu-opened');
                    } else {
                        $('#wz24h-menu-wrapper .wz-branch-menu>ul .wz24h-accordion-arrow-500').parent().removeClass('wz24h-menu-opened');
                        $('#wz24h-menu-wrapper .wz-branch-menu>ul .wz24h-accordion-arrow-500').removeClass('wz24h-arrow-menu-opened');
                        $(this).parent().addClass('wz24h-menu-opened');
                        $(this).prev().addClass('wz24h-arrow-menu-opened');
                    }
                }

                if (urlLink != '#') {
                    ajaxAction(urlLink, true);
                }
            }
        });

        addEventListener("popstate", function(e) {
            ajaxAction(window.location.href, false);
        }, false);

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.js" integrity="sha512-19TrqSGVSwaC2IDGHrD+tAkX59/w5cXy0BHDVwn7OJQXxavORhFSFM7DOO9soXKuo8O7gGNHiG9R2vFrXRBcTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    jQuery(document).ready(function($) {
        
        $('.header__search-form input.header__search-input').val('<?php echo get_search_query() ?>');
    });
</script>