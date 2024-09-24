<?php

if(!function_exists('piquant_mikado_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function piquant_mikado_header_top_bar_styles() {
        global $piquant_mikado_options;

        if($piquant_mikado_options['top_bar_height'] !== '') {
            echo piquant_mikado_dynamic_css('.mkdf-top-bar', array('height' => $piquant_mikado_options['top_bar_height'].'px'));
            echo piquant_mikado_dynamic_css('.mkdf-top-bar .mkdf-logo-wrapper a', array('max-height' => $piquant_mikado_options['top_bar_height'].'px'));

            echo piquant_mikado_dynamic_css('.mkdf-top-bar .mkdf-shopping-cart-outer .mkdf-shopping-cart-header .mkdf-header-cart', array('line-height' => piquant_mikado_options()->getOptionValue('top_bar_height').'px'));
        }

        if($piquant_mikado_options['top_bar_in_grid'] == 'yes') {
            $top_bar_grid_selector = '.mkdf-top-bar .mkdf-grid .mkdf-vertical-align-containers';
            $top_bar_grid_styles = array();
            if($piquant_mikado_options['top_bar_grid_background_color'] !== '') {
                $grid_background_color    = $piquant_mikado_options['top_bar_grid_background_color'];
                $grid_background_transparency = 1;

                if(piquant_mikado_options()->getOptionValue('top_bar_grid_background_transparency')) {
                    $grid_background_transparency = piquant_mikado_options()->getOptionValue('top_bar_grid_background_transparency');
                }

                $grid_background_color = piquant_mikado_rgba_color($grid_background_color, $grid_background_transparency);
                $top_bar_grid_styles['background-color'] = $grid_background_color;
            }

            echo piquant_mikado_dynamic_css($top_bar_grid_selector, $top_bar_grid_styles);
        }

        $background_color = piquant_mikado_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles = array();
        if($background_color !== '') {
            $background_transparency = 1;
            if(piquant_mikado_options()->getOptionValue('top_bar_background_transparency') !== '') {
               $background_transparency = piquant_mikado_options()->getOptionValue('top_bar_background_transparency');
            }

            $background_color = piquant_mikado_rgba_color($background_color, $background_transparency);
            $top_bar_styles['background-color'] = $background_color;
        }

        echo piquant_mikado_dynamic_css('.mkdf-top-bar', $top_bar_styles);
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_header_top_bar_styles');
}

if(!function_exists('piquant_mikado_header_standard_menu_area_styles')) {
    /**
     * Generates styles for header standard menu
     */
    function piquant_mikado_header_standard_menu_area_styles() {
        global $piquant_mikado_options;

        $menu_area_header_standard_styles = array();

        if($piquant_mikado_options['menu_area_background_color_header_standard'] !== '') {
            $menu_area_background_color        = $piquant_mikado_options['menu_area_background_color_header_standard'];
            $menu_area_background_transparency = 1;

            if($piquant_mikado_options['menu_area_background_transparency_header_standard'] !== '') {
                $menu_area_background_transparency = $piquant_mikado_options['menu_area_background_transparency_header_standard'];
            }

            $menu_area_header_standard_styles['background-color'] = piquant_mikado_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if($piquant_mikado_options['menu_area_height_header_standard'] !== '') {
            $max_height = intval(piquant_mikado_filter_px($piquant_mikado_options['menu_area_height_header_standard']) * 0.9).'px';
            echo piquant_mikado_dynamic_css('.mkdf-header-standard .mkdf-page-header .mkdf-logo-wrapper a', array('max-height' => $max_height));
            echo piquant_mikado_dynamic_css('.mkdf-header-standard .mkdf-menu-area .mkdf-shopping-cart-outer', array('line-height' => piquant_mikado_filter_px(intval($piquant_mikado_options['menu_area_height_header_standard']) - 5).'px'));

            $menu_area_header_standard_styles['height'] = piquant_mikado_filter_px($piquant_mikado_options['menu_area_height_header_standard']).'px';

        }

        echo piquant_mikado_dynamic_css('.mkdf-header-standard .mkdf-page-header .mkdf-menu-area', $menu_area_header_standard_styles);

        $menu_area_grid_header_standard_styles = array();

        if($piquant_mikado_options['menu_area_in_grid_header_standard'] == 'yes' && $piquant_mikado_options['menu_area_grid_background_color_header_standard'] !== '') {
            $menu_area_grid_background_color        = $piquant_mikado_options['menu_area_grid_background_color_header_standard'];
            $menu_area_grid_background_transparency = 1;

            if($piquant_mikado_options['menu_area_grid_background_transparency_header_standard'] !== '') {
                $menu_area_grid_background_transparency = $piquant_mikado_options['menu_area_grid_background_transparency_header_standard'];
            }

            $menu_area_grid_header_standard_styles['background-color'] = piquant_mikado_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo piquant_mikado_dynamic_css('.mkdf-header-standard .mkdf-page-header .mkdf-menu-area .mkdf-grid .mkdf-vertical-align-containers', $menu_area_grid_header_standard_styles);
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_header_standard_menu_area_styles');
}

if(!function_exists('piquant_mikado_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function piquant_mikado_sticky_header_styles() {
        global $piquant_mikado_options;

        if($piquant_mikado_options['sticky_header_in_grid'] == 'yes' && $piquant_mikado_options['sticky_header_grid_background_color'] !== '') {
            $sticky_header_grid_background_color        = $piquant_mikado_options['sticky_header_grid_background_color'];
            $sticky_header_grid_background_transparency = 1;

            if($piquant_mikado_options['sticky_header_grid_transparency'] !== '') {
                $sticky_header_grid_background_transparency = $piquant_mikado_options['sticky_header_grid_transparency'];
            }

            echo piquant_mikado_dynamic_css('.mkdf-page-header .mkdf-sticky-header .mkdf-grid .mkdf-vertical-align-containers', array('background-color' => piquant_mikado_rgba_color($sticky_header_grid_background_color, $sticky_header_grid_background_transparency)));
        }

        if($piquant_mikado_options['sticky_header_background_color'] !== '') {

            $sticky_header_background_color              = $piquant_mikado_options['sticky_header_background_color'];
            $sticky_header_background_color_transparency = 1;

            if($piquant_mikado_options['sticky_header_transparency'] !== '') {
                $sticky_header_background_color_transparency = $piquant_mikado_options['sticky_header_transparency'];
            }

            echo piquant_mikado_dynamic_css('.mkdf-page-header .mkdf-sticky-header .mkdf-sticky-holder', array('background-color' => piquant_mikado_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if($piquant_mikado_options['sticky_header_height'] !== '') {
            $max_height = intval(piquant_mikado_filter_px($piquant_mikado_options['sticky_header_height']) * 0.9).'px';

            echo piquant_mikado_dynamic_css('.mkdf-page-header .mkdf-sticky-header', array('height' => $piquant_mikado_options['sticky_header_height'].'px'));
            echo piquant_mikado_dynamic_css('.mkdf-sticky-header .mkdf-shopping-cart-outer .mkdf-shopping-cart-header .mkdf-header-cart', array('line-height' => piquant_mikado_options()->getOptionValue('sticky_header_height').'px'));
            echo piquant_mikado_dynamic_css('.mkdf-page-header .mkdf-sticky-header .mkdf-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if($piquant_mikado_options['sticky_color'] !== '') {
            $sticky_menu_item_styles['color'] = $piquant_mikado_options['sticky_color'];
        }
        if($piquant_mikado_options['sticky_google_fonts'] !== '-1') {
            $sticky_menu_item_styles['font-family'] = piquant_mikado_get_formatted_font_family($piquant_mikado_options['sticky_google_fonts']);
        }
        if($piquant_mikado_options['sticky_fontsize'] !== '') {
            $sticky_menu_item_styles['font-size'] = $piquant_mikado_options['sticky_fontsize'].'px';
        }
        if($piquant_mikado_options['sticky_lineheight'] !== '') {
            $sticky_menu_item_styles['line-height'] = $piquant_mikado_options['sticky_lineheight'].'px';
        }
        if($piquant_mikado_options['sticky_texttransform'] !== '') {
            $sticky_menu_item_styles['text-transform'] = $piquant_mikado_options['sticky_texttransform'];
        }
        if($piquant_mikado_options['sticky_fontstyle'] !== '') {
            $sticky_menu_item_styles['font-style'] = $piquant_mikado_options['sticky_fontstyle'];
        }
        if($piquant_mikado_options['sticky_fontweight'] !== '') {
            $sticky_menu_item_styles['font-weight'] = $piquant_mikado_options['sticky_fontweight'];
        }
        if($piquant_mikado_options['sticky_letterspacing'] !== '') {
            $sticky_menu_item_styles['letter-spacing'] = $piquant_mikado_options['sticky_letterspacing'].'px';
        }

        $sticky_menu_item_selector = array(
            '.mkdf-main-menu.mkdf-sticky-nav > ul > li > a'
        );

        echo piquant_mikado_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);

        $sticky_menu_item_hover_styles = array();
        if($piquant_mikado_options['sticky_hovercolor'] !== '') {
            $sticky_menu_item_hover_styles['color'] = $piquant_mikado_options['sticky_hovercolor'];
        }

        $sticky_menu_item_hover_selector = array(
            '.mkdf-main-menu.mkdf-sticky-nav > ul > li:hover > a',
            '.mkdf-main-menu.mkdf-sticky-nav > ul > li.mkdf-active-item:hover > a',
            'body:not(.mkdf-menu-item-first-level-bg-color) .mkdf-main-menu.mkdf-sticky-nav > ul > li:hover > a',
            'body:not(.mkdf-menu-item-first-level-bg-color) .mkdf-main-menu.mkdf-sticky-nav > ul > li.mkdf-active-item:hover > a'
        );

        echo piquant_mikado_dynamic_css($sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles);
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_sticky_header_styles');
}

if(!function_exists('piquant_mikado_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function piquant_mikado_fixed_header_styles() {
        global $piquant_mikado_options;

        if($piquant_mikado_options['fixed_header_grid_background_color'] !== '') {

            $fixed_header_grid_background_color              = $piquant_mikado_options['fixed_header_grid_background_color'];
            $fixed_header_grid_background_color_transparency = 1;

            if($piquant_mikado_options['fixed_header_grid_transparency'] !== '') {
                $fixed_header_grid_background_color_transparency = $piquant_mikado_options['fixed_header_grid_transparency'];
            }

            echo piquant_mikado_dynamic_css('.mkdf-header-type1 .mkdf-fixed-wrapper.fixed .mkdf-grid .mkdf-vertical-align-containers,
                                    .mkdf-header-type3 .mkdf-fixed-wrapper.fixed .mkdf-grid .mkdf-vertical-align-containers',
                array('background-color' => piquant_mikado_rgba_color($fixed_header_grid_background_color, $fixed_header_grid_background_color_transparency)));
        }

        if($piquant_mikado_options['fixed_header_background_color'] !== '') {

            $fixed_header_background_color              = $piquant_mikado_options['fixed_header_background_color'];
            $fixed_header_background_color_transparency = 1;

            if($piquant_mikado_options['fixed_header_transparency'] !== '') {
                $fixed_header_background_color_transparency = $piquant_mikado_options['fixed_header_transparency'];
            }

            echo piquant_mikado_dynamic_css('.mkdf-header-type1 .mkdf-fixed-wrapper.fixed .mkdf-menu-area,
                                    .mkdf-header-type3 .mkdf-fixed-wrapper.fixed .mkdf-menu-area',
                array('background-color' => piquant_mikado_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency)));
        }

    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_fixed_header_styles');
}

if(!function_exists('piquant_mikado_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function piquant_mikado_main_menu_styles() {
        global $piquant_mikado_options;

        if($piquant_mikado_options['menu_color'] !== '' || $piquant_mikado_options['menu_fontsize'] != '' || $piquant_mikado_options['menu_fontstyle'] !== '' || $piquant_mikado_options['menu_fontweight'] !== '' || $piquant_mikado_options['menu_texttransform'] !== '' || $piquant_mikado_options['menu_letterspacing'] !== '' || $piquant_mikado_options['menu_google_fonts'] != "-1") { ?>
            .mkdf-main-menu.mkdf-default-nav > ul > li > a,
            .mkdf-page-header #lang_sel > ul > li > a,
            .mkdf-page-header #lang_sel_click > ul > li > a,
            .mkdf-page-header #lang_sel ul > li:hover > a{
            <?php if($piquant_mikado_options['menu_color']) { ?> color: <?php echo esc_attr($piquant_mikado_options['menu_color']); ?>; <?php } ?>
            <?php if($piquant_mikado_options['menu_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $piquant_mikado_options['menu_google_fonts'])); ?>', sans-serif;
            <?php } ?>
            <?php if($piquant_mikado_options['menu_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($piquant_mikado_options['menu_fontsize']); ?>px; <?php } ?>
            <?php if($piquant_mikado_options['menu_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($piquant_mikado_options['menu_fontstyle']); ?>; <?php } ?>
            <?php if($piquant_mikado_options['menu_fontweight'] !== '') { ?> font-weight: <?php echo esc_attr($piquant_mikado_options['menu_fontweight']); ?>; <?php } ?>
            <?php if($piquant_mikado_options['menu_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($piquant_mikado_options['menu_texttransform']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['menu_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($piquant_mikado_options['menu_letterspacing']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_google_fonts'] != "-1") { ?>
            .mkdf-page-header #lang_sel_list{
            font-family: '<?php echo esc_attr(str_replace('+', ' ', $piquant_mikado_options['menu_google_fonts'])); ?>', sans-serif !important;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_hovercolor'] !== '') { ?>
            .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a,
            .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a,
            body:not(.mkdf-menu-item-first-level-bg-color) .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a,
            body:not(.mkdf-menu-item-first-level-bg-color) .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a,
            .mkdf-page-header #lang_sel ul li a:hover,
            .mkdf-page-header #lang_sel_click > ul > li a:hover{
            color: <?php echo esc_attr($piquant_mikado_options['menu_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_activecolor'] !== '') { ?>
            .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a,
            body:not(.mkdf-menu-item-first-level-bg-color) .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a{
            color: <?php echo esc_attr($piquant_mikado_options['menu_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_item_icon_position'] == "top" && $piquant_mikado_options['menu_item_icon_size'] !== "") { ?>
            body.mkdf-menu-with-large-icons .mkdf-main-menu.mkdf-default-nav > ul > li > a span.item_inner i{
            font-size: <?php echo esc_attr($piquant_mikado_options['menu_item_icon_size']); ?>px !important;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_item_style'] == 'small_item' && ($piquant_mikado_options['menu_text_background_color'] !== '' || $piquant_mikado_options['enable_manu_item_border'] == 'yes')) { ?>
            .mkdf-main-menu.mkdf-default-nav > ul > li > a span.item_inner{
            <?php if($piquant_mikado_options['menu_text_background_color'] !== '') { ?> background-color: <?php echo esc_attr($piquant_mikado_options['menu_text_background_color']); ?>; <?php } ?>

            <?php if($piquant_mikado_options['enable_manu_item_border'] == 'yes') { ?>

                <?php if($piquant_mikado_options['menu_item_border_radius'] !== '') { ?> border-radius: <?php echo esc_attr($piquant_mikado_options['menu_item_border_radius']); ?>px;<?php } ?>

                <?php if($piquant_mikado_options['menu_item_border_style_style'] !== '') { ?> border-style: <?php echo esc_attr($piquant_mikado_options['menu_item_border_style_style']); ?>; <?php } ?>


                <?php if($piquant_mikado_options['menu_item_border_width'] !== '') { ?> border-width: <?php echo esc_attr($piquant_mikado_options['menu_item_border_width']); ?>px; <?php } ?>
                <?php if($piquant_mikado_options['menu_item_border_color'] !== '') { ?> border-color: <?php echo esc_attr($piquant_mikado_options['menu_item_border_color']); ?>; <?php } ?>

                <?php if($piquant_mikado_options['menu_item_border_style'] !== '') { ?>

                    <?php if($piquant_mikado_options['menu_item_border_style'] == 'top_bottom_borders') { ?>
                        border-left: none;
                        border-right: none;
                    <?php } ?>

                    <?php if($piquant_mikado_options['menu_item_border_style'] == 'right_border') { ?>
                        border-left: none;
                        border-top: none;
                        border-bottom: none;
                    <?php } ?>

                    <?php if($piquant_mikado_options['menu_item_border_style'] == 'bottom_border') { ?>
                        border-left: none;
                        border-top: none;
                        border-right: none;
                    <?php } ?>

                <?php } ?>
            <?php } ?>
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_item_border_style'] == 'right_border') { ?>
            .mkdf-main-menu.mkdf-default-nav > ul > li:last-child > a span.item_inner{
            border-right: none;
            }

            .mkdf-main-menu.mkdf-default-nav > ul > li:last-child > a{
            border-right: none;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_item_style'] == 'large_item') { ?>
            .mkdf-main-menu.mkdf-default-nav > ul > li > a{
            <?php if($piquant_mikado_options['menu_text_background_color'] !== '') { ?> background-color: <?php echo esc_attr($piquant_mikado_options['menu_text_background_color']); ?>; <?php } ?>

            <?php if($piquant_mikado_options['enable_manu_item_border'] == 'yes') { ?>
                <?php if($piquant_mikado_options['menu_item_border_width'] !== '') { ?> border-width: <?php echo esc_attr($piquant_mikado_options['menu_item_border_width']); ?>px; <?php } ?>
                <?php if($piquant_mikado_options['menu_item_border_color'] !== '') { ?> border-color: <?php echo esc_attr($piquant_mikado_options['menu_item_border_color']); ?>; <?php } ?>
                <?php if($piquant_mikado_options['menu_item_border_radius'] !== '') { ?>border-radius: <?php echo esc_attr($piquant_mikado_options['menu_item_border_radius']); ?>px;<?php } ?>

                <?php if($piquant_mikado_options['menu_item_border_style_style'] !== '') { ?> border-style: <?php echo esc_attr($piquant_mikado_options['menu_item_border_style_style']); ?>; <?php } ?>

                <?php if($piquant_mikado_options['menu_item_border_style'] !== '') { ?>

                    <?php if(($piquant_mikado_options['menu_item_border_style'] == 'top_bottom_borders')) { ?>
                        border-left: none;
                        border-right: none;
                    <?php } ?>

                    <?php if(($piquant_mikado_options['menu_item_border_style'] == 'right_border')) { ?>
                        border-left: none;
                        border-top: none;
                        border-bottom: none;
                    <?php } ?>
                    <?php if(($piquant_mikado_options['menu_item_border_style'] == 'bottom_border')) { ?>
                        border-left: none;
                        border-top: none;
                        border-right: none;
                    <?php } ?>

                <?php } ?>
            <?php } ?>
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_hover_background_color'] !== '') {
            $menu_hover_background_color = $piquant_mikado_options['menu_hover_background_color'];

            if($piquant_mikado_options['menu_hover_background_color_transparency'] !== '') {
                $menu_hover_background_color_rgb = piquant_mikado_hex2rgb($menu_hover_background_color);
                $menu_hover_background_color     = 'rgba('.$menu_hover_background_color_rgb[0].', '.$menu_hover_background_color_rgb[1].', '.$menu_hover_background_color_rgb[2].', '.$piquant_mikado_options['menu_hover_background_color_transparency'].')';
            } ?>

            <?php if($piquant_mikado_options['menu_item_style'] == 'small_item') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner,
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a span.item_inner {
                background-color: <?php echo esc_attr($menu_hover_background_color); ?>;
                }
            <?php } elseif($piquant_mikado_options['menu_item_style'] == 'large_item') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a,
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a {
                background-color: <?php echo esc_attr($menu_hover_background_color); ?>;
                }
            <?php } ?>
        <?php } ?>

        <?php if($piquant_mikado_options['menu_active_background_color'] !== '') {
            $menu_active_background_color = $piquant_mikado_options['menu_active_background_color'];

            if($piquant_mikado_options['menu_active_background_color_transparency'] !== '') {
                $menu_active_background_color_rgb = piquant_mikado_hex2rgb($menu_active_background_color);
                $menu_active_background_color     = 'rgba('.$menu_active_background_color_rgb[0].', '.$menu_active_background_color_rgb[1].', '.$menu_active_background_color_rgb[2].', '.$piquant_mikado_options['menu_active_background_color_transparency'].')';
            }
            ?>
            <?php if($piquant_mikado_options['menu_item_style'] == 'small_item') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner {
                background-color: <?php echo esc_attr($menu_active_background_color); ?>;
                }
            <?php } elseif($piquant_mikado_options['menu_item_style'] == 'large_item') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a {
                background-color: <?php echo esc_attr($menu_active_background_color); ?>;
                }
            <?php } ?>
        <?php } ?>


        <?php if($piquant_mikado_options['menu_light_hovercolor'] !== '') { ?>
            .light .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a,
            .light .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a{
            color: <?php echo esc_attr($piquant_mikado_options['menu_light_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_light_activecolor'] !== '') { ?>
            .light .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a{
            color: <?php echo esc_attr($piquant_mikado_options['menu_light_activecolor']); ?> !important;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_dark_hovercolor'] !== '') { ?>
            .dark .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a,
            .dark .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a{
            color: <?php echo esc_attr($piquant_mikado_options['menu_dark_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_dark_activecolor'] !== '') { ?>
            .dark .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a{
            color: <?php echo esc_attr($piquant_mikado_options['menu_dark_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['enable_manu_item_border'] == 'yes') { ?>

            <?php if($piquant_mikado_options['menu_light_border_color'] !== '') { ?>
                <?php if($piquant_mikado_options['menu_item_style'] == 'small_item') { ?>
                    .light .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner,
                    .light .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner{
                    border-color: <?php echo esc_attr($piquant_mikado_options['menu_light_border_color']); ?> !important;
                    }
                <?php } ?>
                <?php if($piquant_mikado_options['menu_item_style'] == 'large_item') { ?>
                    .light .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a,
                    .light .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a{
                    border-color: <?php echo esc_attr($piquant_mikado_options['menu_light_border_color']); ?> !important;
                    }
                <?php } ?>
            <?php } ?>
            <?php if($piquant_mikado_options['menu_dark_border_color'] !== '') { ?>
                <?php if($piquant_mikado_options['menu_item_style'] == 'small_item') { ?>
                    .dark .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner,
                    .dark .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner{
                    border-color: <?php echo esc_attr($piquant_mikado_options['menu_dark_border_color']); ?>!important;
                    }
                <?php } ?>
                <?php if($piquant_mikado_options['menu_item_style'] == 'large_item') { ?>
                    .dark .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a,
                    .dark .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a{
                    border-color: <?php echo esc_attr($piquant_mikado_options['menu_dark_border_color']); ?>!important;
                    }
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php if($piquant_mikado_options['menu_lineheight'] != "" || $piquant_mikado_options['menu_padding_left_right'] !== '') { ?>
            .mkdf-main-menu.mkdf-default-nav > ul > li > a span.item_inner{
            <?php if($piquant_mikado_options['menu_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($piquant_mikado_options['menu_lineheight']); ?>px; <?php } ?>
            <?php if($piquant_mikado_options['menu_padding_left_right']) { ?> padding: 0  <?php echo esc_attr($piquant_mikado_options['menu_padding_left_right']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_margin_left_right'] !== '') { ?>
            .mkdf-main-menu.mkdf-default-nav > ul > li{
            margin: 0  <?php echo esc_attr($piquant_mikado_options['menu_margin_left_right']); ?>px;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['menu_item_style'] == 'small_item' && $piquant_mikado_options['enable_manu_item_border'] == 'yes') { ?>
            <?php if($piquant_mikado_options['menu_item_border_color'] !== '') { ?>
                .light .mkdf-main-menu.mkdf-default-nav > ul > li > a span.item_inner{
                border-color: #fff;
                }
                .dark .mkdf-main-menu.mkdf-default-nav > ul > li a span.item_inner{
                border-color: #000;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_hover_border_color'] !== '') { ?>
                .light .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner{
                border-color: #fff;
                }
                .dark .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner{
                border-color: #000;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_active_border_color']) { ?>
                .light .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner{
                border-color: #fff;
                }
                .dark .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner{
                border-color: #000;
                }
            <?php } ?>
        <?php } ?>

        <?php if($piquant_mikado_options['menu_item_style'] == 'large_item' && $piquant_mikado_options['enable_manu_item_border'] == 'yes') { ?>
            <?php if($piquant_mikado_options['header_style'] == 'light') { ?>

                <?php if($piquant_mikado_options['menu_item_border_color'] !== '') { ?>
                    .light .mkdf-main-menu.mkdf-default-nav > ul > li > a{
                    border-color: #fff;
                    }
                <?php } ?>
                <?php if($piquant_mikado_options['menu_item_hover_border_color'] !== '') { ?>
                    .light .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a{
                    border-color: #fff;
                    }
                <?php } ?>
                <?php if($piquant_mikado_options['menu_item_active_border_color'] !== '') { ?>
                    .light .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a{
                    border-color: #fff;
                    }
                <?php } ?>
            <?php } ?>
            <?php if($piquant_mikado_options['header_style'] == 'dark') { ?>

                <?php if($piquant_mikado_options['menu_item_border_color'] !== '') { ?>
                    .dark .mkdf-main-menu.mkdf-default-nav > ul > li > a{
                    border-color: #000;
                    }
                <?php } ?>
                <?php if($piquant_mikado_options['menu_item_hover_border_color'] !== '') { ?>
                    .dark .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a{
                    border-color: #000;
                    }
                <?php } ?>
                <?php if($piquant_mikado_options['menu_item_active_border_color'] !== '') { ?>
                    .dark .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a{
                    border-color: #000;
                    }
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php if($piquant_mikado_options['menu_item_border_style'] == 'bottom_border_double' && $piquant_mikado_options['enable_manu_item_border'] == 'yes') { ?>
            <?php if($piquant_mikado_options['menu_item_style'] == 'small_item') { ?>
                <?php if($piquant_mikado_options['menu_item_border_color'] !== '') { ?>
                    .mkdf-main-menu.mkdf-default-nav > ul > li > a span.item_inner:before,
                    .mkdf-main-menu.mkdf-default-nav > ul > li > a span.item_inner:after{
                    background-color: <?php echo esc_attr($piquant_mikado_options['menu_item_border_color']); ?>;
                    display:block;
                    }
                    .mkdf-main-menu.mkdf-default-nav > ul > li > a span.item_inner{
                    border:none;
                    }
                <?php } ?>
                <?php if($piquant_mikado_options['menu_item_active_border_color'] !== '') { ?>
                    .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner:before,
                    .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner:after{
                    background-color: <?php echo esc_attr($piquant_mikado_options['menu_item_active_border_color']); ?>;
                    }
                    .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner{
                    border:none;
                    }
                <?php } ?>
                <?php if($piquant_mikado_options['menu_item_hover_border_color'] !== '') { ?>
                    .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner:before,
                    .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner:after{
                    background-color: <?php echo esc_attr($piquant_mikado_options['menu_item_hover_border_color']); ?>;
                    }
                    .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner{
                    border:none;
                    }
                <?php } ?>
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_style'] == 'large_item') { ?>
                <?php if($piquant_mikado_options['menu_item_border_color'] !== '') { ?>
                    .mkdf-main-menu.mkdf-default-nav > ul > li > a:before,
                    .mkdf-main-menu.mkdf-default-nav > ul > li > a:after{
                    background-color: <?php echo esc_attr($piquant_mikado_options['menu_item_border_color']); ?>;
                    display:block;
                    }
                    .mkdf-main-menu.mkdf-default-nav > ul > li > a{
                    border:none;
                    }
                <?php } ?>
                <?php if($piquant_mikado_options['menu_item_active_border_color'] !== '') { ?>
                    .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a:before,
                    .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a:after{
                    background-color: <?php echo esc_attr($piquant_mikado_options['menu_item_active_border_color']); ?>;
                    }
                    nav.main_menu > ul > li.mkdf-active-item > a{
                    border:none;
                    }
                <?php } ?>
                <?php if($piquant_mikado_options['menu_item_hover_border_color'] !== '') { ?>
                    .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a:before,
                    .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a:after{
                    background-color: <?php echo esc_attr($piquant_mikado_options['menu_item_hover_border_color']); ?>;
                    }
                    .mkdf-main-menu.mkdf-default-nav > ul > li > a{
                    border:none;
                    }
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php if($piquant_mikado_options['menu_item_border_style'] == 'right_border' && $piquant_mikado_options['enable_manu_item_border'] == 'yes') { ?>
            <?php if($piquant_mikado_options['menu_item_style'] == 'large_item') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li:last-child > a span.item_inner{
                border-right:none;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_style'] == 'small_item') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li:last-child > a {
                border-right:none;
                }
            <?php } ?>
        <?php } ?>

        <?php if($piquant_mikado_options['menu_item_hover_border_color'] !== '' && $piquant_mikado_options['enable_manu_item_border'] == 'yes') { ?>
            <?php if($piquant_mikado_options['menu_item_style'] == 'small_item') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner,
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a span.item_inner,
                header:not(.mkdf-menu-item-first-level-bg-color) .mkdf-main-menu.mkdf-default-nav > ul > li:hover a span.item_inner{
                border-color: <?php echo esc_attr($piquant_mikado_options['menu_item_hover_border_color']); ?>;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_style'] == 'large_item') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a,
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a,
                header:not(.mkdf-menu-item-first-level-bg-color) .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a{
                border-color: <?php echo esc_attr($piquant_mikado_options['menu_item_hover_border_color']); ?>;
                }
            <?php } ?>
        <?php } ?>

        <?php if($piquant_mikado_options['menu_item_active_border_color'] !== '' && $piquant_mikado_options['enable_manu_item_border'] == 'yes') { ?>
            <?php if($piquant_mikado_options['menu_item_style'] == 'small_item') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner,
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner,
                header:not(.mkdf-menu-item-first-level-bg-color) .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner{
                border-color: <?php echo esc_attr($piquant_mikado_options['menu_item_active_border_color']); ?>;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_style'] == 'large_item') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item,
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item a,
                header:not(.mkdf-menu-item-first-level-bg-color) .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a{
                border-color: <?php echo esc_attr($piquant_mikado_options['menu_item_active_border_color']); ?>;
                }
            <?php } ?>
        <?php } ?>

        <?php if($piquant_mikado_options['enable_menu_item_separators'] == "yes" && $piquant_mikado_options['menu_item_separators_color'] !== '') { ?>
            .mkdf-main-menu.mkdf-default-nav > ul > li > a span.plus{
            display: block;
            background-color: <?php echo esc_attr($piquant_mikado_options['menu_item_separators_color']); ?>;
            }
        <?php } ?>


        <?php if($piquant_mikado_options['enable_menu_item_text_decoration'] == 'yes') { ?>

            <?php if($piquant_mikado_options['menu_item_text_decoration_style'] == 'none') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner,
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a span.item_inner{
                text-decoration: none;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_text_decoration_style'] == 'underline') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner,
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a span.item_inner{
                text-decoration: underline;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_text_decoration_style'] == 'line-through') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner,
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a span.item_inner{
                text-decoration: line-through;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_text_decoration_style'] == 'overline') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li:hover > a span.item_inner,
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item:hover > a span.item_inner{
                text-decoration: overline;
                }
            <?php } ?>


            <?php if($piquant_mikado_options['menu_item_active_text_decoration_style'] == 'none') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner{
                text-decoration: none;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_active_text_decoration_style'] == 'underline') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner{
                text-decoration: underline;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_active_text_decoration_style'] == 'line-through') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner{
                text-decoration: line-through;
                }
            <?php } ?>
            <?php if($piquant_mikado_options['menu_item_active_text_decoration_style'] == 'overline') { ?>
                .mkdf-main-menu.mkdf-default-nav > ul > li.mkdf-active-item > a span.item_inner{
                text-decoration: overline;
                }
            <?php } ?>

        <?php } ?>

        <?php
        if($piquant_mikado_options['dropdown_background_color'] != "" || $piquant_mikado_options['dropdown_background_transparency'] != "") {

            //dropdown background and transparency styles
            $dropdown_bg_color_initial        = '#252525';
            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color        = $piquant_mikado_options['dropdown_background_color'] !== "" ? $piquant_mikado_options['dropdown_background_color'] : $dropdown_bg_color_initial;
            $dropdown_bg_transparency = $piquant_mikado_options['dropdown_background_transparency'] !== "" ? $piquant_mikado_options['dropdown_background_transparency'] : $dropdown_bg_transparency_initial;

            $dropdown_bg_color_rgb = piquant_mikado_hex2rgb($dropdown_bg_color);

            ?>

            .mkdf-drop-down .second .inner ul,
            .mkdf-drop-down .second .inner ul li ul,
            .shopping_cart_dropdown,
            li.narrow .second .inner ul,
            .mkdf-main-menu.mkdf-default-nav #lang_sel ul ul,
            .mkdf-main-menu.mkdf-default-nav #lang_sel_click  ul ul,
            .header-widget.widget_nav_menu ul ul,
            .mkdf-drop-down .wide.wide_background .second{
            background-color: <?php echo esc_attr($dropdown_bg_color); ?>;
            background-color: rgba(<?php echo esc_attr($dropdown_bg_color_rgb[0]); ?>,<?php echo esc_attr($dropdown_bg_color_rgb[1]); ?>,<?php echo esc_attr($dropdown_bg_color_rgb[2]); ?>,<?php echo esc_attr($dropdown_bg_transparency); ?>);
            }

        <?php } //end dropdown background and transparency styles ?>

        <?php if($piquant_mikado_options['dropdown_top_separator_color'] !== '') { ?>
            .mkdf-drop-down .second{
            border-top-color: <?php echo esc_attr($piquant_mikado_options['dropdown_top_separator_color']); ?>;
            }
        <?php } ?>

        <?php
        if($piquant_mikado_options['dropdown_top_padding'] !== '' || $piquant_mikado_options['dropdown_border_around'] == "no") {

            $menu_inner_ul_top = 15; //default value without border
            if($piquant_mikado_options['dropdown_top_padding'] !== '') {
                ?>
                li.narrow .second .inner ul,
                .mkdf-drop-down .wide .second .inner > ul{
                padding-top: <?php echo esc_attr($piquant_mikado_options['dropdown_top_padding']); ?>px;
                }
                <?php
                $menu_inner_ul_top = $piquant_mikado_options['dropdown_top_padding']; //overwrite default value
            } ?>
            <?php if($piquant_mikado_options['dropdown_border_around'] == "yes") {
                $menu_inner_ul_top += 1; //top border is 1px
            }
            ?>
            .mkdf-drop-down .narrow .second .inner ul li ul,
            body.mkdf-slide-from-bottom .mkdf-drop-down .narrow .second .inner ul li:hover ul,
            body.mkdf-slide-from-top .narrow .second .inner ul li:hover ul{
            top:-<?php echo esc_attr($menu_inner_ul_top); ?>px;
            }

        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_bottom_padding'] !== '') { ?>
            li.narrow .second .inner ul,
            .mkdf-drop-down .wide .second .inner > ul{
            padding-bottom: <?php echo esc_attr($piquant_mikado_options['dropdown_bottom_padding']); ?>px;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['enable_dropdown_top_separator'] == "no") { ?>
            .mkdf-drop-down .second{
            border-top: 0 !important;
            }
        <?php } ?>

        <?php
        $dropdown_separator_full_width = 'no';
        if($piquant_mikado_options['enable_dropdown_separator_full_width'] == "yes") {
            $dropdown_separator_full_width = $piquant_mikado_options['enable_dropdown_separator_full_width']; ?>
            .mkdf-drop-down .second .inner > ul > li:last-child > a,
            .mkdf-drop-down .second .inner > ul > li > ul > li:last-child > a,
            .mkdf-drop-down .second .inner > ul > li > ul > li > ul > li:last-child > a{
            border-bottom:1px solid transparent;
            }

        <?php }
        if($dropdown_separator_full_width !== 'yes' && $piquant_mikado_options['dropdown_separator_color'] !== '') {
            ?>
            .mkdf-drop-down .second .inner ul li a,
            .header-widget.widget_nav_menu ul.menu li ul li a {
            border-color: <?php echo esc_attr($piquant_mikado_options['dropdown_separator_color']); ?>;
            }
        <?php } ?>
        <?php
        if($dropdown_separator_full_width == 'yes' && $piquant_mikado_options['dropdown_separator_color'] !== '') {
            ?>
            .mkdf-drop-down .second .inner ul li,
            .header-widget.widget_nav_menu ul.menu li ul li{
            border-bottom: 1px solid <?php echo esc_attr($piquant_mikado_options['dropdown_separator_color']); ?>;
            }
        <?php } ?>

        <?php if(!empty($piquant_mikado_options['dropdown_vertical_separator_color'])) { ?>
            .mkdf-drop-down .wide .second ul li{
            border-left-color: <?php echo esc_attr($piquant_mikado_options['dropdown_vertical_separator_color']); ?>;
            }
        <?php } ?>


        <?php if($piquant_mikado_options['dropdown_top_position'] !== '') { ?>
            header .mkdf-drop-down .second {
            top: <?php echo esc_attr($piquant_mikado_options['dropdown_top_position']).'%;'; ?>
            }
        <?php } ?>


        <?php if($piquant_mikado_options['dropdown_border_around'] == "yes" && $piquant_mikado_options['dropdown_border_around_color'] !== '') { ?>
            .mkdf-drop-down .second .inner > ul,
            li.narrow .second .inner ul,
            .mkdf-drop-down .narrow .second .inner ul li ul,
            .shopping_cart_dropdown,
            .shopping_cart_dropdown ul li{
            border-color:  <?php echo esc_attr($piquant_mikado_options['dropdown_border_around_color']); ?>;
            }

        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_border_around'] == "no") { ?>
            .mkdf-drop-down .second .inner>ul,
            li.narrow .second .inner ul,
            .mkdf-drop-down .narrow .second .inner ul li ul{
            border: none;
            }

            .mkdf-drop-down .second .inner ul.right li ul{
            margin-left: 0;
            }

        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_color'] !== '' || $piquant_mikado_options['dropdown_fontsize'] !== '' || $piquant_mikado_options['dropdown_lineheight'] !== '' || $piquant_mikado_options['dropdown_fontstyle'] !== '' || $piquant_mikado_options['dropdown_fontweight'] !== '' || $piquant_mikado_options['dropdown_google_fonts'] != "-1" || $piquant_mikado_options['dropdown_texttransform'] !== '' || $piquant_mikado_options['dropdown_letterspacing'] !== '') { ?>
            .mkdf-drop-down .second .inner > ul > li > a,
            .mkdf-drop-down .second .inner > ul > li > h4,
            .mkdf-drop-down .wide .second .inner > ul > li > h4,
            .mkdf-drop-down .wide .second .inner > ul > li > a,
            .mkdf-drop-down .wide .second ul li ul li.menu-item-has-children > a,
            .mkdf-drop-down .wide .second .inner ul li.sub ul li.menu-item-has-children > a,
            .mkdf-drop-down .wide .second .inner > ul li.sub .flexslider ul li  h4 a,
            .mkdf-drop-down .wide .second .inner > ul li .flexslider ul li  h4 a,
            .mkdf-drop-down .wide .second .inner > ul li.sub .flexslider ul li  h4,
            .mkdf-drop-down .wide .second .inner > ul li .flexslider ul li  h4,
            .mkdf-main-menu.mkdf-default-nav #lang_sel ul li li a,
            .mkdf-main-menu.mkdf-default-nav #lang_sel_click ul li ul li a,
            .mkdf-main-menu.mkdf-default-nav #lang_sel ul ul a,
            .mkdf-main-menu.mkdf-default-nav #lang_sel_click ul ul a{
            <?php if(!empty($piquant_mikado_options['dropdown_color'])) { ?> color: <?php echo esc_attr($piquant_mikado_options['dropdown_color']); ?>; <?php } ?>
            <?php if($piquant_mikado_options['dropdown_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $piquant_mikado_options['dropdown_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($piquant_mikado_options['dropdown_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($piquant_mikado_options['dropdown_fontsize']); ?>px; <?php } ?>
            <?php if($piquant_mikado_options['dropdown_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($piquant_mikado_options['dropdown_lineheight']); ?>px; <?php } ?>
            <?php if($piquant_mikado_options['dropdown_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($piquant_mikado_options['dropdown_fontstyle']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($piquant_mikado_options['dropdown_fontweight']); ?>; <?php } ?>
            <?php if($piquant_mikado_options['dropdown_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($piquant_mikado_options['dropdown_texttransform']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($piquant_mikado_options['dropdown_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_color'] !== '') { ?>
            .shopping_cart_dropdown ul li
            .item_info_holder .item_left a,
            .shopping_cart_dropdown ul li .item_info_holder .item_right .amount,
            .shopping_cart_dropdown .cart_bottom .subtotal_holder .total,
            .shopping_cart_dropdown .cart_bottom .subtotal_holder .total_amount{
            color: <?php echo esc_attr($piquant_mikado_options['dropdown_color']); ?>;
            }
        <?php } ?>

        <?php if(!empty($piquant_mikado_options['dropdown_hovercolor'])) { ?>
            .mkdf-drop-down .second .inner > ul > li:hover > a,
            .mkdf-drop-down .wide .second ul li ul li.menu-item-has-children:hover > a,
            .mkdf-drop-down .wide .second .inner ul li.sub ul li.menu-item-has-children:hover > a,
            .mkdf-main-menu.mkdf-default-nav #lang_sel ul li li:hover a,
            .mkdf-main-menu.mkdf-default-nav #lang_sel_click ul li ul li:hover a,
            .mkdf-main-menu.mkdf-default-nav #lang_sel ul li:hover > a,
            .mkdf-main-menu.mkdf-default-nav #lang_sel_click ul li:hover > a{
            color: <?php echo esc_attr($piquant_mikado_options['dropdown_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($piquant_mikado_options['dropdown_background_hovercolor'])) { ?>
            .mkdf-drop-down li:not(.wide) .second .inner > ul > li:hover{
            background-color: <?php echo esc_attr($piquant_mikado_options['dropdown_background_hovercolor']); ?>;
            }
        <?php } ?>

        <?php if(!empty($piquant_mikado_options['dropdown_padding_top_bottom'])) { ?>
            .mkdf-drop-down .wide .second>.inner>ul>li.sub>ul>li>a,
            .mkdf-drop-down .second .inner ul li a,
            .mkdf-drop-down .wide .second ul li a,
            .mkdf-drop-down .second .inner ul.right li a{
            padding-top: <?php echo esc_attr($piquant_mikado_options['dropdown_padding_top_bottom']); ?>px;
            padding-bottom: <?php echo esc_attr($piquant_mikado_options['dropdown_padding_top_bottom']); ?>px;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_wide_color'] !== '' || $piquant_mikado_options['dropdown_wide_fontsize'] !== '' || $piquant_mikado_options['dropdown_wide_lineheight'] !== '' || $piquant_mikado_options['dropdown_wide_fontstyle'] !== '' || $piquant_mikado_options['dropdown_wide_fontweight'] !== '' || $piquant_mikado_options['dropdown_wide_google_fonts'] !== "-1" || $piquant_mikado_options['dropdown_wide_texttransform'] !== '' || $piquant_mikado_options['dropdown_wide_letterspacing'] !== '') { ?>
            .mkdf-drop-down .wide .second .inner > ul > li > a{
            <?php if($piquant_mikado_options['dropdown_wide_color'] !== '') { ?> color: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_color']); ?>; <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $piquant_mikado_options['dropdown_wide_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_fontsize']); ?>px; <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_lineheight']); ?>px; <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_fontstyle']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_fontweight']); ?>; <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_texttransform']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_wide_hovercolor'] !== '') { ?>
            .mkdf-drop-down .wide .second .inner > ul > li:hover > a {
            color: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($piquant_mikado_options['dropdown_wide_background_hovercolor'])) { ?>
            .mkdf-drop-down .wide .second .inner > ul > li:hover > a{
            background-color: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_background_hovercolor']); ?>
            }
        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_wide_padding_top_bottom'] !== '') { ?>
            .mkdf-drop-down .wide .second>.inner > ul > li.sub > ul > li > a,
            .mkdf-drop-down .wide .second .inner ul li a,
            .mkdf-drop-down .wide .second ul li a,
            .mkdf-drop-down .wide .second .inner ul.right li a{
            padding-top: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_padding_top_bottom']); ?>px;
            padding-bottom: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_padding_top_bottom']); ?>px;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_color_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_fontsize_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_lineheight_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_fontstyle_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_fontweight_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_google_fonts_thirdlvl'] != "-1" || $piquant_mikado_options['dropdown_texttransform_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_letterspacing_thirdlvl'] !== '') { ?>
            .mkdf-drop-down .second .inner ul li.sub ul li a{
            <?php if($piquant_mikado_options['dropdown_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($piquant_mikado_options['dropdown_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $piquant_mikado_options['dropdown_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($piquant_mikado_options['dropdown_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($piquant_mikado_options['dropdown_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($piquant_mikado_options['dropdown_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($piquant_mikado_options['dropdown_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($piquant_mikado_options['dropdown_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($piquant_mikado_options['dropdown_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($piquant_mikado_options['dropdown_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($piquant_mikado_options['dropdown_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($piquant_mikado_options['dropdown_hovercolor_thirdlvl'] !== '') { ?>
            .mkdf-drop-down .second .inner ul li.sub ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next),
            .mkdf-drop-down .second .inner ul li ul li:not(.flex-active-slide):hover > a:not(.flex-prev):not(.flex-next){
            color: <?php echo esc_attr($piquant_mikado_options['dropdown_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_background_hovercolor_thirdlvl'] !== '') { ?>
            .mkdf-drop-down .second .inner ul li.sub ul li:hover,
            .mkdf-drop-down .second .inner ul li ul li:hover{
            background-color: <?php echo esc_attr($piquant_mikado_options['dropdown_background_hovercolor_thirdlvl']); ?>;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_wide_color_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_wide_fontsize_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_wide_lineheight_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_wide_fontstyle_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_wide_fontweight_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_wide_google_fonts_thirdlvl'] != "-1" || $piquant_mikado_options['dropdown_wide_texttransform_thirdlvl'] !== '' || $piquant_mikado_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?>
            .mkdf-drop-down .wide .second .inner ul li.sub ul li a,
            .mkdf-drop-down .wide .second ul li ul li a{
            <?php if($piquant_mikado_options['dropdown_wide_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $piquant_mikado_options['dropdown_wide_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($piquant_mikado_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($piquant_mikado_options['dropdown_wide_hovercolor_thirdlvl'] !== '') { ?>
            .mkdf-drop-down .wide .second .inner ul li.sub ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover,
            .mkdf-drop-down .wide .second .inner ul li ul li:not(.flex-active-slide) > a:not(.flex-prev):not(.flex-next):hover{
            color: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($piquant_mikado_options['dropdown_wide_background_hovercolor_thirdlvl'] !== '') { ?>
            .mkdf-drop-down .wide .second .inner ul li.sub ul li:hover,
            .mkdf-drop-down .wide .second .inner ul li ul li:hover{
            background-color: <?php echo esc_attr($piquant_mikado_options['dropdown_wide_background_hovercolor_thirdlvl']); ?>;
            }
        <?php }
    }

    add_action('piquant_mikado_style_dynamic', 'piquant_mikado_main_menu_styles');
}
