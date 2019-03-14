<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 11.02.2018
 * Time: 23:43
 */
require_once 'site/application/views/header_view.php';
?>
<div class="top_content">
    <div class="top_menu">
        <ul>
            <?php foreach ($data as $menu) {
                if (!empty($menu['link_name'])) {
                    if ($menu["link"]=="/") {
                        $link=Config::$root."/";
                    } else {
                        $link=Config::$root."/information/".$menu["link"]."/";
                    }
            ?>
                <li>
                    <a href="<?=$link;?>"><?=$menu['link_name'];?></a>
                </li>
            <?php }} ?>
        </ul>
    </div>
    <div style="clear: both;"></div>
    <div class="top_phone_name">8-916-262-28-48<br/>ЛЮБОВЬ</div>
    <div class="top_logo">ИНТЕРНЕТ МАГАЗИН ВЯЗАННЫХ ИГРУШЕК</div>
    <div class="top_info">
        <div class="top_image">
            <img src="/site/images/sdelano_v_rossii.png"/>
        </div>
        <div class="top_email">ala3107@mail.ru</div>
    </div>
    <div class="top_basket label-place"></div>
    <div style="clear: both;"></div>
    <p class="top_basket" style="margin-right: 50px; margin-top: -15px;">
        <button id="clear" class="add_item">Очистить корзину</button>
        <button id="open" class="add_item">Открыть корзину</button>
    </p>
    <div style="clear: both; height: 25px;"></div>
    <div class="goods_full_menu">
        <ul>
            <?php
                foreach ($data as $good_menu) {
                    if (!empty($good_menu['goods_name_menu'])) {
                        if (isset($good_menu['pod_menu'])) {
            ?>
                            <li class="sub">
                                <a href="/"><?=$good_menu['goods_name_menu'];?></a>
                                <ul class="pod_menu" style="margin-left: 35px;">
                                    <?php foreach ($good_menu['pod_menu'] as $pod_menu) { ?>
                                            <li>
                                                <a href="<?=Config::$root?>/goods/goods/?id=<?=$pod_menu['id'];?>"><?=$pod_menu['goods_name_menu'];?></a>
                                            </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?=Config::$root?>/goods/goods/?id=<?=$good_menu['id'];?>"><?=$good_menu['goods_name_menu'];?></a>
                            </li>
                        <?php }}} ?>
        </ul>
    </div>
</div>
<?php require_once 'site/application/views/'.$content_view;?>
<?php require_once 'site/application/views/footer_view.php'?>