<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 14.04.2018
 * Time: 15:21
 */
class Controller_Menu_Goods extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model=new Model_Menu_Goods();
    }
    public function action_admin_menu_goods () {
        $data=$this->model->get_all_data();
        $this->view->generate('menu_goods_view.php', 'template_view.php', $data);
    }
    public function action_add_admin_menu_goods () {
        if (empty($_GET['id'])) {
            if (preg_match("/^[А-ЯЁа-яё ]{5,60}$/u", $_POST['goods_name_menu'])) {
                $this->model->get_add_menu($_POST['goods_name_menu']);
                header("Location: " . $_SERVER["HTTP_REFERER"]);
                exit;
            }
            $this->view->generate('add_menu_goods_view.php', 'template_view.php');
        } else {
            if (preg_match("/^[А-ЯЁа-яё ]{5,60}$/u", $_POST['goods_name_pod_menu'])) {
                $this->model->get_add_menu($_POST['goods_name_pod_menu']);
                header("Location: " . $_SERVER["HTTP_REFERER"]);
                exit;
            }
            $this->view->generate('add_pod_menu_goods_view.php', 'template_view.php');
        }
    }
    public function action_edit_admin_menu_goods () {
        $data=$this->model->get_edit_menu();
        $this->view->generate('edit_menu_goods_view.php', 'template_view.php', $data);
    }
    public function action_del_admin_menu_goods () {
        $data=$this->model->get_del_menu();
    }
    public function action_up_admin_pod_menu_goods () {
        $data=$this->model->get_up_pod_menu();
    }
    public function action_down_admin_pod_menu_goods () {
        $data=$this->model->get_down_pod_menu();
    }
}
?>