<?php
include $_SERVER['DOCUMENT_ROOT'] . '/include/constants.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/helpers.php';

$route = substr(urldecode($_SERVER['REQUEST_URI']), 0, 8) == '/uploads' ? 'uploads' : 'manages';

include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/routes/' . $route . '.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
