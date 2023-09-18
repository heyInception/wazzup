function createCookie(name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(c_name) {
    if (document.cookie.length > 0) {
        c_start = document.cookie.indexOf(c_name + "=");
        if (c_start != -1) {
            c_start = c_start + c_name.length + 1;
            c_end = document.cookie.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = document.cookie.length;
            }
            return unescape(document.cookie.substring(c_start, c_end));
        }
    }
    return "";
}

jQuery(document).ready(function($) {
    console.log('kb-main-link start');
    if (window.matchMedia('(max-width: 1199px)').matches) {
        let main_item = '.menu-item-home';
        let kb_main_state = getCookie('kb_main_state');
        console.log('kb-main-link kb_main_state: ' + kb_main_state);
        let main_active = $(main_item).hasClass('current-menu-item');
        console.log('kb-main-link main_active: ' + main_active);
        if (kb_main_state == 'false' || !main_active) {
            $('#kb_menu, #kb_content').each(function(index) {
                $(this).toggleClass('wz-enabled wz-disabled');
                console.log('kb-main-link toggled classes: ' + $(this).attr('class'));
            });
        }
        console.log('kb-main-link window.matchMedia (max-width: 768px)');
        /* mobile swap page menu item class */
        $(main_item).click(function(event) {
            event.preventDefault();
            $('#kb_menu, #kb_content').each(function(index) {
                $(this).toggleClass('wz-enabled wz-disabled');
                console.log('kb-main-link toggled classes: ' + $(this).attr('class'));
                createCookie('kb_main_state', true, 1);
                console.log('kb-main-link kb_main_state: ' + getCookie('kb_main_state'));
            });
        });
    }
    console.log('kb-main-link end');
});