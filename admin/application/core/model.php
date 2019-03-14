<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 04.11.2017
 * Time: 13:48
 */
class Model {
    protected $model;
    public function __construct() {
        $this->model=new mysqli(Config::$host, Config::$user, Config::$pswd, Config::$db);
    }
    // метод выборки данных
    protected function get_data() {
        // todo
    }
    public function __destruct() {
        $this->model->close();
    }
}
?>