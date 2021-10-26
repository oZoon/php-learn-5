<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Картинки</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <?php
    $result = '<div class="div-menu">';

    $result .= '<span>';
    for ($i = 0; $i < count(MENU['leftSide']); $i++) {
        $class = 'menu-item';
        if (MENU['leftSide'][$i]['path'] == $route) {
            $class .= ' menu-active';
        }
        if (!$isLogged) {
            $class .= ' disabled';
        }
        $result .= '<a class="' . $class . '" href="/' . MENU['leftSide'][$i]['path'] . '">' . MENU['leftSide'][$i]['title'] . '</a>';
    }
    $result .= '</span>';

    $result .= '<span>';
    for ($i = 0; $i < count(MENU['rightSide']); $i++) {

        if ((!$isLogged && $i == 0) || ($isLogged && $i == 1)) {
            $class = 'menu-item';
            if (MENU['rightSide'][$i]['path'] == $route) {
                $class .= ' menu-active';
            }
            $result .= '<a class="' . $class . '" href="/' . MENU['rightSide'][$i]['path'] . '">' . MENU['rightSide'][$i]['title'] . '</a>';
        }
    }
    $result .= '</span>';

    echo $result . '</div>';
