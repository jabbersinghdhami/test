<?php
if(!function_exists('piquant_mikado_design_styles')) {
    /**
     * Generates general custom styles
     */
    function piquant_mikado_design_styles() {

        $preload_background_styles = array();

        if(piquant_mikado_options()->getOptionValue('preload_pattern_image') !== ""){
            $preload_background_styles['background-image'] = 'url('.piquant_mikado_options()->getOptionValue('preload_pattern_image').') !important';
        }else{
            $preload_background_styles['background-image'] = 'url('.esc_url(MIKADO_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo piquant_mikado_dynamic_css('.mkdf-preload-background', $preload_background_styles);

		if (piquant_mikado_options()->getOptionValue('google_fonts')){
			$font_family = piquant_mikado_options()->getOptionValue('google_fonts');
			if(piquant_mikado_is_font_option_valid($font_family)) {
				echo piquant_mikado_dynamic_css('body', array('font-family' => piquant_mikado_get_font_option_val($font_family)));
			}
		}

        if(piquant_mikado_options()->getOptionValue('first_color') !== '') {
            $color_selector = array(
                '.mkdf-primary-color',
                '.mkdf-comment-holder .mkdf-comment-text .comment-reply-link:hover',
				'.mkdf-comment-holder .mkdf-comment-text .comment-edit-link:hover',
                '#submit_comment:hover',
                '#mkdf-back-to-top:hover',
                '.mejs-controls .mejs-button button:hover',
                '.mkdf-load-more-btn:hover, .mkdf-load-more-btn.mkdf-load-more-btn-active',
                '.mkdf-load-more-light .mkdf-load-more-btn:hover',
                '.mkdf-load-more-btn.mkdf-load-more-btn-active',
                '.mkdf-main-menu ul li a .mkdf-menu-featured-icon',
                '.mkdf-light-header .mkdf-page-header > div:not(.mkdf-sticky-header) .mkdf-main-menu > ul > li:hover > a',
                '.mkdf-light-header.mkdf-header-style-on-scroll .mkdf-page-header .mkdf-main-menu > ul > li:hover > a',
                '.mkdf-dark-header .mkdf-page-header > div:not(.mkdf-sticky-header) .mkdf-main-menu > ul > li:hover > a',
                '.mkdf-dark-header.mkdf-header-style-on-scroll .mkdf-page-header .mkdf-main-menu > ul > li:hover > a',
                '.mkdf-drop-down .wide .second .inner ul li.sub .flexslider ul li a:hover',
                '.mkdf-drop-down .wide .second ul li .flexslider ul li a:hover',
                '.mkdf-drop-down .wide .second .inner ul li.sub .flexslider.widget_flexslider .menu_recent_post_text a:hover',
                '.mkdf-mobile-header .mkdf-mobile-nav a:hover, .mkdf-mobile-header .mkdf-mobile-nav h4:hover',
                '.mkdf-mobile-header .mkdf-mobile-menu-opener a:hover',
                '.mkdf-page-header .mkdf-sticky-header .mkdf-main-menu > ul > li > a:hover',
				'.mkdf-page-header .mkdf-sticky-header .mkdf-side-menu-button-opener:hover',
                'footer .widget li a:hover',
                '.mkdf-side-menu-button-opener:hover',
                '.mkdf-side-menu a.mkdf-close-side-menu span',
                '.mkdf-search-slide-header-bottom .mkdf-search-submit:hover',
                '.mkdf-search-cover .mkdf-search-close a:hover',
                '.mkdf-team .mkdf-team-position',
                '.mkdf-team.main-info-below-image .mkdf-team-info .mkdf-team-position',
                '.mkdf-counter-holder.mkdf-counter-light h4.mkdf-counter-title',
                '.mkdf-icon-shortcode .mkdf-icon-element:hover',
                '.mkdf-counter-holder.mkdf-counter-light h4.mkdf-counter-title',
                '.mkdf-testimonials-slider .mkdf-testimonial-content-inner .mkdf-rating .icon_star',
                '.mkdf-testimonials-slider .mkdf-testimonial-content-inner .mkdf-rating .icon_star_alt',
                '.mkdf-price-table .mkdf-price-table-inner .mkdf-table-content .mkdf-icon-element',
                '.mkdf-btn.mkdf-btn-outline',
                '.mkdf-accordion-holder .mkdf-title-holder.ui-state-active',
				'.mkdf-accordion-holder .mkdf-title-holder.ui-state-hover',
                '.mkdf-accordion-holder.mkdf-boxed .mkdf-title-holder.ui-state-hover',
                '.mkdf-btn.mkdf-btn-outline',
                '.mkdf-video-button-play .mkdf-video-button-wrapper:hover',
                '.mkdf-dropcaps',
                '.mkdf-iwt .mkdf-icon-shortcode.normal',
                '.mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown ul li:hover > a',
                '.mkdf-social-share-left-animation .mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown ul li > a:hover',
                '.mkdf-blog-carousel-boxes .mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown-opener:hover',
                '.mkdf-twitter-slider .mkdf-twitter-slider-icon',
                '.mkdf-blog-carousel .owl-prev:hover',
				'.mkdf-blog-carousel .owl-next:hover',
                '.mkdf-blog-carousel.mkdf-boxes .mkdf-boxes-item-title:hover a',
                '.mkdf-blog-standard-item-holder-outer .mkdf-standard-content-holder .mkdf-blog-standard-date-section',
                '.mkdf-blog-carousel.mkdf-blog-carousel-standard .owl-prev:hover',
                '.mkdf-blog-carousel.mkdf-blog-carousel-standard .owl-next:hover',
                '.mkdf-info-card-slider .mkdf-info-card-front-side .mkdf-info-card-icon-holder',
                '.mkdf-icon-slider-holder .mkdf-icon-slider-nav .mkdf-icon-slider-nav-item:hover, .mkdf-icon-slider-holder .mkdf-icon-slider-nav .mkdf-icon-slider-nav-item.flex-active',
                '.mkdf-icon-slider-holder .mkdf-icon-slider-nav .mkdf-icon-slider-nav-item:hover h6.mkdf-icon-slider-nav-title, .mkdf-icon-slider-holder .mkdf-icon-slider-nav .mkdf-icon-slider-nav-item.flex-active h6.mkdf-icon-slider-nav-title',
                '.mkdf-tabbed-gallery .mkdf-tg-nav a',
                '.mkdf-blog-holder article.sticky .mkdf-post-title a',
                '.mkdf-filter-blog-holder li.mkdf-active',
                '.mkdf-author-description .mkdf-author-social-holder a:hover',
                '.mkdf-single-menu-item-holder .mkdf-smi-prep-info-bottom .mkdf-prep-info-price-holder',
                '.mkdf-working-hours-holder .mkdf-wh-title .mkdf-wh-title-accent-word'
            );

            $color_woo_selector = array();
            if(piquant_mikado_is_woocommerce_installed()) {
                $color_woo_selector = array(
					'.mkdf-woocommerce-page ul.products .product .mkdf-woo-product-image-holder .add_to_cart_button:hover:before,
					.mkdf-woocommerce-page ul.products .product .mkdf-woo-product-image-holder .added_to_cart:hover:before,
					.woocommerce ul.products .product .mkdf-woo-product-image-holder .add_to_cart_button:hover:before,
					.woocommerce ul.products .product .mkdf-woo-product-image-holder .added_to_cart:hover:before',
					'.woocommerce-cart .woocommerce .mkdf-btn.mkdf-btn-solid:hover',
					'table.shop_table.cart tbody tr td a:hover',
					'.mkdf-woocommerce-page .mkdf-shipping-calculator form a:hover',
					'.mkdf-shopping-cart-dropdown ul li a:hover',
					'.mkdf-shopping-cart-dropdown .mkdf-item-info-holder .mkdf-item-left:hover',
					'.mkdf-shopping-cart-dropdown .mkdf-item-info-holder .mkdf-item-right .remove:hover',
					'.mkdf-shopping-cart-dropdown span.mkdf-total span',
					'.mkdf-shopping-cart-dropdown span.mkdf-quantity',
					'.mkdf-woocommerce-page .select2-results .select2-highlighted'

                );
            }

            $color_selector = array_merge($color_selector,$color_woo_selector);

            $color_important_selector = array(

            );

            $background_color_selector = array(
				'.post-password-form input[type=\'submit\']',
				'input.wpcf7-form-control.wpcf7-submit',
				'#submit_comment',
				'.mkdf-pagination li.active span, .mkdf-pagination li a:hover',
				'#mkdf-back-to-top',
				'.mkdf-carousel-navigation .owl-pagination .owl-page span:after',
				'.mejs-controls .mejs-time-rail .mejs-time-current, .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
				'aside.mkdf-sidebar .widget.widget_tag_cloud .tagcloud a:hover, aside.mkdf-sidebar .widget.widget_product_tag_cloud .tagcloud a:hover',
				'.mkdf-pulse-loader',
				'#ui-datepicker-div .ui-datepicker-today',
				'footer .widget.widget_tag_cloud .tagcloud a:hover',
				'.mkdf-call-to-action .mkdf-btn.mkdf-btn-white',
				'.mkdf-icon-shortcode.circle, .mkdf-icon-shortcode.square',
				'.mkdf-message',
				'.mkdf-price-table.mkdf-active-pricing-table .mkdf-table-button a',
				'.mkdf-price-table .mkdf-price-table-inner li.mkdf-table-image',
				'.mkdf-price-table .mkdf-table-button a:hover',
				'.mkdf-price-table.mkdf-active-pricing-table .mkdf-table-button a',
				'.mkdf-pie-chart-doughnut-holder .mkdf-pie-legend ul li .mkdf-pie-color-holder',
				'.mkdf-pie-chart-pie-holder .mkdf-pie-legend ul li .mkdf-pie-color-holder',
				'.mkdf-btn.mkdf-btn-solid',
				'.mkdf-btn.mkdf-btn-solid',
				'.mkdf-dropcaps.mkdf-square, .mkdf-dropcaps.mkdf-circle',
				'.mkdf-process-holder .mkdf-digit',
				'.mkdf-textslider-container .owl-pagination .owl-page:hover, .mkdf-textslider-container .owl-pagination .owl-page.active',
				'.carousel-indicators:not(.thumbnails) .active',
				'.mkdf-blog-holder .format-link .mkdf-post-mark, .mkdf-blog-holder .format-quote .mkdf-post-mark',
				'.mkdf-single-tags-holder .mkdf-tags a:hover',
				'.mkdf-blog-single-navigation .mkdf-blog-single-prev a, .mkdf-blog-single-navigation .mkdf-blog-single-next a',
				'.mkdf-single-menu-item-holder .mkdf-smi-prep-info-top .mkdf-prep-info-icon',
				'.mkdf-menu-list .mkdf-ml-label-holder .mkdf-ml-label',
				'.mkdf-mg-image-holder .mkdf-mg-label',
				'.mkdf-mg-price-holder .mkdf-mg-price'
            );

            $background_color_woo_selector = array();
            if(piquant_mikado_is_woocommerce_installed()) {
                $background_color_woo_selector = array(
					'.mkdf-woocommerce-page .mkdf-onsale, .woocommerce .mkdf-onsale',
					'.mkdf-woocommerce-page .woocommerce-message, .mkdf-woocommerce-page .woocommerce-info, .mkdf-woocommerce-page .woocommerce-error',
					'.mkdf-woocommerce-page #review_form #commentform input[type=\'submit\']:hover',
					'.mkdf-woocommerce-page input[type=\'submit\']:not(#searchsubmit):hover, .mkdf-woocommerce-page input[type=\'button\']:hover',
					'.mkdf-woocommerce-page #commentform input[type=\'submit\']:hover',
					'.mkdf-shopping-cart-outer .mkdf-shopping-cart-header .mkdf-cart-count',
					'.woocommerce .myaccount_user'
                );
            }

            $background_color_selector = array_merge($background_color_selector,$background_color_woo_selector);

            $background_color_important_selector = array(
				'.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-bg):hover',
				'.mkdf-btn.mkdf-btn-white:not(.mkdf-btn-custom-hover-bg):hover',
				'.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-bg):hover',
				'.mkdf-btn.mkdf-btn-white:not(.mkdf-btn-custom-hover-bg):hover',
				'.mkdf-shopping-cart-dropdown a.mkdf-btn.mkdf-btn-small.mkdf-btn-white.mkdf-btn-icon.view-cart, .mkdf-shopping-cart-dropdown a.mkdf-btn.mkdf-btn-small.mkdf-btn-solid.mkdf-btn-icon.view-cart'
            );

            $background_color_woo_important_selector = array();
            if(piquant_mikado_is_woocommerce_installed()) {
                $background_color_woo_important_selector = array(
					'.woocommerce-account .woocommerce form input[type=\'submit\']:hover',
					'.mkdf-woocommerce-with-sidebar aside.mkdf-sidebar .widget.widget_price_filter .price_slider_amount .mkdf-btn.mkdf-btn-solid:hover '
                );
            }

            $background_color_important_selector = array_merge($background_color_important_selector,$background_color_woo_important_selector);

            $border_color_selector = array(
				'.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-border-hover):hover',
				'.mkdf-btn.mkdf-btn-white:not(.mkdf-btn-custom-border-hover):hover',
				'.mkdf-accordion-holder .mkdf-title-holder.ui-state-active .mkdf-accordion-mark, .mkdf-accordion-holder .mkdf-title-holder.ui-state-hover .mkdf-accordion-mark ',
				'.carousel-indicators:not(.thumbnails) .active'
            );

            $border_color_woo_selector = array();
            if(piquant_mikado_is_woocommerce_installed()) {
                $border_color_woo_selector = array(
					'.mkdf-woocommerce-page input[type=\'submit\']:not(#searchsubmit):hover, .mkdf-woocommerce-page input[type=\'button\']:hover',
					'.mkdf-woocommerce-page #commentform input[type=\'submit\']:hover'
                );
            }

            $border_color_selector = array_merge($border_color_selector,$border_color_woo_selector);

            $border_color_important_selector = array(
				'.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-border-hover):hover',
				'.mkdf-btn.mkdf-btn-white:not(.mkdf-btn-custom-border-hover):hover'
            );

            $border_color_woo_important_selector = array();
            if(piquant_mikado_is_woocommerce_installed()) {
                $border_color_woo_important_selector = array(
					'.woocommerce-account .woocommerce form input[type=\'submit\']:hover'
                );
            }

            $border_color_important_selector = array_merge($border_color_important_selector,$border_color_woo_important_selector);

            echo piquant_mikado_dynamic_css($color_selector, array('color' => piquant_mikado_options()->getOptionValue('first_color')));
            echo piquant_mikado_dynamic_css($color_important_selector, array('color' => piquant_mikado_options()->getOptionValue('first_color').'!important'));
            echo piquant_mikado_dynamic_css('::selection', array('background' => piquant_mikado_options()->getOptionValue('first_color')));
            echo piquant_mikado_dynamic_css('::-moz-selection', array('background' => piquant_mikado_options()->getOptionValue('first_color')));
            echo piquant_mikado_dynamic_css($background_color_selector, array('background-color' => piquant_mikado_options()->getOptionValue('first_color')));
            echo piquant_mikado_dynamic_css($background_color_important_selector, array('background-color' => piquant_mikado_options()->getOptionValue('first_color').'!important'));
            echo piquant_mikado_dynamic_css($border_color_selector, array('border-color' => piquant_mikado_options()->getOptionValue('first_color')));
            echo piquant_mikado_dynamic_css($border_color_important_selector, array('border-color' => piquant_mikado_options()->getOptionValue('first_color').'!important'));
        }

		if (piquant_mikado_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
				'.mkdf-wrapper-inner',
				'.mkdf-content'
			);
			echo piquant_mikado_dynamic_css($background_color_selector, array('background-color' => piquant_mikado_options()->getOptionValue('page_background_color')));
		}

		if (piquant_mikado_options()->getOptionValue('selection_color')) {
			echo piquant_mikado_dynamic_css('::selection', array('background' => piquant_mikado_options()->getOptionValue('selection_color')));
			echo piquant_mikado_dynamic_css('::-moz-selection', array('background' => piquant_mikado_options()->getOptionValue('selection_color')));
		}

		$boxed_background_style = array();
		if (piquant_mikado_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = piquant_mikado_options()->getOptionValue('page_background_color_in_box');
		}

		if (piquant_mikado_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(piquant_mikado_options()->getOptionValue('boxed_background_image')).')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat'] = 'no-repeat';
		}

		if (piquant_mikado_options()->getOptionValue('boxed_pattern_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(piquant_mikado_options()->getOptionValue('boxed_pattern_background_image')).')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat'] = 'repeat';
		}

		if (piquant_mikado_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (piquant_mikado_options()->getOptionValue('boxed_background_image_attachment'));
		}

		echo piquant_mikado_dynamic_css('.mkdf-boxed .mkdf-wrapper', $boxed_background_style);
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_design_styles');
}

if(!function_exists('piquant_mikado_content_styles')) {
    /**
     * Generates content custom styles
     */
    function piquant_mikado_content_styles() {

        $content_style = array();
        if (piquant_mikado_options()->getOptionValue('content_top_padding')) {
            $padding_top = (piquant_mikado_options()->getOptionValue('content_top_padding'));
            $content_style['padding-top'] = piquant_mikado_filter_px($padding_top).'px';
        }

        $content_selector = array(
            '.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
        );

        echo piquant_mikado_dynamic_css($content_selector, $content_style);

        $content_style_in_grid = array();
        if (piquant_mikado_options()->getOptionValue('content_top_padding_in_grid')) {
            $padding_top_in_grid = (piquant_mikado_options()->getOptionValue('content_top_padding_in_grid'));
            $content_style_in_grid['padding-top'] = piquant_mikado_filter_px($padding_top_in_grid).'px';

        }

        $content_selector_in_grid = array(
            '.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
        );

        echo piquant_mikado_dynamic_css($content_selector_in_grid, $content_style_in_grid);

    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_content_styles');

}

if (!function_exists('piquant_mikado_h1_styles')) {

    function piquant_mikado_h1_styles() {

        $h1_styles = array();

        if( piquant_mikado_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] =  piquant_mikado_options()->getOptionValue('h1_color');
        }
        if( piquant_mikado_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = piquant_mikado_get_formatted_font_family( piquant_mikado_options()->getOptionValue('h1_google_fonts'));
        }
        if( piquant_mikado_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h1_fontsize')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h1_lineheight')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] =  piquant_mikado_options()->getOptionValue('h1_texttransform');
        }
        if( piquant_mikado_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] =  piquant_mikado_options()->getOptionValue('h1_fontstyle');
        }
        if( piquant_mikado_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] =  piquant_mikado_options()->getOptionValue('h1_fontweight');
        }
        if( piquant_mikado_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo piquant_mikado_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_h1_styles');
}

