<?php
define('IMG_DIR', $_SERVER['DOCUMENT_ROOT'] . '/upload/');
define('LIMIT_FILE_SIZE', 2000000);
define('LIMIT_FILE_COUNT', 5);
define('UPLOAD_ERROR', array(
    0 => 'Успех - файл загружен на сервер',
    1 => 'Ошибка сервера - размер файла превышает максимально разрешенный размер',
    2 => 'Ошибка клиента - размер файла превышает ' . LIMIT_FILE_SIZE . ' байт',
    3 => 'Ошибка - файл загружен частично',
    4 => 'Ошибка - файл не загружен',
    6 => 'Ошибка сервера - отсутствует временный каталог хранения',
    7 => 'Ошибка сервера - запрет записи файла на диск',
    8 => 'Ошибка сервера - одно из серверных расширений остановило загрузку',
    9 => 'Ошибка - не выбрано ни одного файла',
    10 => 'Ошибка - выбрано больше 5 файлов',
    11 => 'Ошибка - Возможная атака с помощью файловой загрузки',
    12 => ', в имени найдены запрещенные символы, файл переминован в ',
    13 => 'Ошибка - файл несоответствующего типа',
));
define('MENU', array(
    'leftSide' => [
        ['title' => 'Управление картинками', 'path' => 'manages'],
        ['title' => 'Загрузка картинок', 'path' => 'uploads'],
    ],
    'rightSide' => [
        ['title' => 'Авторизация', 'path' => 'login', 'type' => 'menu'],
        ['title' => 'Выход', 'path' => 'logout', 'type' => 'logout'],
    ],
));
define('ALLOW_EXTENSIONS', array('jpeg', 'png', 'jpg'));
