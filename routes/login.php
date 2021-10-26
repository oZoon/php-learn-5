<?php
$message = '';
if (isset($_POST['login']) && isset($_POST['password'])) {
    foreach ($auth as $value) {
        $login = htmlspecialchars_decode($_POST['login']);
        if ($value['login'] == $login && $value['password'] == $_POST['password']) {
            $_SESSION['logged'] = true;
            updateCookie($value['login'], $auth);
            header('Location: /');
            break;
        }
    }
    $message = '<span class="login-error">Ошибка логин/пароль</span>';
}
?>
<form method="POST" action="/login" method="POST" class="form-login" autocomplete="off">
    <?php
    if (!isset($_COOKIE['login'])) {
    ?>
        Логин <input name="login" type="text" /><br />
    <?php
    } else { ?>
        <input type="hidden" name="login" value="<?= htmlspecialchars($_COOKIE['login']) ?>" />
    <?php } ?>
    Пароль <input name="password" type="password" /><br />
    <input name="submit" type="submit" value="Войти" />
</form>
<?= $message; ?>