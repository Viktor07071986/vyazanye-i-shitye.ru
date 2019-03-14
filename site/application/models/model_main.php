<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 04.03.2018
 * Time: 17:05
 */
class Model_Main extends Model {
    public function get_all_data () {
        $query=$this->model->query("SELECT link, link_name, content FROM information WHERE active_status=1 ORDER BY id ASC");
        $data=$query->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function get_menu () {
        $query_menu=$this->model->query("SELECT id, goods_name_menu FROM menu_goods WHERE active_status_menu=1 AND parent_id=0 ORDER BY id ASC");
        $full_menu=array();
        $i=0;
        while ($menu=$query_menu->fetch_assoc()) {
            $full_menu[]=$menu;
            $query_pod_menu=$this->model->query("SELECT id, goods_name_menu FROM menu_goods WHERE active_status_menu=1 AND parent_id=".$menu['id']." ORDER BY pos_pod_menu ASC");
            while ($pod_menu=$query_pod_menu->fetch_assoc()) {
                $full_menu[$i]['pod_menu'][]=$pod_menu;
            }
            $i++;
        }
        return $full_menu;
    }
}
?>