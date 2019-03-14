<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 24.06.2018
 * Time: 15:09
 */
class Controller_Goods extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model=new Model_Goods();
    }
    public function action_goods() {
        $data_goods=$this->model->get_all_goods();
        $data_info=$this->model->get_all_data();
        $data_menu=$this->model->get_menu();
        $data_pagination=$this->model->get_pagination_menu();
        $data=array_merge($data_goods, $data_info, $data_menu, $data_pagination);
        $this->view->generate('goods_view.php', 'template_view.php', $data);
    }
    public function action_detail_goods() {
        $data_detail_goods=$this->model->get_detail_goods();
        $data_info=$this->model->get_all_data();
        $data_menu=$this->model->get_menu();
        $data=array_merge($data_detail_goods, $data_info, $data_menu);
        $this->view->generate('goods_detail_view.php', 'template_view.php', $data);
    }
}
?>