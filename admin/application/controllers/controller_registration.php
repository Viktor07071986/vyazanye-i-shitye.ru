<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 04.11.2017
 * Time: 17:33
 */
class Controller_Registration extends Controller {
    public function __construct() {
        $this->model=new Model_Registration();
    }
    public function action_admin_registration() {
        $data=$this->model->get_data();
        if (md5(Library::clear_data($_POST['login'])) == $data['login'] && md5(Library::clear_data($_POST['password'])) == $data['password'] && Library::create_session($_POST['login'], $_POST['password'])) {
            header("Location: ".Config::$root);
            exit();
        } else {
            header("Location: ".Config::$root);
            exit();
        }
    }
    public function action_admin_unlogin() {
        session_unset();
        session_destroy();
        header("Location: ".Config::$root);
        exit();
    }
}
?>