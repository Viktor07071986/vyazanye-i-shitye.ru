<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 11.02.2018
 * Time: 14:07
 */
if ((!preg_match("/^[А-ЯЁа-яё ]{5,15}$/u", $_POST['link_name']) || !preg_match("/^[a-z]{5,15}$|^[\/]$/", $_POST['link']) || empty($_POST['content'])) && $_SERVER['REQUEST_METHOD']=='POST') {
    $error="<p class='error'><b>Ошибка! Неверная ссылка, название ссылки или не заполнен контент!</b></p>";
}
if ($data['active_status']==1) {
    $selected_status_one="selected=\"selected\"";
} elseif ($data['active_status']==0) {
    $selected_status_null="selected=\"selected\"";
}
?>
<div class="right_content">
    <p id="top_link"><a href="<?=Config::$root;?>/information/admin_information/">Вернуться назад</a></p>
    <div style="clear: both;"></div>
    <div>
        <form action="<?=Config::$root?>/information/edit_admin_information/?id=<?=$_GET['id'];?>" method="POST">
            <input type="text" size="110" name="link_name" value="<?=$data['link_name'];?>" class="link"/><br/><br/>
            <input type="text" size="110" name="link" value="<?=$data['link'];?>" class="link"/><br/><br/>
            <textarea name="content" id="editor"><?=$data['content'];?></textarea><br/><br/>
            <select name="active_status">
                <option value="1" <?=$selected_status_one;?>>Меню активно</option>
                <option value="0" <?=$selected_status_null;?>>Меню неактивно</option>
            </select><br/><br/>
            <input type="submit" value="Сохранить"/>
            <?=$error;?>
        </form>
    </div>
</div>