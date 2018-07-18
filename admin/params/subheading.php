<?php

function ava_subheading_callback($settings, $value) {

	$_params = !empty($settings['_params']) ? $settings['_params']:array();

	$title = !empty($_params['title']) ? $_params['title']:'';

	$html = '<div class="ava-subheading">';
		$html .= '<div class="ava-row">';
			$html .= '<div class="ava-subheading-title">'.$title.'</div>';
		$html .= '</div>';
	$html .= '</div>';

	return $html;
}

return array(
	'type'      => 'ava_subheading',
	'callback'  => 'ava_subheading_callback'
);