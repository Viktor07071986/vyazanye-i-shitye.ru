<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 11.02.2018
 * Time: 23:15
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