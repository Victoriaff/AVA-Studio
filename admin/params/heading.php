<?php

function ava_heading_callback($settings, $value) {

	$_params = !empty($settings['_params']) ? $settings['_params']:array();

	$title = !empty($_params['title']) ? $_params['title']:'';

	/*
	return '<div class="color-group">'
	       . '<input name="' . $settings['param_name'] . '" class="wpb_vc_param_value wpb-textinput ' . $settings['param_name'] . ' ' . $settings['type'] . '_field vc_color-control" type="text" value="' . $value . '"/>'
	       . '</div>';
	*/

	$html = '<div class="ava-heading">';
		$html .= '<div class="ava-row">';
			$html .= '<div class="ava-heading-title">'.$title.'</div>';
			if (!empty($_params['presets'])) {
				$html .= '<div class="ava-heading-button"><button class="ava-presets-button">'.esc_html(__('Presets', 'ava-studio' )).'</button></div>';
			}
		$html .= '</div>';


		//$html .= '<div class="ava-presets-wrapper">';
		//$html .= '</div>';

	$html .= '</div>';

	return $html;
}

return array(
	'type'      => 'ava_heading',
	'callback'  => 'ava_heading_callback',
);