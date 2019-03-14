<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 11.02.2018
 * Time: 23:33
 */
class Controller_Main extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model=new Model_Main();
    }
    public function action_index() {
        $data_info=$this->model->get_all_data();
        $data_menu=$this->model->get_menu();
        $data=array_merge($data_info, $data_menu);
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }
}
?>