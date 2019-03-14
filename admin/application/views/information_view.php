<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 16.12.2017
 * Time: 21:40
 */
?>
<div class="right_content">
    <p id="top_link"><a href="<?=Config::$root;?>/information/add_admin_information/">Добавить информацию</a></p>
    <?php if (!empty($data)) { ?>
        <div>
            <table>
                <tr>
                    <th>Название пункта меню</th>
                    <th>Ссылка пункта меню</th>
                    <th>Содержание пункта меню</th>
                    <th>Активность пункта меню</th>
                    <th>Действия над пунктом меню</th>
                </tr>
                <?php foreach ($data as $info) { ?>
                    <tr>
                        <td><?=$info['link_name'];?></td>
                        <td><?=$info['link'];?></td>
                        <td><?=$info['content'];?></td>
                        <?php
                            if ($info['active_status']==1) {
                                $active_status="Меню активно";
                            } elseif ($info['active_status']==0) {
                                $active_status="Меню неактивно";
                            }
                        ?>
                        <td><?=$active_status;?></td>
                        <td>
                            <a href="<?=Config::$root;?>/information/edit_admin_information/?id=<?=$info['id'];?>">Изменить</a>
                            <a href="<?=Config::$root;?>/information/del_admin_information/?id=<?=$info['id'];?>" onclick ="return confirm('Вы действительно хотите удалить целый раздел?');">Удалить</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <p id="bottom_link"><a href="<?=Config::$root;?>/information/add_admin_information/">Добавить информацию</a></p>
    <?php } ?>
</div>