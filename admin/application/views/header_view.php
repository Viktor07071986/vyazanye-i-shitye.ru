<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 06.11.2017
 * Time: 14:39
 */
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link href="/admin/css/admin.css" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace( 'editor');
        });
    </script>
    <title><?=$_SERVER['HTTP_HOST'];?></title>
</head>
<body>