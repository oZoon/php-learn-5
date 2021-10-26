<?php
function scanDirectory()
{
    $scannedDir = array_diff(scandir(IMG_DIR), array('..', '.'));
    natcasesort($scannedDir);
    return array_merge($scannedDir);
}

function showSize($fileName)
{
    $result = '';
    $size = filesize(IMG_DIR . $fileName);
    if ($size < 10000) {
        $result = number_format($size, 0, '', ' ') . ' b';
    }
    if ($size < 1000000) {
        $result = number_format($size / 1000, 3, '.', '') . ' Kb';
    }
    if ($size < 2000000) {
        $result = number_format($size / 1000000, 3, '.', '') . ' Mb';
    }
    return $result;
}

function getRoute()
{
    switch (substr(urldecode($_SERVER['REQUEST_URI']), 0, 8)) {
        case '/uploads':
            $route = 'uploads';
            break;
        case '/manages':
            $route = 'manages';
            break;
        case '/login':
            $route = 'login';
            break;
        case '/logout':
            $route = 'logout';
            break;
        default:
            $route = 'manages';
    }
    return $route;
}

$auth = [
    ['login' => '1@bk.ru', 'password' => '1',],
    ['login' => '2@bk.ru', 'password' => '2',],
    ['login' => '3@bk.ru', 'password' => '3',],
    ['login' => '4@bk.ru', 'password' => '4',],
    ['login' => '5@bk.ru', 'password' => '5',],
];

function updateCookie($login = null)
{
    global $auth;
    $loginArray = [];
    $result = '';

    foreach ($auth as $key => $value) {
        $loginArray[$key] = $value['login'];
    }

    if ($login != null) {
        $result = $login;
    }

    if (isset($_COOKIE['login']) && in_array($_COOKIE['login'], $loginArray)) {
        $result = $_COOKIE['login'];
    }

    if ($result != '') {
        setcookie('login', $result, time() + 60 * 60 * 24 * 30, '/');
    }
}
