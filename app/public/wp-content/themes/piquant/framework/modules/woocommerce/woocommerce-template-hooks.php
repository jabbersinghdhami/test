<?php

if (!function_exists('piquant_mikado_woocommerce_products_per_page')) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function piquant_mikado_woocommerce_products_per_page() {

		$products_per_page = 12;

		if (piquant_mikado_options()->getOptionValue('mkdf_woo_products_per_page')) {
			$products_per_page = piquant_mikado_options()->getOptionValue('mkdf_woo_products_per_page');
		}

		return $products_per_page;

	}

}

if (!function_exists('piquant_mikado_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 * @param $args array array of args for the query
	 * @return mixed array of changed args
	 */
	function piquant_mikado_woocommerce_related_products_args($args) {

		if (piquant_mikado_options()->getOptionValue('mkdf_woo_product_list_columns')) {

			$related = piquant_mikado_options()->getOptionValue('mkdf_woo_product_list_columns');
			switch ($related) {
				case 'mkdf-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'mkdf-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;

	}

}

if (!function_exists('piquant_mikado_woocommerce_template_loop_product_title')) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function piquant_mikado_woocommerce_template_loop_product_title() {

		$tag = piquant_mikado_options()->getOptionValue('mkdf_products_list_title_tag');
		the_title('<' . $tag . ' class="mkdf-product-list-product-title">', '</' . $tag . '>');
	}

}

if (!function_exists('piquant_mikado_woocommerce_template_single_title')) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function piquant_mikado_woocommerce_template_single_title() {

		$tag = piquant_mikado_options()->getOptionValue('mkdf_single_product_title_tag');
		the_title('<' . $tag . '  itemprop="name" class="mkdf-single-product-title">', '</' . $tag . '>');

	}

}

if (!function_exists('piquant_mikado_woocommerce_sale_flash')) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function piquant_mikado_woocommerce_sale_flash() {

		return '<span class="mkdf-onsale"><span class="mkdf-onsale-inner">' . esc_html__('Sale!', 'piquant') . '</span></span>';

	}

}

if (!function_exists('piquant_mikado_custom_override_checkout_fields')) {
	/**
	 * Overrides placeholder values for checkout fields
	 * @param array all checkout fields
	 * @return array checkout fields with overriden values
	 */
	function piquant_mikado_custom_override_checkout_fields($fields) {
		//billing fields
		$args_billing = array(
			'first_name'	=> esc_html__('First name', 'piquant'),
			'last_name'		=> esc_html__('Last name', 'piquant'),
			'company'		=> esc_html__('Company name', 'piquant'),
			'address_1'		=> esc_html__('Address', 'piquant'),
			'email'			=> esc_html__('Email', 'piquant'),
			'phone'			=> esc_html__('Phone', 'piquant'),
			'postcode'		=> esc_html__('Postcode / ZIP', 'piquant'),
			'state'			=> esc_html__('State / County', 'piquant')
		);

		//shipping fields
		$args_shipping = array(
			'first_name' => esc_html__('First name', 'piquant'),
			'last_name'  => esc_html__('Last name', 'piquant'),
			'company'    => esc_html__('Company name', 'piquant'),
			'address_1'  => esc_html__('Address', 'piquant'),
			'postcode'   => esc_html__('Postcode / ZIP', 'piquant')
		);

		//override billing placeholder values
		foreach ($args_billing as $key => $value) {
			$fields["billing"]["billing_{$key}"]["placeholder"] = $value;
		}

		//override shipping placeholder values
		foreach ($args_shipping as $key => $value) {
			$fields["shipping"]["shipping_{$key}"]["placeholder"] = $value;
		}

		return $fields;
	}

}

if (!function_exists('piquant_mikado_woocommerce_loop_add_to_cart_link')) {
	/**
	 * Function that overrides default woocommerce add to cart button on product list
	 * Uses HTML from mkdf_button
	 *
	 * @return mixed|string
	 */
	function piquant_mikado_woocommerce_loop_add_to_cart_link() {

		global $product;

		$button_url = $product->add_to_cart_url();
		$button_classes = sprintf('%s product_type_%s',
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			esc_attr( $product->product_type )
		);
		$button_text = $product->add_to_cart_text();
		$button_attrs = array(
			'rel' => 'nofollow',
			'data-product_id' => esc_attr( $product->id ),
			'data-product_sku' => esc_attr( $product->get_sku() ),
			'data-quantity' => esc_attr( isset( $quantity ) ? $quantity : 1 )
		);


		$add_to_cart_button = piquant_mikado_get_button_html(
			array(
				'link'			=> $button_url,
				'custom_class'	=> $button_classes,
				'text'			=> $button_text,
				'custom_attrs'	=> $button_attrs
			)
		);

		return $add_to_cart_button;

	}

}

