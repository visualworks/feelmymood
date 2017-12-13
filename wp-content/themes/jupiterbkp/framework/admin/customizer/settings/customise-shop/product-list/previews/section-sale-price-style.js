/**
 * File customize-preview.js.
 *
 * Instantly live-update customizer settings in the preview for improved user experience.
 */

(function( $ ) {

	var sale_price_style_container = '.woocommerce-page .mk-shop-item-detail .price ins';
	var sale_price_style_container_holder = '.woocommerce-page .mk-shop-item-detail .price ins .amount';
	var sale_price_style_separator = '.woocommerce-page .mk-shop-item-detail .price ins .mk-price-variation-seprator';

	wp.customize( 'cs_pl_s_sale_price_style_typography', function( value ) {
		$( sale_price_style_container + ', ' + sale_price_style_container_holder  ).css(
			mkPreviewTypography( value(), true )
		);

		value.bind(function (to) {
			$( sale_price_style_container + ', ' + sale_price_style_container_holder  ).css(
				mkPreviewTypography( to )
			);
		});
	});

	wp.customize( 'cs_pl_s_sale_price_style_box_model', function( value ) {
		$( sale_price_style_container_holder + ', ' + sale_price_style_separator ).css(
			mkPreviewBoxModel( value() )
		);

		value.bind(function (to) {
			$( sale_price_style_container_holder + ', ' + sale_price_style_separator ).css(
				mkPreviewBoxModel( to )
			);
			MK.utils.eventManager.publish('item-expanded');
		});
	});

} )( jQuery );

