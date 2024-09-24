<?php

if(!function_exists('piquant_mikado_overlapping_content_opening_tag')) {
    /**
     * Prints opening HTML tags for overlapping content
     * Hooks to piquant_mikado_after_container_open
     */
    function piquant_mikado_overlapping_content_opening_tag() {
        if(piquant_mikado_overlapping_content_enabled()) : ?>
            <div class="mkdf-overlapping-content-holder">
            <div class="mkdf-overlapping-content">
            <div class="mkdf-overlapping-content-inner">
    <?php endif;
    }

    add_action('piquant_mikado_after_container_open', 'piquant_mikado_overlapping_content_opening_tag');
}

if(!function_exists('piquant_mikado_overlapping_content_closing_tag')) {
    /**
     * Prints closing HTML tags for overlapping content
     * Hooks to piquant_mikado_before_container_close
     */
    function piquant_mikado_overlapping_content_closing_tag() {
        if(piquant_mikado_overlapping_content_enabled()) : ?>
            </div> <!-- close .mkdf-overlapping-content-inner -->
            </div> <!-- close .mkdf-overlapping-content -->
            </div> <!-- close .mkdf-overlapping-content-holder -->
    <?php endif;
    }

    add_action('piquant_mikado_before_container_close', 'piquant_mikado_overlapping_content_closing_tag');
}