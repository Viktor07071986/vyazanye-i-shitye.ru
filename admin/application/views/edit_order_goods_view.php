<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 15.07.2018
 * Time: 20:31
 */
if ($data['order_status_client_goods']==1) {
    $selected_status_one="selected=\"selected\"";
} elseif ($data['order_status_client_goods']==0) {
    $selected_status_null="selected=\"selected\"";
}
?>
<div class="right_content">
    <p id="top_link"><a href="<?=Config::$root;?>/order_goods/admin_order_goods/">Вернуться назад</a></p>
    <h3>Статус заказа</h3>
    <div>
        <form action="<?=Config::$root?>/order_goods/edit_admin_order_goods/?id=<?=$_GET['id'];?>" method="POST">
            <select name="select_order_goods">
                <option value="1" <?=$selected_status_one;?>>Заказ не выполнен</option>
                <option value="0" <?=$selected_status_null;?>>Заказ выполнен</option>
            </select>
            <input type="submit" value="Сохранить"/>
        </form>
    </div>
</div>
