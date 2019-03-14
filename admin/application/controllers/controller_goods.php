<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 05.05.2018
 * Time: 13:28
 */
class Controller_Goods extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model=new Model_Goods();
    }
    public function action_admin_goods () {
        $data=$this->model->get_all_data();
        $this->view->generate('goods_view.php', 'template_view.php', $data);
    }
    public function action_add_admin_goods () {
        if (preg_match("/^[А-ЯЁа-яё ]{5,60}$/u", $_POST['good_name']) && !empty($_POST['short_description']) && !empty($_POST['full_description']) && preg_match("/^[0-9]+$/", $_POST['good_price']) && preg_match("/^[0-9]+$/", $_POST['count_goods'])) {
            $this->model->get_add_goods($_POST['good_name'], $_POST['short_description'], $_POST['full_description'], $_POST['select_menu_goods'], $_POST['good_price'], $_POST['count_goods']);
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }
        $data_menu_goods=$this->model->data_menu_goods();
        $this->view->generate('add_goods_view.php', 'template_view.php', $data_menu_goods);
    }
    public function action_edit_admin_goods () {
        $data=$this->model->get_edit_goods();
        $this->view->generate('edit_goods_view.php', 'template_view.php', $data);
    }
    public function action_del_admin_goods () {
        $data=$this->model->get_del_goods();
    }
}
?>