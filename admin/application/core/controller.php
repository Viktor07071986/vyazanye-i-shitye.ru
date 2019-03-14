<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 04.11.2017
 * Time: 13:26
 */
session_start();
class Controller {
    protected $model;
    protected $view;
    protected function __construct() {
        $this->view = new View();
    }
    protected function action_index() {
        // todo
    }
}
?>