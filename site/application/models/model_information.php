<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 09.03.2018
 * Time: 20:22
 */
class Model_Information extends Model_Main {
    public function get_personal_information_data () {
        $link=explode("/", $_SERVER["REQUEST_URI"]);
        $query=$this->model->query("SELECT link, link_name AS menu_link_name, content FROM information WHERE link='".$link[2]."'");
        $data=$query->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
}
?>