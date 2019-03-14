<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 11.02.2018
 * Time: 23:21
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