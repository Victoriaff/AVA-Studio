<?php

function ava_color_tabs_callback($settings, $value) {

	$_params = !empty($settings['_params']) ? $settings['_params']:array();

	$title = !empty($_params['title']) ? $_params['title']:'';

	$html = '<div class="ava-tabs">';
		$html .= '<div class="ava-row">';
			$html .= '<div class="ava-title">'.$title.'</div>';

			// Tab items
			$html .= '<div class="ava-tabs-items ava-color-tabs">';
			foreach($_params['tabs']['items'] as $key=>$tab) {
				$class = !empty($tab['class']) ? esc_attr($tab['class']):'';
				$html .= '<div class="item '.$class.'" data-group="'.$_params['tabs']['group'].'" data-ref="'.$key.'">';
					$html .= '<div class="color"></div>';
					$html .= '<div class="title">'.$tab['title'].'</div>';
				$html .= '</div>';
			}
			$html .= '</div>';

		$html .= '</div>';


		//$html .= '<div class="ava-presets-wrapper">';
		//$html .= '</div>';

	$html .= '</div>';

	return $html;
}

return array(
	'type'      => 'ava_color_tabs',
	'callback'  => 'ava_color_tabs_callback',
);