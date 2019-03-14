<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 04.11.2017
 * Time: 14:28
 */
class Controller_Main extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function action_index() {
        if (Library::check_session()) {
            $this->view->generate('main_view.php', 'template_view.php');
        } else {
            $this->view->generate('', 'template_view_registration.php');
        }
    }
}
?>