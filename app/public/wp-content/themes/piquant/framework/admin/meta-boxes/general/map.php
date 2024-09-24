<?php

$general_meta_box = piquant_mikado_add_meta_box(
	array(
		'scope' => array('page', 'portfolio-item', 'post', 'restaurant-menu-item'),
		'title' => 'General',
		'name'  => 'general_meta'
	)
);

piquant_mikado_add_meta_box_field(
	array(
		'name'          => 'mkdf_page_background_color_meta',
		'type'          => 'color',
		'default_value' => '',
		'label'         => 'Page Background Color',
		'description'   => 'Choose background color for page content',
		'parent'        => $general_meta_box
	)
);

piquant_mikado_add_meta_box_field(
	array(
		'name'          => 'mkdf_page_slider_meta',
		'type'          => 'text',
		'default_value' => '',
		'label'         => 'Slider Shortcode',
		'description'   => 'Paste your slider shortcode here',
		'parent'        => $general_meta_box
	)
);

$mkdf_content_padding_group = piquant_mikado_add_admin_group(array(
	'name'        => 'content_padding_group',
	'title'       => 'Content Style',
	'description' => 'Define styles for Content area',
	'parent'      => $general_meta_box
));

$mkdf_content_padding_row = piquant_mikado_add_admin_row(array(
	'name'   => 'mkdf_content_padding_row',
	'next'   => true,
	'parent' => $mkdf_content_padding_group
));

piquant_mikado_add_meta_box_field(
	array(
		'name'          => 'mkdf_page_content_behind_header_meta',
		'type'          => 'yesnosimple',
		'default_value' => 'no',
		'label'         => 'Always put content behind header',
		'parent'        => $mkdf_content_padding_row,
		'args'          => array(
			'suffix' => 'px'
		)
	)
);

piquant_mikado_add_meta_box_field(
	array(
		'name'          => 'mkdf_page_content_top_padding',
		'type'          => 'textsimple',
		'default_value' => '',
		'label'         => 'Content Top Padding',
		'parent'        => $mkdf_content_padding_row,
		'args'          => array(
			'suffix' => 'px'
		)
	)
);

piquant_mikado_add_meta_box_field(
	array(
		'name'    => 'mkdf_page_content_top_padding_mobile',
		'type'    => 'selectblanksimple',
		'label'   => 'Set this top padding for mobile header',
		'parent'  => $mkdf_content_padding_row,
		'options' => array(
			'yes' => 'Yes',
			'no'  => 'No',
		)
	)
);

piquant_mikado_add_meta_box_field(array(
	'name'          => 'mkdf_overlapping_content_enable_meta',
	'type'          => 'yesno',
	'default_value' => 'no',
	'label'         => 'Enable Overlapping Content',
	'description'   => 'Enabling this option will make content overlap title area',
	'parent'        => $general_meta_box
));

$content_background_image_group = piquant_mikado_add_admin_group(array(
	'name'   => 'mkdf_content_background_image_group',
	'parent' => $general_meta_box,
	'title'  => 'Content Background Image'
));

$content_background_image_row1 = piquant_mikado_add_admin_row(array(
	'name'   => 'mkdf_content_background_image_row1',
	'parent' => $content_background_image_group
));

piquant_mikado_add_meta_box_field(array(
	'name'   => 'mkdf_content_bg_img1_meta',
	'type'   => 'imagesimple',
	'label'  => 'First Content Background Image',
	'parent' => $content_background_image_row1
));

piquant_mikado_add_meta_box_field(array(
	'name'          => 'mkdf_content_bg_img1_repeat_meta',
	'type'          => 'yesnosimple',
	'default_value' => 'no',
	'label'         => 'Repeat First Background Image?',
	'parent'        => $content_background_image_row1
));

$content_background_image_row2 = piquant_mikado_add_admin_row(array(
	'name'   => 'mkdf_content_background_image_row2',
	'parent' => $content_background_image_group
));

piquant_mikado_add_meta_box_field(array(
	'name'   => 'mkdf_content_bg_img2_meta',
	'type'   => 'imagesimple',
	'label'  => 'Second Content Background Image',
	'parent' => $content_background_image_row1
));

piquant_mikado_add_meta_box_field(array(
	'name'          => 'mkdf_content_bg_img2_repeat_meta',
	'type'          => 'yesnosimple',
	'default_value' => 'no',
	'label'         => 'Repeat Second Background Image?',
	'parent'        => $content_background_image_row1
));

piquant_mikado_add_meta_box_field(
	array(
		'name'          => 'mkdf_page_comments_meta',
		'type'          => 'selectblank',
		'label'         => 'Show Comments',
		'description'   => 'Enabling this option will show comments on your page',
		'parent'        => $general_meta_box,
		'default_value' => 'yes',
		'options'       => array(
			'yes' => 'Yes',
			'no'  => 'No',
		)
	)
);