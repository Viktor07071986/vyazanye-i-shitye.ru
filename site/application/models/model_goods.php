<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 24.06.2018
 * Time: 15:11
 */
class Model_Goods extends Model_Main {
    public function get_all_goods () {
        $query=$this->model->query("SELECT good_id, good_name, good_short_description, good_price, count_goods FROM goods WHERE active_status_goods=1 AND count_goods>0 AND menu_id=".$_GET["id"]." ORDER BY good_id DESC");
        $data=$query->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function get_detail_goods () {
        $query=$this->model->query("SELECT g.good_id, g.good_name, g.good_full_description, g.good_price, g.count_goods, mg1.goods_name_menu AS parent_menu, mg1.id as parent_id, mg.id as child_id, mg.goods_name_menu AS child_menu FROM goods g LEFT JOIN menu_goods mg ON (g.menu_id=mg.id) LEFT JOIN menu_goods mg1 ON (mg.parent_id=mg1.id) WHERE g.active_status_goods=1 AND g.good_id=".$_GET["id"]."");
        $data=$query->fetch_assoc();
        return $data;
    }
    public function get_pagination_menu () {
        $query_pagination=$this->model->query("SELECT mg1.id, mg1.goods_name_menu AS parent_menu, mg.goods_name_menu AS child_menu FROM menu_goods mg LEFT JOIN menu_goods mg1 ON (mg.parent_id=mg1.id) WHERE mg.active_status_menu=1 AND mg.id=".$_GET["id"]."");
        $data=$query_pagination->fetch_assoc();
        return $data;
    }
}
?>