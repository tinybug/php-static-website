<?php
function init() {
	global $_SERVER;

	if (!$_SERVER['PATH_INFO']) {
		$_SERVER['PAGE'] = 'home';
	} else {
		$paths = explode('/', $_SERVER['PATH_INFO']);
		$_SERVER['PAGE'] = $paths[1];

		$locales = array('en', 'de', 'fr', 'it');
		if (in_array($paths[1], $locales, TRUE)) {
			$no_locales_pages = array('terms', 'copyright', 'privacy');
			if (in_array($paths[2], $no_locales_pages, TRUE)) {
				redirect('/' . $paths[2]);
			}

			$_SERVER['LOCALE'] = $paths[1];
			if ($paths[2]) {
				$paths[1] = $paths[2];
			} else {
				$paths[1] = 'home';
			}

			$_SERVER['PAGE'] = $paths[1];
		}
	}
}

function pre_dump($v) {
	echo '<pre>';
	var_dump($v);
	echo '</pre>';
}

function tr($text) {
	global $_SERVER;

	if (!file_exists('locales/' . $_SERVER['LOCALE'] . '.json')) {
		$_SERVER['LOCALE'] = 'en';
	}

	$json = file_get_contents('locales/' . $_SERVER['LOCALE'] . '.json');

	$json_data = json_decode($json, true);

	if ($json_data[$text]) {
		echo $json_data[$text];
	} else {
		echo $text;
	}
}

function redirect($url, $permanent = true) {
	header('Location: ' . $url, true, $permanent ? 301 : 302);

	exit();
}
