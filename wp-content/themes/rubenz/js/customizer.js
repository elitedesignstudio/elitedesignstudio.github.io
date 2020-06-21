'use strict';

/**
 * Sidebar Position
 */
wp.customize('sidebar_position', function (value) {

	value.bind(function (newval) {

		if (newval == 'left_side') {
			jQuery('.section-blog__posts').parent().removeClass('order-lg-1').addClass('order-lg-2');
			jQuery('.section-blog__sidebar').parent().removeClass('order-lg-2').addClass('order-lg-1');
		} else {
			jQuery('.section-blog__posts').parent().removeClass('order-lg-2').addClass('order-lg-1');
			jQuery('.section-blog__sidebar').parent().removeClass('order-lg-1').addClass('order-lg-2');
		}

	});

});


/**
 * 404 Title
 */
wp.customize('404_title', function (value) {

	value.bind(function (newval) {

		jQuery('.section-404 h1').html(newval);

	});

});

/**
 * 404 Message
 */
wp.customize('404_message', function (value) {

	value.bind(function (newval) {

		jQuery('.section-404 p').html(newval);

	});

});

/**
 * 404 Big
 */
wp.customize('404_big', function (value) {

	value.bind(function (newval) {

		jQuery('.section-404__big').html(newval);

	});

});

/**
 * 404 Big
 */
wp.customize('404_button', function (value) {

	value.bind(function (newval) {

		jQuery('.section-404 .section-404__wrapper-button .button').html(newval);

	});

});

/**
 * Header Container
 */
wp.customize('header_container', function (value) {

	value.bind(function (newval) {

		jQuery('.header__container').removeClass('container container-fluid').addClass(newval);

		if (newval == 'container') {
			jQuery('.header__wrapper-menu').addClass('header__wrapper-menu_container');
		} else {
			jQuery('.header__wrapper-menu').removeClass('header__wrapper-menu_container');
		}

	});

});

/**
 * Footer Container
 */
wp.customize('footer_container', function (value) {

	value.bind(function (newval) {

		jQuery('.footer__container').removeClass('container container-fluid').addClass(newval);

	});

});