if (!function_exists('piquant_mikado_h2_styles')) {

    function piquant_mikado_h2_styles() {

        $h2_styles = array();

        if( piquant_mikado_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] =  piquant_mikado_options()->getOptionValue('h2_color');
        }
        if( piquant_mikado_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = piquant_mikado_get_formatted_font_family( piquant_mikado_options()->getOptionValue('h2_google_fonts'));
        }
        if( piquant_mikado_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h2_fontsize')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h2_lineheight')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] =  piquant_mikado_options()->getOptionValue('h2_texttransform');
        }
        if( piquant_mikado_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] =  piquant_mikado_options()->getOptionValue('h2_fontstyle');
        }
        if( piquant_mikado_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] =  piquant_mikado_options()->getOptionValue('h2_fontweight');
        }
        if( piquant_mikado_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo piquant_mikado_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_h2_styles');
}

if (!function_exists('piquant_mikado_h3_styles')) {

    function piquant_mikado_h3_styles() {

        $h3_styles = array();

        if( piquant_mikado_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] =  piquant_mikado_options()->getOptionValue('h3_color');
        }
        if( piquant_mikado_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = piquant_mikado_get_formatted_font_family( piquant_mikado_options()->getOptionValue('h3_google_fonts'));
        }
        if( piquant_mikado_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h3_fontsize')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h3_lineheight')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] =  piquant_mikado_options()->getOptionValue('h3_texttransform');
        }
        if( piquant_mikado_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] =  piquant_mikado_options()->getOptionValue('h3_fontstyle');
        }
        if( piquant_mikado_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] =  piquant_mikado_options()->getOptionValue('h3_fontweight');
        }
        if( piquant_mikado_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo piquant_mikado_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_h3_styles');
}

