<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 24.06.2018
 * Time: 23:55
 */
if (isset($data['parent_menu'])) {
    // $parent_menu="/ <li><a href=".Config::$root."/goods/goods/?id=".$data["parent_id"].">".$data['parent_menu']."</a></li>";
    // Закоменчен верхний в принципе более верный вариант хлебных крошек так как в данной реализации не подразумевается наличие товаров в основном меню если есть подменю!!!
    $parent_menu="/ <li>".$data['parent_menu']."</li>";
}
?>
<div class="content">
    <div class="osn_pod_menu">
        <ul class="breadcrumb">
            <li><a href="<?=Config::$root;?>/">Главная</a></li> <?=$parent_menu;?> / <li><a href="<?=Config::$root;?>/goods/goods/?id=<?=$data["child_id"];?>"><?=$data['child_menu'];?></a></li> / <li><a href="<?=Config::$root;?>/goods/detail_goods/?id=<?=$_GET["id"];?>"><?=$data['good_name'];?></a></li>
        </ul>
        <div class="pagination">
            <h1><?=mb_strtoupper($data['good_name'], 'UTF-8');?></h1>
        </div>
    </div>
    <div class="detail_goods">
        <div class="detail_goods_description"><?=$data["good_full_description"];?></div><br/>
        <div class="detail_goods_price">Цена: <?=$data["good_price"];?> рублей.</div>
        <div class="basket">
            <button class="add_item" style="margin-top: 0px;" data-id="<?=$_GET['id'];?>" data-title="<?=$data['good_name'];?>" data-price="<?=$data['good_price'];?>">В корзину</button>
        </div><br/>
        <div class="info_goods" style="text-align: left;">Не более <?=$data["count_goods"];?> товаров!</div>
    </div>
    <div style="clear:both;"></div>
</div>