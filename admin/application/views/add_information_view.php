<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 17.12.2017
 * Time: 13:46
 */
if ((!preg_match("/^[А-ЯЁа-яё ]{5,15}$/u", $_POST['link_name']) || !preg_match("/^[a-z]{5,15}$|^[\/]$/", $_POST['link']) || empty($_POST['content'])) && $_SERVER['REQUEST_METHOD']=='POST') {
    $error="<p class='error'><b>Ошибка! Неверная ссылка, название ссылки или не заполнен контент!</b></p>";
}
?>
<div class="right_content">
    <p id="top_link"><a href="<?=Config::$root;?>/information/admin_information/">Вернуться назад</a></p>
    <div style="clear: both;"></div>
    <div>
        <form action="<?=Config::$root?>/information/add_admin_information/" method="POST">
            <input type="text" placeholder="Придумайте имя ссылки (имя ссылки должно содержать только русские буквы в верхнем или нижнем регистре от 5 до 15 символов) + пробелы (необязательно)" name="link_name" value="<?=$_POST['link_name'];?>" class="link"/><br/><br/>
            <input type="text" placeholder="Придумайте название ссылки (ссылка должна содержать только английские буквы в нижнем регистре от 5 до 15 символов) или /" name="link" value="<?=$_POST['link'];?>" class="link"/><br/><br/>
            <textarea name="content" id="editor"><?=$_POST['content'];?></textarea><br/><br/>
            <input type="submit" value="Сохранить"/>
            <?=$error;?>
        </form>
    </div>
</div>