<h3>Разделы</h3>
<?php include "message.tpl"; ?>
<?php include "pagination.tpl"; ?>
<p class="link_new">
    <a href="<?=$this->link_new?>">Добавить новый раздел</a>
</p>
<table class="info">
    <tr class="header">
        <td>ID</td>        
        <td>Название</td>        
        <td>Функции</td>
    </tr>
    <?php foreach ($this->table_data as $data) { ?>
    <tr>
        <td><?=$data["id"]?></td>
        <td><?=$data["title"]?></td>    
        <td>
            <a href="<?=$data["link_admin_edit"]?>">Редактировать</a>
            <br />
            <a href='<?=$data["link_admin_delete"]?>' onclick="return confirm('ВЫ уверены, что хотите удалить элемент?')">Удалить</a>
        </td>
    </tr>
    <?php } ?>
</table>