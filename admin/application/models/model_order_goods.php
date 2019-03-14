<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 15.07.2018
 * Time: 2:08
 */
class Model_Order_Goods extends Model {
    public function get_order_goods () {
        $query_client=$this->model->query("SELECT ogc.order_goods_client_id, ogc.order_fio_client_goods, ogc.order_phone_client_goods, ogc.order_email_client_goods, ogc.order_adress_client_goods, ogc.order_comments_client_goods, ogc.order_date_client_goods, ogc.order_status_client_goods FROM order_goods_client ogc");
        $data=array();
        $i=0;
        while ($rows=$query_client->fetch_assoc()) {
            $data[$i]=$rows;
            $query_order=$this->model->query("SELECT ogo.order_goods_name_order, ogo.order_goods_price_order, ogo.order_goods_count_order, ogo.order_goods_sum_order FROM order_goods_order ogo WHERE ogo.order_goods_id_order=".$data[$i]["order_goods_client_id"]."");
            while ($row=$query_order->fetch_assoc()) {
                $data[$i]['order_goods'][]=$row;
            }
            $i++;
        }
        return $data;
    }
    public function get_edit_order_goods () {
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $this->model->query("UPDATE order_goods_client SET order_status_client_goods=".$_POST['select_order_goods']." WHERE order_goods_client_id=".$_GET['id']."");
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        } else {
            $query=$this->model->query("SELECT order_status_client_goods FROM order_goods_client WHERE order_goods_client_id=".$_GET['id']."");
            $data=$query->fetch_assoc();
            return $data;
        }
    }
}
?>