<?php
$auth = [
    ['login' => '1@bk.ru', 'password' => '1',],
    ['login' => '2@bk.ru', 'password' => '2',],
    ['login' => '3@bk.ru', 'password' => '3',],
    ['login' => '4@bk.ru', 'password' => '4',],
    ['login' => '5@bk.ru', 'password' => '5',],
];

if (isset($_POST['login']) && isset($_POST['password'])) {
    foreach ($auth as $value) {
        if ($value['login'] == $_POST['login'] && $value['password'] == $_POST['password']) {
            $_SESSION['logged'] = true;
            setcookie('login', $value['login'], time() + 60 * 60 * 24 * 30, '/');
            header('Location: /');
        }
    }
}
?>
<form method="POST" action="/login" method="POST" class="form-login" autocomplete="off">
    Логин <input name="login" type="text" value="<?php if (isset($_COOKIE['login'])) {
                                                    echo $_COOKIE['login'];
                                                } ?>"><br>
    Пароль <input name="password" type="password"><br>
    <input name="submit" type="submit" value="Войти">
</form>