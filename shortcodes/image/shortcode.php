<?php
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_AVA_Studio_Image extends WPBakeryShortCode {

		public function __construct( $settings ) {
			//add_shortcode('ava_image', array($this, 'content'));
			parent::__construct( $settings );
		}

		public function content( $atts, $content = null ) {

			//dump($atts);
			extract( shortcode_atts( array(
				'foo'   => 'something',
				'color' => '#000'
			), $atts ) );
			//dump($atts);
			//dump(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG);
			//dump($this->settings['base']);
			//dd(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG);
			//dump('AVA_Image VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG = '.VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG);

			//dump('AVA_Image setting :');
			//dump($this->settings);


			$width_class = '';
			//global $wp_filter;
			//dd($wp_filter);
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width_class, $this->settings['base'], $atts );

			//$content = wpb_js_remove_wpautop( $content, true ); // fix unclosed/unwanted paragraph tags in $content

			//dd(77777);
			return "<div class='" . $css_class . "' style='font-size:24px; color:{$color};' data-foo='${foo}'>77777{$content}</div>";

			/*
			extract( shortcode_atts( array(
				'width' => '1/2',
				'el_position' => '',
				'foo' => '',
				'my_dropdown' => '',
			), $atts ) );

			$width_class = '';
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width_class, $this->settings['base'], $atts );
			$output = '<div class="' . $css_class . '">';
			$output .= '<h3>' . $foo . '</h3>';
			$output .= wpb_js_remove_wpautop( $content, true );
			$output .= '<p> Dropdown: ' . $my_dropdown . '</p>';
			$output .= '</div>';

			return $output;
			*/

		}
	}
}
//new AVA_Studio_Image();

/*
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_AVA_Studio_Image extends WPBakeryShortCode {
	}
}
*/

