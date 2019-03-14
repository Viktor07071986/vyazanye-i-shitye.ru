<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 24.06.2018
 * Time: 16:10
 */
if (isset($data['parent_menu'])) {
    // $parent_menu="/ <li><a href=".Config::$root."/goods/goods/?id=".$data["id"].">".$data['parent_menu']."</a></li>";
    // Закоменчен верхний в принципе более верный вариант хлебных крошек так как в данной реализации не подразумевается наличие товаров в основном меню если есть подменю!!!
    $parent_menu="/ <li>".$data['parent_menu']."</li>";
}
?>
<div class="content">
    <div class="osn_pod_menu">
        <ul class="breadcrumb">
            <li><a href="<?=Config::$root;?>/">Главная</a></li> <?=$parent_menu;?> / <li><a href="<?=Config::$root;?>/goods/goods/?id=<?=$_GET["id"];?>"><?=$data['child_menu'];?></a></li>
        </ul>
        <div class="pagination">
            <h1><?=mb_strtoupper($data['goods_name_menu'], 'UTF-8');?></h1>
        </div>
    </div>
    <div class="all_goods">
        <?php
            foreach ($data as $all_goods) {
                if (isset($all_goods['good_id']) && isset($all_goods['good_name']) && isset($all_goods['good_short_description']) && isset($all_goods['good_price'])) {
        ?>
                    <div class="goods">
                        <div class="goods_short_description"><?=$all_goods["good_short_description"];?></div>
                        <div style="clear:both;"></div>
                        <div class="goods_name"><a href="<?=Config::$root?>/goods/detail_goods/?id=<?=$all_goods['good_id'];?>"><?=$all_goods["good_name"];?></a></div>
                        <div class="goods_price">Цена: <?=$all_goods["good_price"];?> рублей.</div>
                        <div class="basket">
                            <button class="add_item" data-id="<?=$all_goods['good_id'];?>" data-title="<?=$all_goods['good_name'];?>" data-price="<?=$all_goods['good_price'];?>">В корзину</button>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="info_goods">Не более <?=$all_goods["count_goods"];?> товаров!</div>
                    </div>
        <?php }} ?>
    </div>
    <div style="clear:both;"></div>
</div>