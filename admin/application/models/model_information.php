<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 24.12.2017
 * Time: 20:57
 */
class Model_Information extends Model {
    public function get_add_data($link_name, $link, $content) {
        $this->model->query("INSERT INTO information (link_name, link, content) VALUES ('$link_name', '$link', '$content')");
    }
    public function get_all_data () {
        $query=$this->model->query("SELECT id, link_name, link, content, active_status FROM information ORDER BY id ASC");
        $data=$query->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function get_edit_data () {
        if (preg_match("/^[А-ЯЁа-яё ]{5,15}$/u", $_POST['link_name']) && preg_match("/^[a-z]{5,15}$|^[\/]$/", $_POST['link']) && !empty($_POST['content'])) {
            $this->model->query("UPDATE information SET link_name='".$_POST['link_name']."', link='".$_POST['link']."', content='".$_POST['content']."', active_status=".$_POST['active_status']." WHERE id=".$_GET['id']."");
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit;
        } else {
            $query=$this->model->query("SELECT link_name, link, content, active_status FROM information WHERE id=".$_GET['id']."");
            $data=$query->fetch_assoc();
            return $data;
        }
    }
    public function get_del_data () {
        $this->model->query("DELETE FROM information WHERE id=".$_GET['id']."");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }
}
?>