if (!function_exists('piquant_mikado_h4_styles')) {

    function piquant_mikado_h4_styles() {

        $h4_styles = array();

        if( piquant_mikado_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] =  piquant_mikado_options()->getOptionValue('h4_color');
        }
        if( piquant_mikado_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = piquant_mikado_get_formatted_font_family( piquant_mikado_options()->getOptionValue('h4_google_fonts'));
        }
        if( piquant_mikado_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h4_fontsize')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h4_lineheight')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] =  piquant_mikado_options()->getOptionValue('h4_texttransform');
        }
        if( piquant_mikado_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] =  piquant_mikado_options()->getOptionValue('h4_fontstyle');
        }
        if( piquant_mikado_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] =  piquant_mikado_options()->getOptionValue('h4_fontweight');
        }
        if( piquant_mikado_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo piquant_mikado_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_h4_styles');
}

if (!function_exists('piquant_mikado_h5_styles')) {

    function piquant_mikado_h5_styles() {

        $h5_styles = array();

        if( piquant_mikado_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] =  piquant_mikado_options()->getOptionValue('h5_color');
        }
        if( piquant_mikado_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = piquant_mikado_get_formatted_font_family( piquant_mikado_options()->getOptionValue('h5_google_fonts'));
        }
        if( piquant_mikado_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h5_fontsize')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h5_lineheight')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] =  piquant_mikado_options()->getOptionValue('h5_texttransform');
        }
        if( piquant_mikado_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] =  piquant_mikado_options()->getOptionValue('h5_fontstyle');
        }
        if( piquant_mikado_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] =  piquant_mikado_options()->getOptionValue('h5_fontweight');
        }
        if( piquant_mikado_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo piquant_mikado_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_h5_styles');
}