if (!function_exists('piquant_mikado_get_woocommerce_add_to_cart_button')) {
	/**
	 * Function that overrides default woocommerce add to cart button on simple and grouped product single template
	 * Uses HTML from mkdf_button
	 */
	function piquant_mikado_get_woocommerce_add_to_cart_button() {

		global $product;

		$add_to_cart_button = piquant_mikado_get_button_html(
			array(
				'custom_class'	           => 'single_add_to_cart_button alt',
				'text'			           => $product->single_add_to_cart_text(),
				'html_type'		           => 'button',
				'icon_pack'                => 'simple_line_icons',
				'simple_line_icons'        => 'icon-basket',
				'text_transform'           => 'none',
				'type'                     => 'solid'
			)
		);

		print $add_to_cart_button;

	}

}

if (!function_exists('piquant_mikado_get_woocommerce_add_to_cart_button_external')) {
	/**
	 * Function that overrides default woocommerce add to cart button on external product single template
	 * Uses HTML from mkdf_button
	 */
	function piquant_mikado_get_woocommerce_add_to_cart_button_external() {

		global $product;

		$add_to_cart_button = piquant_mikado_get_button_html(
			array(
				'link'			           => $product->add_to_cart_url(),
				'custom_class'	           => 'single_add_to_cart_button alt',
				'text'			           => $product->single_add_to_cart_text(),
				'custom_attrs'	           => array(
					'rel' 		           => 'nofollow'
				),
				'icon_pack'                => 'simple_line_icons',
				'simple_line_icons'        => 'icon-basket',
				'text_transform'           => 'none',
				'type'                     => 'solid'
			)
		);

		print $add_to_cart_button;

	}

}

if ( ! function_exists('piquant_mikado_woocommerce_single_variation_add_to_cart_button') ) {
	/**
	 * Function that overrides default woocommerce add to cart button on variable product single template
	 * Uses HTML from mkdf_button
	 */
	function piquant_mikado_woocommerce_single_variation_add_to_cart_button() {
		global $product;

		$html = '<div class="variations_button">';
		woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) );

		$button = piquant_mikado_get_button_html(array(
			'html_type'		         => 'button',
			'custom_class'	         => 'single_add_to_cart_button alt',
			'text'			         => $product->single_add_to_cart_text(),
			'icon_pack'              => 'simple_line_icons',
			'simple_line_icons'      => 'icon-basket',
			'text_transform'         => 'none',
			'type'                   => 'solid'
		));

		$html .= $button;

		$html .= '<input type="hidden" name="add-to-cart" value="' . absint( $product->id ) . '" />';
		$html .= '<input type="hidden" name="product_id" value="' . absint( $product->id ) . '" />';
		$html .= '<input type="hidden" name="variation_id" class="variation_id" value="" />';
		$html .= '</div>';

		print $html;

	}

}

if (!function_exists('piquant_mikado_get_woocommerce_apply_coupon_button')) {
	/**
	 * Function that overrides default woocommerce apply coupon button
	 * Uses HTML from mkdf_button
	 */
	function piquant_mikado_get_woocommerce_apply_coupon_button() {

		$coupon_button = piquant_mikado_get_button_html(array(
			'html_type'		=> 'input',
			'input_name'	=> 'apply_coupon',
			'text'			=> esc_html__( 'Apply Coupon', 'piquant')
		));

		print $coupon_button;

	}

}

if (!function_exists('piquant_mikado_get_woocommerce_update_cart_button')) {
	/**
	 * Function that overrides default woocommerce update cart button
	 * Uses HTML from mkdf_button
	 */
	function piquant_mikado_get_woocommerce_update_cart_button() {

		$update_cart_button = piquant_mikado_get_button_html(array(
			'html_type'		=> 'input',
			'input_name'	=> 'update_cart',
			'text'			=> esc_html__( 'Update Cart', 'piquant')
		));

		print $update_cart_button;

	}

}

