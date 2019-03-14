<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 13.07.2018
 * Time: 17:05
 */
parse_str($_POST['orderlist'], $orderlist);
parse_str($_POST['userdata'], $userdata);
/*
$orderlist - массив со списком заказа
$userdata - данные заказчика
*/
// При желании, можно посмотреть полученные данные, записав их в файл:
// file_put_contents('cart_data_log.txt', var_export($orderlist, 1) . "\r\n");
// file_put_contents('cart_data_log.txt', var_export($userdata, 1), FILE_APPEND);
// Заголовок письма
$subject = 'Заказ оформлен '.date('d.m.Y').' г. в '.date('H:i:s').'';
// ваш Email - ПОЧТА АДМИНИСТРАТОРА!!!
$admin_mail = 'ala3107@mail.ru';
// Email заказчика (как fallback - ваш же Email)
$to = !empty($userdata['user_mail']) ? $userdata['user_mail'] : $admin_mail;
// Формируем таблицу с заказанными товарами
$tbl = '<table style="width: 100%; border-collapse: collapse;">
	<tr>
		<th style="width: 1%; border: 1px solid #333333; padding: 5px;">ID</th>
		<th style="border: 1px solid #333333; padding: 5px;">Наименование</th>
		<th style="border: 1px solid #333333; padding: 5px;">Цена</th>
		<th style="border: 1px solid #333333; padding: 5px;">Кол-во</th>
		<th style="border: 1px solid #333333; padding: 5px;">Сумма</th>
	</tr>';
$total_sum = 0;
$con=mysqli_connect("localhost","admin","vadim30032016","vyazanye_i_shitye");
$sql="INSERT INTO order_goods_client (order_fio_client_goods, 
                                        order_phone_client_goods, 
                                        order_email_client_goods, 
                                        order_adress_client_goods, 
                                        order_comments_client_goods, 
                                        order_date_client_goods) 
                                        VALUES ('".$userdata['user_name']."', 
                                                '".$userdata['user_phone']."', 
                                                '".$userdata['user_mail']."', 
                                                '".$userdata['user_address']."', 
                                                '".$userdata['user_comment']."', 
                                                '".date('Y-m-d H:i:s')."');";
mysqli_query($con, $sql);
$sql="SELECT order_goods_client_id FROM order_goods_client WHERE order_date_client_goods='".date('Y-m-d H:i:s')."'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
foreach($orderlist as $id => $item_data) {
    $total_sum += (float)$item_data['count'] * (float)$item_data['price'];
    $tbl .= '
	<tr>
		<td style="border: 1px solid #333333; padding: 5px;">'.$item_data['id'].'</td>
		<td style="border: 1px solid #333333; padding: 5px;">'.$item_data['title'].'</td>
		<td style="border: 1px solid #333333; padding: 5px;">'.$item_data['price'].'</td>
		<td style="border: 1px solid #333333; padding: 5px;">'.$item_data['count'].'</td>
		<td style="border: 1px solid #333333; padding: 5px;">'.(float)$item_data['price'] * (float)$item_data['count'].'</td>
	</tr>';
    $sql="INSERT INTO order_goods_order (order_goods_id_order, 
                                        order_goods_id_order_goods, 
                                        order_goods_name_order, 
                                        order_goods_price_order, 
                                        order_goods_count_order, 
                                        order_goods_sum_order) 
                                        VALUES (".$row['order_goods_client_id'].", 
                                                ".$item_data['id'].", 
                                                '".$item_data['title']."', 
                                                ".$item_data['price'].", 
                                                ".$item_data['count'].", 
                                                ".(float)$item_data['price'] * (float)$item_data['count'].");";
    mysqli_query($con, $sql);
}
mysqli_close($con);
$tbl .= '<tr>
		<td  style="border: 1px solid #333333; padding: 5px;" colspan="4">Итого:</td>
		<td style="border: 1px solid #333333; padding: 5px;"><b>'.$total_sum.'</b></td>
	</tr>
</table>';
// Тело письма
$body = '
<html>
<head>
  <title>'.$subject.'</title>
</head>
<body>
  <p>Информация о заказчике:</p>
	<ul>
		<li><b>Ф.И.О.:</b> '.$userdata['user_name'].'</li>
		<li><b>Тел.:</b> '.$userdata['user_phone'].'</li>
		<li><b>Email:</b> '.$userdata['user_mail'].'</li>
		<li><b>Адрес:</b> '.$userdata['user_address'].'</li>
		<li><b>Комментарий:</b> '.$userdata['user_comment'].'</li>
	</ul>
	<p>Информация о заказе:</p>
  '.$tbl.'
	<p>Письмо создано автоматически. Пожалуйста, не отвечайте на него!</p>
</body>
</html>';
// Заголовки
$headers   = []; // или $headers = array() для версии ниже 5.4
$headers[] = 'MIME-Version: 1.0'; // Обязательный заголовок
$headers[] = 'Content-type: text/html; charset=utf-8'; // Обязательный заголовок. Кодировку изменить при необходимости
$headers[] = 'From: Best Shop <noreply@best-shop.piva.net>'; // От кого
$headers[] = 'Bcc: Admin <'.$admin_mail.'>'; // скрытая копия админу сайта, т.е. вам
$headers[] = 'X-Mailer: PHP/'.phpversion();
// Отправка
$send_ok = mail($to, $subject, $body, implode("\r\n", $headers));
// Ответ на запрос
$response = [
    'errors' => !$send_ok,
    'message' => $send_ok ? 'Заказ принят в обработку!' : 'Хьюстон! У нас проблемы!'
];
// ! Для версий PHP < 5.4 использовать традиционный синтаксис инициализации массивов:
/*
$response = array (
	'errors' => !$send_ok,
	'message' => $send_ok ? 'Заказ принят в обработку!' : 'Хьюстон! У нас проблемы!'
);
*/
exit( json_encode($response) );
?>