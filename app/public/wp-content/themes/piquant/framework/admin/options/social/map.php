<?php

if(!function_exists('piquant_mikado_social_options_map')) {

    function piquant_mikado_social_options_map() {

        piquant_mikado_add_admin_page(
            array(
                'slug'  => '_social_page',
                'title' => 'Social',
                'icon'  => 'fa fa-share-alt'
            )
        );

        /**
         * Enable Social Share
         */
        $panel_social_share = piquant_mikado_add_admin_panel(array(
            'page'  => '_social_page',
            'name'  => 'panel_social_share',
            'title' => 'Enable Social Share'
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share',
            'default_value' => 'no',
            'label'         => 'Enable Social Share',
            'description'   => 'Enabling this option will allow social share on networks of your choice',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkdf_panel_social_networks, #mkdf_panel_show_social_share_on'
            ),
            'parent'        => $panel_social_share
        ));

        $panel_show_social_share_on = piquant_mikado_add_admin_panel(array(
            'page'            => '_social_page',
            'name'            => 'panel_show_social_share_on',
            'title'           => 'Show Social Share On',
            'hidden_property' => 'enable_social_share',
            'hidden_value'    => 'no'
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share_on_post',
            'default_value' => 'no',
            'label'         => 'Posts',
            'description'   => 'Show Social Share on Blog Posts',
            'parent'        => $panel_show_social_share_on
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share_on_page',
            'default_value' => 'no',
            'label'         => 'Pages',
            'description'   => 'Show Social Share on Pages',
            'parent'        => $panel_show_social_share_on
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share_on_attachment',
            'default_value' => 'no',
            'label'         => 'Media',
            'description'   => 'Show Social Share for Images and Videos',
            'parent'        => $panel_show_social_share_on
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share_on_portfolio-item',
            'default_value' => 'no',
            'label'         => 'Portfolio Item',
            'description'   => 'Show Social Share for Portfolio Items',
            'parent'        => $panel_show_social_share_on
        ));

        if(piquant_mikado_is_woocommerce_installed()) {
            piquant_mikado_add_admin_field(array(
                'type'          => 'yesno',
                'name'          => 'enable_social_share_on_portfolio_page',
                'default_value' => 'no',
                'label'         => 'Product',
                'description'   => 'Show Social Share for Product Items',
                'parent'        => $panel_show_social_share_on
            ));
        }

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_social_share_on_restaurant-menu-item',
            'default_value' => 'no',
            'label'         => 'Restaurant Menu Item',
            'description'   => 'Show Social Share for Restaurant Menu Item',
            'parent'        => $panel_show_social_share_on
        ));

        /**
         * Social Share Networks
         */
        $panel_social_networks = piquant_mikado_add_admin_panel(array(
            'page'            => '_social_page',
            'name'            => 'panel_social_networks',
            'title'           => 'Social Networks',
            'hidden_property' => 'enable_social_share',
            'hidden_value'    => 'no'
        ));

        /**
         * Facebook
         */
        piquant_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'facebook_title',
            'title'  => 'Share on Facebook'
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_facebook_share',
            'default_value' => 'no',
            'label'         => 'Enable Share',
            'description'   => 'Enabling this option will allow sharing via Facebook',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkdf_enable_facebook_share_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_facebook_share_container = piquant_mikado_add_admin_container(array(
            'name'            => 'enable_facebook_share_container',
            'hidden_property' => 'enable_facebook_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'facebook_icon',
            'default_value' => '',
            'label'         => 'Upload Icon',
            'parent'        => $enable_facebook_share_container
        ));

        /**
         * Twitter
         */
        piquant_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'twitter_title',
            'title'  => 'Share on Twitter'
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_twitter_share',
            'default_value' => 'no',
            'label'         => 'Enable Share',
            'description'   => 'Enabling this option will allow sharing via Twitter',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkdf_enable_twitter_share_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_twitter_share_container = piquant_mikado_add_admin_container(array(
            'name'            => 'enable_twitter_share_container',
            'hidden_property' => 'enable_twitter_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'twitter_icon',
            'default_value' => '',
            'label'         => 'Upload Icon',
            'parent'        => $enable_twitter_share_container
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'text',
            'name'          => 'twitter_via',
            'default_value' => '',
            'label'         => 'Via',
            'parent'        => $enable_twitter_share_container
        ));

        /**
         * Google Plus
         */
        piquant_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'google_plus_title',
            'title'  => 'Share on Google Plus'
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_google_plus_share',
            'default_value' => 'no',
            'label'         => 'Enable Share',
            'description'   => 'Enabling this option will allow sharing via Google Plus',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkdf_enable_google_plus_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_google_plus_container = piquant_mikado_add_admin_container(array(
            'name'            => 'enable_google_plus_container',
            'hidden_property' => 'enable_google_plus_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'google_plus_icon',
            'default_value' => '',
            'label'         => 'Upload Icon',
            'parent'        => $enable_google_plus_container
        ));

        /**
         * Linked In
         */
        piquant_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'linkedin_title',
            'title'  => 'Share on LinkedIn'
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_linkedin_share',
            'default_value' => 'no',
            'label'         => 'Enable Share',
            'description'   => 'Enabling this option will allow sharing via LinkedIn',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkdf_enable_linkedin_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_linkedin_container = piquant_mikado_add_admin_container(array(
            'name'            => 'enable_linkedin_container',
            'hidden_property' => 'enable_linkedin_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'linkedin_icon',
            'default_value' => '',
            'label'         => 'Upload Icon',
            'parent'        => $enable_linkedin_container
        ));

        /**
         * Tumblr
         */
        piquant_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'tumblr_title',
            'title'  => 'Share on Tumblr'
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_tumblr_share',
            'default_value' => 'no',
            'label'         => 'Enable Share',
            'description'   => 'Enabling this option will allow sharing via Tumblr',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkdf_enable_tumblr_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_tumblr_container = piquant_mikado_add_admin_container(array(
            'name'            => 'enable_tumblr_container',
            'hidden_property' => 'enable_tumblr_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'tumblr_icon',
            'default_value' => '',
            'label'         => 'Upload Icon',
            'parent'        => $enable_tumblr_container
        ));

        /**
         * Pinterest
         */
        piquant_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'pinterest_title',
            'title'  => 'Share on Pinterest'
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_pinterest_share',
            'default_value' => 'no',
            'label'         => 'Enable Share',
            'description'   => 'Enabling this option will allow sharing via Pinterest',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkdf_enable_pinterest_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_pinterest_container = piquant_mikado_add_admin_container(array(
            'name'            => 'enable_pinterest_container',
            'hidden_property' => 'enable_pinterest_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'pinterest_icon',
            'default_value' => '',
            'label'         => 'Upload Icon',
            'parent'        => $enable_pinterest_container
        ));

        /**
         * VK
         */
        piquant_mikado_add_admin_section_title(array(
            'parent' => $panel_social_networks,
            'name'   => 'vk_title',
            'title'  => 'Share on VK'
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'yesno',
            'name'          => 'enable_vk_share',
            'default_value' => 'no',
            'label'         => 'Enable Share',
            'description'   => 'Enabling this option will allow sharing via VK',
            'args'          => array(
                'dependence'             => true,
                'dependence_hide_on_yes' => '',
                'dependence_show_on_yes' => '#mkdf_enable_vk_container'
            ),
            'parent'        => $panel_social_networks
        ));

        $enable_vk_container = piquant_mikado_add_admin_container(array(
            'name'            => 'enable_vk_container',
            'hidden_property' => 'enable_vk_share',
            'hidden_value'    => 'no',
            'parent'          => $panel_social_networks
        ));

        piquant_mikado_add_admin_field(array(
            'type'          => 'image',
            'name'          => 'vk_icon',
            'default_value' => '',
            'label'         => 'Upload Icon',
            'parent'        => $enable_vk_container
        ));

        if(defined('MIKADOF_TWITTER_FEED_VERSION')) {
            $twitter_panel = piquant_mikado_add_admin_panel(array(
                'title' => 'Twitter',
                'name'  => 'panel_twitter',
                'page'  => '_social_page'
            ));

            piquant_mikado_add_admin_twitter_button(array(
                'name'   => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if(defined('MIKADOF_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = piquant_mikado_add_admin_panel(array(
                'title' => 'Instagram',
                'name'  => 'panel_instagram',
                'page'  => '_social_page'
            ));

            piquant_mikado_add_admin_instagram_button(array(
                'name'   => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }
    }

    add_action('piquant_mikado_options_map', 'piquant_mikado_social_options_map', 17);

}