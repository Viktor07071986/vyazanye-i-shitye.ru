<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 04.11.2017
 * Time: 18:06
 */
class Model_Registration extends Model {
    public function get_data() {
        $query=$this->model->query("SELECT login, password FROM admin");
        $data=$query->fetch_assoc();
        return $data;
    }
}
?>