<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 06.11.2017
 * Time: 13:31
 */
require_once 'application/views/header_view.php';
?>
<div class="top_content">
    <b>Добро пожаловать администратор</b><br/>
    <b>Вход выполнен <?=date("d/m/Y");?> года.</b><br/>
    <b><a href="<?=Config::$root;?>/registration/admin_unlogin/">Выйти</a></b>
</div>
<div class="content">
    <div class="left_content">
        <p><b><a href="<?=Config::$root;?>">Модули сайта</a></b></p>
        <p><b><a href="<?=Config::$root;?>/information/admin_information/">Информация</a></b></p>
        <p><b><a href="<?=Config::$root;?>/menu_goods/admin_menu_goods/">Меню</a></b></p>
        <p><b><a href="<?=Config::$root;?>/goods/admin_goods/">Товары</a></b></p>
        <p><b><a href="<?=Config::$root;?>/order_goods/admin_order_goods/">Заказы</a></b></p>
    </div>
    <?php require_once 'application/views/'.$content_view;?>
</div>
</body>
</html>