if (!function_exists('piquant_mikado_h6_styles')) {

    function piquant_mikado_h6_styles() {

        $h6_styles = array();

        if( piquant_mikado_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] =  piquant_mikado_options()->getOptionValue('h6_color');
        }
        if( piquant_mikado_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = piquant_mikado_get_formatted_font_family( piquant_mikado_options()->getOptionValue('h6_google_fonts'));
        }
        if( piquant_mikado_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h6_fontsize')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h6_lineheight')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] =  piquant_mikado_options()->getOptionValue('h6_texttransform');
        }
        if( piquant_mikado_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] =  piquant_mikado_options()->getOptionValue('h6_fontstyle');
        }
        if( piquant_mikado_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] =  piquant_mikado_options()->getOptionValue('h6_fontweight');
        }
        if( piquant_mikado_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo piquant_mikado_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_h6_styles');
}

if (!function_exists('piquant_mikado_text_styles')) {

    function piquant_mikado_text_styles() {

        $text_styles = array();

        if( piquant_mikado_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] =  piquant_mikado_options()->getOptionValue('text_color');
        }
        if( piquant_mikado_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = piquant_mikado_get_formatted_font_family( piquant_mikado_options()->getOptionValue('text_google_fonts'));
        }
        if( piquant_mikado_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('text_fontsize')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('text_lineheight')).'px';
        }
        if( piquant_mikado_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] =  piquant_mikado_options()->getOptionValue('text_texttransform');
        }
        if( piquant_mikado_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] =  piquant_mikado_options()->getOptionValue('text_fontstyle');
        }
        if( piquant_mikado_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] =  piquant_mikado_options()->getOptionValue('text_fontweight');
        }
        if( piquant_mikado_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = piquant_mikado_filter_px( piquant_mikado_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo piquant_mikado_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_text_styles');
}

if (!function_exists('piquant_mikado_link_styles')) {

    function piquant_mikado_link_styles() {

        $link_styles = array();

        if( piquant_mikado_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] =  piquant_mikado_options()->getOptionValue('link_color');
        }
        if( piquant_mikado_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] =  piquant_mikado_options()->getOptionValue('link_fontstyle');
        }
        if( piquant_mikado_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] =  piquant_mikado_options()->getOptionValue('link_fontweight');
        }
        if( piquant_mikado_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] =  piquant_mikado_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo piquant_mikado_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_link_styles');
}

if (!function_exists('piquant_mikado_link_hover_styles')) {

    function piquant_mikado_link_hover_styles() {

        $link_hover_styles = array();

        if( piquant_mikado_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] =  piquant_mikado_options()->getOptionValue('link_hovercolor');
        }
        if( piquant_mikado_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] =  piquant_mikado_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo piquant_mikado_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if( piquant_mikado_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] =  piquant_mikado_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo piquant_mikado_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_link_hover_styles');
}