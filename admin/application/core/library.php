<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 04.11.2017
 * Time: 23:17
 */
class Library {
    static function clear_data($string) {
        return trim(strip_tags($string));
    }
    static function create_session($login, $password) {
        $_SESSION['login']=self::clear_data($login);
        $_SESSION['password']=self::clear_data($password);
        return true;
    }
    static function check_session() {
        if(self::clear_data($_SESSION['login']) && self::clear_data($_SESSION['password'])) {
            return true;
        } else {
            return false;
        }
    }
}
?>