<?php

//top header bar
add_action('piquant_mikado_before_page_header', 'piquant_mikado_get_header_top');

//mobile header
add_action('piquant_mikado_after_page_header', 'piquant_mikado_get_mobile_header');