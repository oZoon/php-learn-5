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
    for ($i = 0; $i < count(MENU); $i++) {
        $result .= '<a class="menu';
        if (MENU[$i]['path'] == getQueryString()) {
            $result .= ' menu-active';
        }
        $result .= '"  href="/' . MENU[$i]['path'] . '">' . MENU[$i]['title'] . '</a> ';
    }
    echo $result . '</div>';
