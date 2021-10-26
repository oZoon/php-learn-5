<?php
session_start();
$isLogged = isset($_SESSION['logged']) && $_SESSION['logged'] == true;

include $_SERVER['DOCUMENT_ROOT'] . '/include/constants.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/helpers.php';

$route = getRoute();

include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/routes/' . $route . '.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
