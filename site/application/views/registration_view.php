<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 10.03.2018
 * Time: 16:39
 */
?>
<div class="content">
    <div class="registration">
        <ul class="breadcrumb">
            <li><a href="<?=Config::$root;?>/">Главная</a></li> / <li><a href="<?=Config::$root;?>/information/<?=$data[0]['link'];?>/"><?=$data[0]['menu_link_name'];?></a></li>
        </ul>
        <div class="pagination">
            <h1><?=mb_strtoupper($data[0]['menu_link_name'], 'UTF-8');?></h1>
        </div>
    </div>
    <?=$data[0]['content'];?>
</div>