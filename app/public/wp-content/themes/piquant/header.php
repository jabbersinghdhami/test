<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php piquant_mikado_wp_title(); ?>
    <?php
    /**
     * @see piquant_mikado_header_meta() - hooked with 10
     * @see mkd_user_scalable - hooked with 10
     */
    ?>
	<?php do_action('piquant_mikado_header_meta'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php piquant_mikado_get_side_area(); ?>

<div class="mkdf-wrapper">
    <div class="mkdf-wrapper-inner">
        <?php piquant_mikado_get_header(); ?>

        <?php if(piquant_mikado_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='mkdf-back-to-top'  href='#'>
                <span class="mkdf-back-to-top-text">Top</span>
                <span aria-hidden="true" class="arrow_carrot-up"></span>
            </a>
        <?php } ?>

        <div class="mkdf-content" <?php piquant_mikado_content_elem_style_attr(); ?>>
            <div class="mkdf-content-inner">