<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 15.04.2018
 * Time: 12:08
 */
if (!preg_match("/^[А-ЯЁа-яё ]{5,60}$/u", $_POST['goods_name_pod_menu']) && $_SERVER['REQUEST_METHOD']=='POST') {
    $error="<p class='error'><b>Ошибка! Неверное название ссылки!</b></p>";
}
?>
<div class="right_content">
    <p id="top_link"><a href="<?=Config::$root;?>/menu_goods/admin_menu_goods/">Вернуться назад</a></p>
    <div style="clear: both;"></div>
    <div>
        <form action="<?=Config::$root?>/menu_goods/add_admin_menu_goods/?id=<?=$_GET['id'];?>" method="POST">
            <input type="text" placeholder="Придумайте имя ссылки (имя ссылки должно содержать только русские буквы в верхнем или нижнем регистре от 5 до 60 символов) + пробелы (необязательно)" name="goods_name_pod_menu" value="<?=$_POST['goods_name_pod_menu'];?>" class="link"/><br/><br/>
            <input type="submit" value="Сохранить"/>
            <?=$error;?>
        </form>
    </div>
</div>
