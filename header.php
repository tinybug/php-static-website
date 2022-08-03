<?php
include_once('functions.php');
init();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php
	if (file_exists('pages/' . $_SERVER['PAGE'] . '-head.php')) {
		include_once('pages/' . $_SERVER['PAGE'] . '-head.php');
	} else {
		include_once('pages/404-head.php');
	}
	?>

	<?php
	if (!$_SERVER['PATH_INFO']) {
		$canonical = 'https://' . $_SERVER['HTTP_HOST'];
	} else {
		if (substr($_SERVER['PATH_INFO'], -1) == '/') {
			$_SERVER['PATH_INFO'] = rtrim($_SERVER['PATH_INFO'], '/');
		}

		$canonical = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['PATH_INFO'];
	}
	?>

	<link rel="canonical" href="<?php echo $canonical; ?>" />

	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<header class="text-3xl font-bold underline">this is header</header>
	<div>
		<a href="/" class="underline">home</a>
	</div>
	<div>
		<a href="/de" class="underline">de</a>
	</div>