<?php
if (isset($_POST['login']) && isset($_POST['password'])) {
    foreach ($auth as $value) {
        if ($value['login'] == $_POST['login'] && $value['password'] == $_POST['password']) {
            $_SESSION['logged'] = true;
            updateCookie($value['login']);
            header('Location: /');
            break;
        }
    }
}
?>
<form method="POST" action="/login" method="POST" class="form-login" autocomplete="off">
    <?php
    if (!isset($_COOKIE['login'])) {
    ?>
        Логин <input name="login" type="text" /><br />
    <?php
    } else { ?>
        <input type="hidden" name="login" value="<?= $_COOKIE['login'] ?>" />
    <?php } ?>
    Пароль <input name="password" type="password" /><br />
    <input name="submit" type="submit" value="Войти" />
</form>