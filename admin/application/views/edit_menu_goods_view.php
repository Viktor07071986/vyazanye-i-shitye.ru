<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 14.04.2018
 * Time: 21:36
 */
if (!preg_match("/^[А-ЯЁа-яё ]{5,60}$/u", $_POST['goods_name_menu']) && $_SERVER['REQUEST_METHOD']=='POST') {
    $error="<p class='error'><b>Ошибка! Неверное название ссылки!</b></p>";
}
if ($data['active_status_menu']==1) {
    $selected_status_one="selected=\"selected\"";
} elseif ($data['active_status_menu']==0) {
    $selected_status_null="selected=\"selected\"";
}
?>
<div class="right_content">
    <p id="top_link"><a href="<?=Config::$root;?>/menu_goods/admin_menu_goods/">Вернуться назад</a></p>
    <div style="clear: both;"></div>
    <div>
        <form action="<?=Config::$root?>/menu_goods/edit_admin_menu_goods/?id=<?=$_GET['id'];?>" method="POST">
            <input type="text" size="110" name="goods_name_menu" value="<?=$data['goods_name_menu'];?>" class="link"/><br/><br/>
            <select name="active_status_menu">
                <option value="1" <?=$selected_status_one;?>>Меню активно</option>
                <option value="0" <?=$selected_status_null;?>>Меню неактивно</option>
            </select><br/><br/>
            <input type="submit" value="Сохранить"/>
            <?=$error;?>
        </form>
    </div>
</div>