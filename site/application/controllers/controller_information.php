<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 09.03.2018
 * Time: 20:12
 */
class Controller_Information extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model=new Model_Information();
    }
    private function information_data_full () {
        $data_personal=$this->model->get_personal_information_data();
        $data_all=$this->model->get_all_data();
        $data_menu=$this->model->get_menu();
        $data=array_merge($data_personal, $data_all, $data_menu);
        return $data;
    }
    public function action_about () {
        $data=$this->information_data_full();
        $this->view->generate('about_view.php', 'template_view.php', $data);
    }
    public function action_contact () {
        $data=$this->information_data_full();
        $this->view->generate('contacts_view.php', 'template_view.php', $data);
    }
    public function action_delivery () {
        $data=$this->information_data_full();
        $this->view->generate('delivery_view.php', 'template_view.php', $data);
    }
    public function action_registration () {
        $data=$this->information_data_full();
        $this->view->generate('registration_view.php', 'template_view.php', $data);
    }
}
?>