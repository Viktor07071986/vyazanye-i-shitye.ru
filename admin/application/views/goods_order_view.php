<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 14.07.2018
 * Time: 19:35
 */
?>
<div class="right_content">
    <div>
        <table>
            <tr>
                <th style="width: 0%;">Номер заказа</th>
                <th style="width: 0%;">ФИО заказчика</th>
                <th style="width: 0%;">Телефон заказчика</th>
                <th style="width: 0%;">Email заказчика</th>
                <th style="width: 10%;">Адрес заказчика</th>
                <th style="width: 12%;">Комментарий к заказу</th>
                <th style="width: 15%;">Заказанные товары</th>
                <th style="width: 5%;">Цена за товар (за 1 шт.) (руб.)</th>
                <th style="width: 5%;">Количество заказанных товаров (шт.)</th>
                <th style="width: 5%;">Общая сумма за один товар (руб.)</th>
                <th style="width: 1%;">Общая сумма за весь заказ (руб.)</th>
                <th style="width: 7%;">Статус заказа</th>
                <th style="width: 9%;">Дата заказа</th>
                <th style="width: 9%;">Действие</th>
            </tr>
            <?php
                foreach ($data as $order_goods) {
            ?>
                    <tr>
                        <td><?=$order_goods["order_goods_client_id"];?></td>
                        <td><?=$order_goods["order_fio_client_goods"];?></td>
                        <td><?=$order_goods["order_phone_client_goods"];?></td>
                        <td><?=$order_goods["order_email_client_goods"];?></td>
                        <td><?=$order_goods["order_adress_client_goods"];?></td>
                        <td><?=$order_goods["order_comments_client_goods"];?></td>
                        <td>
                            <?php foreach ($order_goods["order_goods"] as $goods) { ?>
                                    <table>
                                        <tr>
                                            <td style="border: none; border-bottom: 2px solid black;"><?=$goods["order_goods_name_order"];?></td>
                                        </tr>
                                    </table>
                            <?php } ?>
                        </td>
                        <td>
                            <?php foreach ($order_goods["order_goods"] as $goods) { ?>
                                <table>
                                    <tr>
                                        <td style="border: none; border-bottom: 2px solid black;"><?=$goods["order_goods_price_order"];?></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        </td>
                        <td>
                            <?php foreach ($order_goods["order_goods"] as $goods) { ?>
                                <table>
                                    <tr>
                                        <td style="border: none; border-bottom: 2px solid black;"><?=$goods["order_goods_count_order"];?></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                                $full_price=0;
                                foreach ($order_goods["order_goods"] as $goods) {
                            ?>
                                <table>
                                    <tr>
                                        <td style="border: none; border-bottom: 2px solid black;"><?=$goods["order_goods_sum_order"];?></td>
                                        <?php $full_price+=$goods["order_goods_sum_order"]; ?>
                                    </tr>
                                </table>
                            <?php } ?>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td style="border: none; border-bottom: 2px solid black;"><?=$full_price;?></td>
                                </tr>
                            </table>
                        </td>
                        <?php
                            if ($order_goods["order_status_client_goods"]==1) {
                                $status="Заказ не выполнен";
                            } elseif ($order_goods["order_status_client_goods"]==0) {
                                $status="Заказ выполнен";
                            }
                        ?>
                        <td><?=$status;?></td>
                        <td>
                            <?php
                                $order_date_client_goods=date_format(date_create($order_goods["order_date_client_goods"]), 'd/m/Y H:i:s');
                                echo $order_date_client_goods;
                            ?>
                        </td>
                        <td><a href="<?=Config::$root;?>/order_goods/edit_admin_order_goods/?id=<?=$order_goods["order_goods_client_id"];?>">Изменить</a></td>
                    </tr>
            <?php } ?>
        </table>
    </div>
</div>