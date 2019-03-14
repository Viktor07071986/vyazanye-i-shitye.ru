<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 05.05.2018
 * Time: 15:39
 */
class Model_Goods extends Model {
    public function get_all_data () {
        $query=$this->model->query("SELECT g.good_id, g.good_name, g.good_short_description, g.good_full_description, g.active_status_goods, g.good_price, g.count_goods, mg.goods_name_menu FROM goods g LEFT JOIN menu_goods mg ON (g.menu_id=mg.id) ORDER BY good_id ASC");
        $data=$query->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function get_add_goods($good_name, $short_description, $full_description, $select_menu_goods, $good_price, $count_goods) {
        $this->model->query("INSERT INTO goods (good_name, good_short_description, good_full_description, menu_id, good_price, count_goods) VALUES ('$good_name', '$short_description', '$full_description', $select_menu_goods, $good_price, $count_goods)");
    }
    public function get_edit_goods () {
        if (preg_match("/^[А-ЯЁа-яё ]{5,60}$/u", $_POST['good_name']) && !empty($_POST['good_short_description']) && !empty($_POST['good_full_description']) && preg_match("/^[0-9]+$/", $_POST['good_price']) && preg_match("/^[0-9]+$/", $_POST['count_goods'])) {
            $this->model->query("UPDATE goods SET good_name='".$_POST['good_name']."', good_short_description='".$_POST['good_short_description']."', good_full_description='".$_POST['good_full_description']."', active_status_goods=".$_POST['active_status_goods'].", menu_id=".$_POST['select_menu_goods'].", good_price=".$_POST['good_price'].", count_goods=".$_POST['count_goods']." WHERE good_id=".$_GET['id']."");
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        } else {
            $query=$this->model->query("SELECT good_name, good_short_description, good_full_description, active_status_goods, menu_id, good_price, count_goods FROM goods WHERE good_id=".$_GET['id']."");
            $data=$query->fetch_assoc();
            $query_menu_goods=$this->model->query("SELECT id, goods_name_menu FROM menu_goods WHERE active_status_menu=1");
            while ($query_menu_good=$query_menu_goods->fetch_assoc()) {
                $data['menu_goods'][]=$query_menu_good;
            }
            return $data;
        }
    }
    public function get_del_goods () {
        $this->model->query("DELETE FROM goods WHERE good_id=".$_GET['id']."");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
    public function data_menu_goods () {
        $query_menu_goods=$this->model->query("SELECT id, goods_name_menu FROM menu_goods WHERE active_status_menu=1");
        $query_menu_good=$query_menu_goods->fetch_all(MYSQLI_ASSOC);
        return $query_menu_good;
    }
}
?>