if (!function_exists('piquant_mikado_woocommerce_button_proceed_to_checkout')) {
	/**
	 * Function that overrides default woocommerce proceed to checkout button
	 * Uses HTML from mkdf_button
	 */
	function piquant_mikado_woocommerce_button_proceed_to_checkout() {

		$proceed_to_checkout_button = piquant_mikado_get_button_html(array(
			'link'			=> WC()->cart->get_checkout_url(),
			'custom_class'	=> 'checkout-button alt wc-forward',
			'text'			=> esc_html__( 'Proceed to Checkout', 'piquant'),
			'type'          => 'solid'
		));

		print $proceed_to_checkout_button;

	}

}

if (!function_exists('piquant_mikado_get_woocommerce_update_totals_button')) {
	/**
	 * Function that overrides default woocommerce update totals button
	 * Uses HTML from mkdf_button
	 */
	function piquant_mikado_get_woocommerce_update_totals_button() {

		$update_totals_button = piquant_mikado_get_button_html(array(
			'html_type'		=> 'button',
			'text'			=> esc_html__( 'Update Totals', 'piquant'),
			'custom_attrs'	=> array(
				'value'		=> 1,
				'name'		=> 'calc_shipping'
			)
		));

		print $update_totals_button;

	}

}

if (!function_exists('piquant_mikado_woocommerce_pay_order_button_html')) {
	/**
	 * Function that overrides default woocommerce pay order button on checkout page
	 * Uses HTML from mkdf_button
	 */
	function piquant_mikado_woocommerce_pay_order_button_html() {

		$pay_order_button_text = esc_html__('Pay for order', 'piquant');

		$place_order_button = piquant_mikado_get_button_html(array(
			'html_type'		=> 'input',
			'custom_class'	=> 'alt',
			'custom_attrs'	=> array(
				'id'			=> 'place_order',
				'data-value'	=> $pay_order_button_text
			),
			'text'			=> $pay_order_button_text,
		));

		return $place_order_button;

	}

}

if (!function_exists('piquant_mikado_woocommerce_order_button_html')) {
	/**
	 * Function that overrides default woocommerce place order button on checkout page
	 * Uses HTML from mkdf_button
	 */
	function piquant_mikado_woocommerce_order_button_html() {

		$pay_order_button_text = esc_html__('Place Order', 'piquant');

		$place_order_button = piquant_mikado_get_button_html(array(
			'html_type'		=> 'input',
			'custom_class'	=> 'alt',
			'custom_attrs'	=> array(
				'id'			=> 'place_order',
				'data-value'	=> $pay_order_button_text,
				'name'			=> 'woocommerce_checkout_place_order'
			),
			'text'			=> $pay_order_button_text,
		));

		return $place_order_button;

	}

}

if(!function_exists('piquant_mikado_woo_before_product_list_item')) {
	function piquant_mikado_woo_before_product_list_item() {
		echo '<div class="mkdf-woo-product-list-item-holder">';
	}
}

if(!function_exists('piquant_mikado_woo_after_product_list_item')) {
	function piquant_mikado_woo_after_product_list_item() {
		echo '</div>';
	}
}

if(!function_exists('piquant_mikado_alter_woo_pagination')) {
	function piquant_mikado_alter_woo_pagination($args) {
		$args['prev_text'] = '<span aria-hidden="true" class="arrow_carrot-left"></span>';
		$args['next_text'] = '<span aria-hidden="true" class="arrow_carrot-right"></span>';
		return $args;
	}
}

if(!function_exists('piquant_mikado_placeholders_reviews')) {
	function piquant_mikado_placeholders_reviews($args) {
		$commenter = wp_get_current_commenter();

		$args['fields']['author'] = '<p class="comment-form-author">'.
			            '<input type="text" id="author" name="author" placeholder="'.esc_attr__('Name *', 'piquant').'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>';

		$args['fields']['email']  = '<p class="comment-form-email">'.
			            '<input type="text" id="email" name="email" placeholder="'.esc_attr__('Email *', 'piquant').'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>';
		return $args;
	}
}
