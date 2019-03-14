<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 05.05.2018
 * Time: 13:30
 */
?>
<div class="right_content">
    <p id="top_link"><a href="<?=Config::$root;?>/goods/add_admin_goods/">Добавить товар</a></p>
    <?php if (!empty($data)) { ?>
        <div>
            <table>
                <tr>
                    <th style="width: 8%;">Название</th>
                    <th>Краткое описание</th>
                    <th style="width: 45%;">Полное описание</th>
                    <th style="width: 8%;">Активность</th>
                    <th>Цена (руб.)</th>
                    <th>Количество (шт.)</th>
                    <th style="width: 10%;">К какому меню относится</th>
                    <th style="width: 10%;">Действия</th>
                </tr>
                <?php foreach ($data as $good) { ?>
                    <tr>
                        <td><?=$good['good_name']?></td>
                        <td style="vertical-align: top; text-align: left; width: 35%;"><?=$good['good_short_description']?></td>
                        <td><?=$good['good_full_description']?></td>
                        <?php
                        if ($good['active_status_goods']==1) {
                            $active_status="Товар активен";
                        } elseif ($good['active_status_goods']==0) {
                            $active_status="Товар неактивен";
                        }
                        ?>
                        <td><?=$active_status?></td>
                        <td><?=$good['good_price']?></td>
                        <td><?=$good['count_goods']?></td>
                        <td><?=$good['goods_name_menu'];?></td>
                        <td>
                            <a href="<?=Config::$root;?>/goods/edit_admin_goods/?id=<?=$good['good_id']?>" style="margin-right: 5px;">Изменить</a>
                            <a href="<?=Config::$root;?>/goods/del_admin_goods/?id=<?=$good['good_id']?>" style="margin-right: 0px;" onclick ="return confirm('Вы действительно хотите окончательно удалить данный товар?');">Удалить</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <p id="top_link"><a href="<?=Config::$root;?>/goods/add_admin_goods/">Добавить товар</a></p>
    <?php } ?>
</div>
