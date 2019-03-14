<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 14.07.2018
 * Time: 19:31
 */
class Controller_Order_Goods extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model=new Model_Order_Goods();
    }
    public function action_admin_order_goods () {
        $data=$this->model->get_order_goods();
        $this->view->generate('goods_order_view.php', 'template_view.php', $data);
    }
    public function action_edit_admin_order_goods () {
        $data=$this->model->get_edit_order_goods();
        $this->view->generate('edit_order_goods_view.php', 'template_view.php', $data);
    }
}
?>