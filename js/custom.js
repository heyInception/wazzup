
jQuery(document).ready(function() {
    let menus = jQuery('.header__lang');
    menus.each(function() {
        let menu_id = jQuery(this).attr('id');
        let current_lang_selector = '#' + menu_id + ' .wz-pll-current-lang';
        let current_lang = jQuery(current_lang_selector);
        current_lang.click(function() {
            let lang_list_selector = '#' + menu_id + ' .wz-pll-lang-list';
            let lang_list = jQuery(lang_list_selector);
            lang_list.toggleClass('wz-show');
            let lang_container_selector = '#' + menu_id + ' .wz-pll-container';
            let lang_container = jQuery(lang_container_selector);
            lang_container.toggleClass('wz-show');
        });
    });

    if (jQuery(window).width() < 1199) {
        let switcherFlag = false;

        jQuery('.elementor-search-form__submit').click(function(e) {
            if (!switcherFlag) {
                e.preventDefault();
            } else {
                e.stopPropagation()
            }
            jQuery('.header__search').addClass('header__search_opened');
            switcherFlag = true;
        });

        jQuery('.wz24h-search-form-close-btn').click(function(e) {
            jQuery('.header__search').removeClass('header__search_opened');
            switcherFlag = false;
        });
    }

});

window.addEventListener('load', () => {
	console.log('Table of contents custom collapse-expand button');
	var collapse_button = document.querySelector('.ez-toc-title-toggle .ez-toc-btn');
	if (typeof(collapse_button) != 'undefined' && collapse_button != null) {
		collapse_button.classList.add('ez-toc-btn-expanded');
		collapse_button.classList.remove('ez-toc-btn-default');
		console.log('collapse_button: ' + collapse_button.className);
		var expanded_image = new Image(24,24);
		expanded_image.src = '/wp-content/uploads/fa-chevron-down-2.svg';
		var collapseded_image = new Image(24,24);
		collapseded_image.src = '/wp-content/uploads/fa-chevron-up-2.svg';
		var ez_toc_btn_expanded_content = '<span>Показать</span>';
		var ez_toc_btn_collapseded_content = '<span>Скрыть</span>';
		collapse_button.innerHTML = ez_toc_btn_expanded_content;
		collapse_button.appendChild(expanded_image);
		collapse_button.onclick = function() {
			console.log('collapse_button click');
			if (collapse_button.classList.contains('ez-toc-btn-expanded')) {
				collapse_button.classList.remove('ez-toc-btn-expanded');
				collapse_button.classList.add('ez-toc-btn-collapseded');
				collapse_button.innerHTML = ez_toc_btn_collapseded_content;
				collapse_button.appendChild(collapseded_image);
			} else {
				collapse_button.classList.remove('ez-toc-btn-collapseded');
				collapse_button.classList.add('ez-toc-btn-expanded');
				collapse_button.innerHTML = ez_toc_btn_expanded_content;
				collapse_button.appendChild(expanded_image);
				
			}
		};
	}
});