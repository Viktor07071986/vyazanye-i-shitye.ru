<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 05.05.2018
 * Time: 17:10
 */
if ((!preg_match("/^[А-ЯЁа-яё ]{5,60}$/u", $_POST['good_name']) || empty($_POST['short_description']) || empty($_POST['full_description']) || !preg_match("/^[0-9]+$/", $_POST['good_price']) || !preg_match("/^[0-9]+$/", $_POST['count_goods'])) && $_SERVER['REQUEST_METHOD']=='POST') {
    $error="<p class='error'><b>Ошибка! Неверное имя товара или не заполнен контент краткого или полного описания или неверно указана цена или неверно указано количество!</b></p>";
}
?>
<div class="right_content">
    <p id="top_link"><a href="<?=Config::$root;?>/goods/admin_goods/">Вернуться назад</a></p>
    <div style="clear: both;"></div>
    <div>
        <form action="<?=Config::$root?>/goods/add_admin_goods/" method="POST">
            <input type="text" placeholder="Придумайте имя товара (имя товара должно содержать только русские буквы в верхнем или нижнем регистре от 5 до 60 символов) + пробелы (необязательно)" name="good_name" value="<?=$_POST['good_name'];?>" class="link"/><br/><br/>
            <textarea name="short_description" id="editor"><?=$_POST['short_description'];?></textarea><br/><br/>
            <textarea name="full_description" id="editors"><?=$_POST['full_description'];?></textarea><br/><br/>
            Цена:(руб.) <input type="text" size="25" name="good_price" value="<?=$_POST['good_price'];?>"/><br/><br/>
            Количество товара:(шт.) <input type="text" size="25" name="count_goods" value="<?=$_POST['count_goods'];?>"/><br/><br/>
            <select name="select_menu_goods">
                <?php
                foreach ($data as $menu_goods) {
                    if ($_POST['select_menu_goods']==$menu_goods['id']) {
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