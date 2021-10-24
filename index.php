<?php
include $_SERVER['DOCUMENT_ROOT'] . '/include/constants.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/functions.php';

include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/include/' . getQueryString() . '.php';
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
