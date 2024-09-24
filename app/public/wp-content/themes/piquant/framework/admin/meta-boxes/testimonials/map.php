<?php

//Testimonials

$testimonial_meta_box = piquant_mikado_add_meta_box(
    array(
        'scope' => array('testimonials'),
        'title' => 'Testimonial',
        'name' => 'testimonial_meta'
    )
);


    piquant_mikado_add_meta_box_field(
        array(
            'name'        	=> 'mkdf_testimonial_author',
            'type'        	=> 'text',
            'label'       	=> 'Author',
            'description' 	=> 'Enter author name',
            'parent'      	=> $testimonial_meta_box,
        )
    );


    piquant_mikado_add_meta_box_field(
        array(
            'name'        	=> 'mkdf_testimonial_text',
            'type'        	=> 'text',
            'label'       	=> 'Text',
            'description' 	=> 'Enter testimonial text',
            'parent'      	=> $testimonial_meta_box,
        )
    );


    piquant_mikado_add_meta_box_field(
        array(
            'name'        	=> 'mkdf_testimonial_rating',
            'type'          => 'select',
            'admin-label'   => true,
            'label'       	=> 'Rating',
            'description' 	=> 'Rate your product',
            'parent'      	=> $testimonial_meta_box,
            'options'     => array(
                '0'		=> '',
                '1'		=> '1 Star',
                '2'	    => '2 Stars',
                '3' 	=> '3 Stars',
                '4' 	=> '4 Stars',
                '5' 	=> '5 Stars',
            )
        )
    );