<?php

if(!function_exists('piquant_mikado_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function piquant_mikado_is_responsive_on() {
        return piquant_mikado_options()->getOptionValue('responsiveness') !== 'no';
    }
}

if(!function_exists('piquant_mikado_is_seo_enabled')) {
    /**
     * Checks if SEO is enabled in theme options
     * @return bool
     */
    function piquant_mikado_is_seo_enabled() {
        return piquant_mikado_options()->getOptionValue('disable_seo') == 'no';
    }
}

if(!function_exists('piquant_mikado_is_social_share_enabled')) {
    /**
     * Checks if social share is enabled
     *
     * @return bool
     */
    function piquant_mikado_is_social_share_enabled() {
        return piquant_mikado_options()->getOptionValue('enable_social_share') == 'yes';
    }
}

if(!function_exists('piquant_mikado_is_blog_like_enabled')) {
    /**
     * Checks if like is enabled on blog lists
     *
     * @return bool
     */
    function piquant_mikado_is_blog_like_enabled() {
        return piquant_mikado_options()->getOptionValue('enable_blog_like') == 'yes';
    }
}