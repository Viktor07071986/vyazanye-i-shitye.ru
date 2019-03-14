<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 04.11.2017
 * Time: 15:11
 */
require_once 'application/views/header_view.php';
?>
<div class="registration">
    <p>Введите регистрационные данные для доступа к администативной части.</p>
    <form action="<?=Config::$root;?>/registration/admin_registration/" method="POST">
        Введите ваш логин: <input type="text" name="login" size="20"/><br/><br/>
        Введите ваш пароль: <input type="password" name="password" size="20"><br/><br/>
        <input type="submit" value="Войти">
    </form>
</div>
</body>
</html>