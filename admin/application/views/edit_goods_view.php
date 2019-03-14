<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 06.05.2018
 * Time: 12:58
 */
if ((!preg_match("/^[А-ЯЁа-яё ]{5,60}$/u", $_POST['good_name']) || empty($_POST['short_description']) || empty($_POST['full_description']) || !preg_match("/^[0-9]+$/", $_POST['good_price']) || !preg_match("/^[0-9]+$/", $_POST['count_goods'])) && $_SERVER['REQUEST_METHOD']=='POST') {
    $error="<p class='error'><b>Ошибка! Неверное имя товара или не заполнен контент краткого или полного описания или неверно указана цена или неверно указано количество!</b></p>";
}
if ($data['active_status_goods']==1) {
    $selected_status_one="selected=\"selected\"";
} elseif ($data['active_status_goods']==0) {
    $selected_status_null="selected=\"selected\"";
}
?>
<div class="right_content">
    <p id="top_link"><a href="<?=Config::$root;?>/goods/admin_goods/">Вернуться назад</a></p>
    <div style="clear: both;"></div>
    <div>
        <form action="<?=Config::$root?>/goods/edit_admin_goods/?id=<?=$_GET['id'];?>" method="POST">
            <input type="text" size="110" name="good_name" value="<?=$data['good_name'];?>" class="link"/><br/><br/>
            <textarea name="good_short_description" id="editor"><?=$data['good_short_description'];?></textarea><br/><br/>
            <textarea name="good_full_description" id="editors"><?=$data['good_full_description'];?></textarea><br/><br/>
            Цена:(руб.) <input type="text" size="25" name="good_price" value="<?=$data['good_price'];?>"/><br/><br/>
            Количество товара:(шт.) <input type="text" size="25" name="count_goods" value="<?=$data['count_goods'];?>"/><br/><br/>
            <select name="active_status_goods">
                <option value="1" <?=$selected_status_one;?>>Товар активен</option>
                <option value="0" <?=$selected_status_null;?>>Товар неактивен</option>
            </select><br/><br/>
            <p><b>Выберите меню к которому относиться данный товар:</b></p>
            <select name="select_menu_goods">
                <?php
                    foreach ($data['menu_goods'] as $menu_goods) {
                        if ($data['menu_id']==$menu_goods['id']) {
                            $selected="selected=\"selected\"";
                        } else {
                            $selected="";
                        }
                ?>
                    <option value="<?=$menu_goods['id'];?>" <?=$selected;?>><?=$menu_goods['goods_name_menu']?></option>
                <?php } ?>
            </select><br/><br/>
            <input type="submit" value="Сохранить"/>
            <?=$error;?>
        </form>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('editors', {});
</script>