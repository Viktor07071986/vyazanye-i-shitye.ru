<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 24.12.2017
 * Time: 15:55
 * @param $filename
 * @return mixed
 */
function getex($filename) {
    return end(explode(".", $filename));
}
if($_FILES['upload']) {
    if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) ) {
        $message = "Вы не выбрали файл";
    } elseif ($_FILES['upload']["size"] == 0 OR $_FILES['upload']["size"] > 2050000) {
        $message = "Размер файла не соответствует нормам";
    } elseif (($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/jpg") AND ($_FILES['upload']["type"] != "image/png")) {
        $message = "Допускается загрузка только картинок JPG и PNG.";
    } elseif (!is_uploaded_file($_FILES['upload']["tmp_name"])) {
        $message = "Что-то пошло не так. Попытайтесь загрузить файл ещё раз.";
    } else{
        $name =rand(1, 1000).'-'.md5($_FILES['upload']['name']).'.'.getex($_FILES['upload']['name']);
        move_uploaded_file($_FILES['upload']['tmp_name'], "images/".$name);
        $full_path = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/admin/application/images/'.$name;
        $message = "Файл ".$_FILES['upload']['name']." загружен";
        $size=@getimagesize('images/'.$name);
        if($size[0]<50 OR $size[1]<50) {
            unlink('images/'.$name);
            $message = "Файл не является допустимым изображением";
            $full_path="";
        }
    }
    $callback = $_REQUEST['CKEditorFuncNum'];
    echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$callback.'", "'.$full_path.'", "'.$message.'" );</script>';
}
?>