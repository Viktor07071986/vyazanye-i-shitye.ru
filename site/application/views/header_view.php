<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 04.03.2018
 * Time: 14:00
 */
if ($_SERVER["REQUEST_URI"]=='/') {
    $title="Вязанье и шитье";
} else {
    $title="Вязанье и шитье / " . $data[0]['menu_link_name'];
}
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link href="/site/css/index.css" rel="stylesheet" type="text/css"/>
    <link href="/site/css/jqcart.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/site/js/jqcart.js"></script>
    <script src="/site/js/index.js"></script>
    <script>
        $(function() {
            'use strict';
            // инициализация плагина
            $.jqCart({
                buttons: '.add_item',        // селектор кнопок, аля "Добавить в корзину"
                handler: '/site/php/handler.php', // путь к обработчику
                visibleLabel: false,         // показывать/скрывать ярлык при пустой корзине (по умолчанию: false)
                openByAdding: false,         // автоматически открывать корзину при добавлении товара (по умолчанию: false)
                currency: 'руб.',           // валюта: строковое значение, мнемоники (по умолчанию "$")
                cartLabel: '.label-place'    /* селектор элемента, где будет размещен ярлык, он же - "кнопка" для открытия корзины */
            });
            // дополнительные методы
            $('#open').click(function(){
                $.jqCart('openCart'); // открыть корзину
            });
            $('#clear').click(function(){
                $.jqCart('clearCart'); // очистить корзину
            });
        });
    </script>
    <title><?=$title;?></title>
</head>
<body>