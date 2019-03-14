<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 16.12.2017
 * Time: 21:21
 */
class Controller_Information extends Controller {
    public function __construct() {
        parent::__construct();
        $this->model=new Model_Information();
    }
    public function action_admin_information () {
        $data=$this->model->get_all_data();
        $this->view->generate('information_view.php', 'template_view.php', $data);
    }
    public function action_add_admin_information () {
        if (preg_match("/^[А-ЯЁа-яё ]{5,15}$/u", $_POST['link_name']) && preg_match("/^[a-z]{5,15}$|^[\/]$/", $_POST['link']) && !empty($_POST['content'])) {
            $this->model->get_add_data($_POST['link_name'], $_POST['link'], $_POST['content']);
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        }
        $this->view->generate('add_information_view.php', 'template_view.php');
    }
    public function action_edit_admin_information () {
        $data=$this->model->get_edit_data();
        $this->view->generate('edit_information_view.php', 'template_view.php', $data);
    }
    public function action_del_admin_information () {
        $data=$this->model->get_del_data();
    }
}
?>