<?php
include_once('header.php');


if (file_exists('pages/' . $_SERVER['PAGE'] . '-hero.php')) {
	include_once('pages/' . $_SERVER['PAGE'] . '-hero.php');
} else {
	include_once('pages/404-hero.php');
}

include_once('footer.php');
