<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 14.04.2018
 * Time: 18:43
 */
class Model_Menu_Goods extends Model {
    public function get_add_menu($goods_name_menu) {
        if (empty($_GET['id'])) {
            $this->model->query("INSERT INTO menu_goods (goods_name_menu) VALUES ('$goods_name_menu')");
        } else {
            $query=$this->model->query("SELECT MAX(pos_pod_menu) FROM menu_goods WHERE parent_id=".$_GET['id']."");
            $max_pos=$query->fetch_row();
            $max_pos[0]++;
            $this->model->query("INSERT INTO menu_goods (parent_id, goods_name_menu, pos_pod_menu) VALUES (".$_GET['id'].", '$goods_name_menu', ".$max_pos[0].")");
        }
    }
    public function get_all_data () {
        $query=$this->model->query("SELECT id, parent_id, goods_name_menu, active_status_menu, pos_pod_menu FROM menu_goods WHERE parent_id=0 ORDER BY id ASC");
        $data=array();
        $i=0;
        while ($rows=$query->fetch_assoc()) {
            $data[]=$rows;
            if ($rows['parent_id']==0) {
                $query_row=$this->model->query("SELECT id, parent_id, goods_name_menu, active_status_menu, pos_pod_menu FROM menu_goods WHERE parent_id=".$rows['id']." ORDER BY pos_pod_menu ASC");
                $query_min_max=$this->model->query("SELECT MIN(pos_pod_menu) as min_pos, MAX(pos_pod_menu) as max_pos FROM menu_goods WHERE parent_id=".$rows['id']." ORDER BY id ASC");
                $min_max_pos=$query_min_max->fetch_assoc();
                while ($row=$query_row->fetch_assoc()) {
                    $data[$i]['pod_menu'][]=$row;
                    $data[$i]['min_pos']=$min_max_pos['min_pos'];
                    $data[$i]['max_pos']=$min_max_pos['max_pos'];
                }
            }
            $i++;
        }
        return $data;
    }
    public function get_edit_menu () {
        if (preg_match("/^[А-ЯЁа-яё ]{5,60}$/u", $_POST['goods_name_menu'])) {
            $this->model->query("UPDATE menu_goods SET goods_name_menu='".$_POST['goods_name_menu']."', active_status_menu=".$_POST['active_status_menu']." WHERE id=".$_GET['id']."");
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        } else {
            $query=$this->model->query("SELECT goods_name_menu, active_status_menu FROM menu_goods WHERE id=".$_GET['id']."");
            $data=$query->fetch_assoc();
            return $data;
        }
    }
    public function get_del_menu () {
        $this->model->query("DELETE FROM menu_goods WHERE id=".$_GET['id']."");
        $this->model->query("DELETE FROM menu_goods WHERE parent_id=".$_GET['id']."");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
    private function get_down_up_pod_menu () {
        $query=$this->model->query("SELECT parent_id, pos_pod_menu FROM menu_goods WHERE id=".$_GET['id']."");
        $pos=$query->fetch_assoc();
        if ($pos==null) return;
        return $pos;
    }
    public function get_down_pod_menu () {
        $pos=$this->get_down_up_pod_menu();
        $child_position="pos_pod_menu>".$pos['pos_pod_menu']." ORDER BY pos_pod_menu ASC LIMIT 1";
        $query2=$this->model->query("SELECT id, pos_pod_menu FROM menu_goods WHERE parent_id=".$pos['parent_id']." AND ".$child_position."");
        $post2=$query2->fetch_assoc();
        if ($post2==null) return;
        $id2=$post2['id'];
        $pos2=$post2['pos_pod_menu'];
        $this->model->query("UPDATE menu_goods SET pos_pod_menu=".$pos2." WHERE id=".$_GET['id']." LIMIT 1");
        $this->model->query("UPDATE menu_goods SET pos_pod_menu=".$pos['pos_pod_menu']." WHERE id=".$id2." LIMIT 1");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
    public function get_up_pod_menu () {
        $pos=$this->get_down_up_pod_menu();
        $child_position="pos_pod_menu<".$pos['pos_pod_menu']." ORDER BY pos_pod_menu DESC LIMIT 1";
        $query2=$this->model->query("SELECT id, pos_pod_menu FROM menu_goods WHERE parent_id=".$pos['parent_id']." AND ".$child_position."");
        $post2=$query2->fetch_assoc();
        if ($post2==null) return;
        $id2=$post2['id'];
        $pos2=$post2['pos_pod_menu'];
        $this->model->query("UPDATE menu_goods SET pos_pod_menu=".$pos2." WHERE id=".$_GET['id']." LIMIT 1");
        $this->model->query("UPDATE menu_goods SET pos_pod_menu=".$pos['pos_pod_menu']." WHERE id=".$id2." LIMIT 1");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
?>