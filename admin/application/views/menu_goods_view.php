<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 14.04.2018
 * Time: 15:31
 */
?>
<div class="right_content">
    <p id="top_link"><a href="<?=Config::$root;?>/menu_goods/add_admin_menu_goods/">Добавить меню</a></p>
    <?php if (!empty($data)) { ?>
        <div>
            <table>
                <tr>
                    <th>Название пункта меню/подменю</th>
                    <th>Активность пункта меню/подменю</th>
                    <th>Действия над пунктом меню/подменю</th>
                </tr>
                <?php foreach ($data as $menu) { ?>
                    <tr>
                        <td><?=$menu['goods_name_menu'];?></td>
                        <?php
                        if ($menu['active_status_menu']==1) {
                            $active_status_menu="Меню активно";
                        } elseif ($menu['active_status_menu']==0) {
                            $active_status_menu="Меню неактивно";
                        }
                        ?>
                        <td><?=$active_status_menu;?></td>
                        <td>
                            <a href="<?=Config::$root;?>/menu_goods/edit_admin_menu_goods/?id=<?=$menu['id'];?>">Изменить меню</a>
                            <?php if ($menu['parent_id']==0) { ?>
                                <a href="<?=Config::$root;?>/menu_goods/add_admin_menu_goods/?id=<?=$menu['id'];?>">Добавить подменю</a>
                            <?php } ?>

                            <a href="<?=Config::$root;?>/menu_goods/del_admin_menu_goods/?id=<?=$menu['id'];?>" onclick ="return confirm('Вы действительно хотите удалить меню c возможными подменю?');">Удалить меню</a>
                        </td>
                    </tr>
                    <?php if (is_array($menu['pod_menu'])) {
                        foreach ($menu['pod_menu'] as $pod_menu) {
                            ?>
                            <tr>
                                <td style="text-align:left;">--- <?=$pod_menu['goods_name_menu'];?></td>
                                <?php
                                if ($pod_menu['active_status_menu']==1) {
                                    $active_status_pod_menu="Подменю активно";
                                } elseif ($pod_menu['active_status_menu']==0) {
                                    $active_status_pod_menu="Подменю неактивно";
                                }
                                ?>
                                <td style="text-align:left;">--- <?=$active_status_pod_menu;?></td>
                                <td style="text-align:left;">
                                    <a href="<?=Config::$root;?>/menu_goods/edit_admin_menu_goods/?id=<?=$pod_menu['id'];?>">Изменить подменю</a>
                                    <?php
                                    if (count($menu['pod_menu'])!=1) {
                                        if ($menu['min_pos']==$pod_menu['pos_pod_menu']) {
                                            ?>
                                            <a href="<?=Config::$root;?>/menu_goods/down_admin_pod_menu_goods/?id=<?=$pod_menu['id'];?>">Опустить подменю</a>
                                        <?php } elseif ($menu['max_pos']==$pod_menu['pos_pod_menu']) { ?>
                                            <a href="<?=Config::$root;?>/menu_goods/up_admin_pod_menu_goods/?id=<?=$pod_menu['id'];?>">Поднять подменю</a>
                                        <?php } else { ?>
                                            <a href="<?=Config::$root;?>/menu_goods/down_admin_pod_menu_goods/?id=<?=$pod_menu['id'];?>">Опустить подменю</a>
                                            <a href="<?=Config::$root;?>/menu_goods/up_admin_pod_menu_goods/?id=<?=$pod_menu['id'];?>">Поднять подменю</a>
                                        <?php }} ?>
                                    <a href="<?=Config::$root;?>/menu_goods/del_admin_menu_goods/?id=<?=$pod_menu['id'];?>" onclick ="return confirm('Вы действительно хотите удалить подменю?');">Удалить подменю</a>
                                </td>
                            </tr>
                        <?php }} ?>
                <?php } ?>
            </table>
        </div>
        <p id="top_link"><a href="<?=Config::$root;?>/menu_goods/add_admin_menu_goods/">Добавить меню</a></p>
    <?php } ?>
</div>