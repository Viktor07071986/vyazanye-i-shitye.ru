<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 09.03.2018
 * Time: 16:58
 */
?>
<div class="bottom_content">
    <div class="bottom_menu">
        <div class="left">
            <h2>ИНФОРМАЦИЯ</h2>
            <ul>
                <?php foreach ($data as $menu) {
                    if (!empty($menu['link_name'])) {
                        if ($menu["link"]=="/") {
                            $link=Config::$root."/";
                        } else {
                            $link=Config::$root."/information/".$menu["link"]."/";
                        }
                        if ($menu["link"]=="registration") {
                            continue;
                        }
                ?>
                        <li>
                            <a href="<?=$link;?>"><?=$menu['link_name'];?></a>
                        </li>
                    <?php }} ?>
            </ul>
        </div>
        <div class="middle">
            <h2>ЛИЧНЫЙ КАБИНЕТ</h2>
            <ul>
                <li><a href="<?=Config::$root;?>/information/registration/">Личный кабинет</a></li>
            </ul>
        </div>
        <div class="right">
            <h2>КОНТАКТЫ</h2>
            <ul>
                <li><span>ala3107@mail.ru</span></li>
                <li><span>8-916-262-28-48</span></li>
                <li><span>liubovlv</span></li>
            </ul>
        </div>
    </div>
    <div id="footer"></div>
    <div class="bottom">
        <p id="copyright">
            <span>© Copyright 2018-<?=date("Y");?>. "Вязанье и шитье"<br/>
            Интернет-магазин вязаных игрушек</span>
        </p>
    </div>
</div>
</body>
</html>
