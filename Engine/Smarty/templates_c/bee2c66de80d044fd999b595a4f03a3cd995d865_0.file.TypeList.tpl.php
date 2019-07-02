<?php
/* Smarty version 3.1.33, created on 2019-07-01 12:04:30
  from '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Phones/TypeList/TypeList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d19b07e38f666_89571508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bee2c66de80d044fd999b595a4f03a3cd995d865' => 
    array (
      0 => '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Phones/TypeList/TypeList.tpl',
      1 => 1561921653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d19b07e38f666_89571508 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['js']->value;?>


<h2>Типы телефонов <a href="/Phones/TypeEdit/?id=0"><i class="fas fa-plus"></i></a></h2>

<p align="right"><a href="/"><i class="fas fa-users"></i> Профили</a></p>

<?php if (($_smarty_tpl->tpl_vars['saved']->value > 0)) {?>
    <div class="alert alert-success" role="alert">
        Сохранено успешно
    </div>
<?php }?>


<table class="phones-table table table-striped table-hover">
    <thead>
        <tr>
            <th>Название</th>
            <th class="text-center">Изменить</th>
            <th class="text-center">Удалить</th>
        </tr>
    </thead>
    <tbody>
        <?php echo $_smarty_tpl->tpl_vars['phone_types']->value->rewind();?>

        <?php
 while ($_smarty_tpl->tpl_vars['phone_types']->value->valid()) {?>
            <?php $_smarty_tpl->_assignInScope('phone_type', $_smarty_tpl->tpl_vars['phone_types']->value->current());?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['phone_type']->value->getName();?>
</td>
                <td class="text-center td-edit"><a href="/Phones/TypeEdit/?id=<?php echo $_smarty_tpl->tpl_vars['phone_type']->value->getId();?>
"><i class="fas fa-edit"></i></a></td>
                <td class="text-center td-edit"><a href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить?')) deletePhoneType(<?php echo $_smarty_tpl->tpl_vars['phone_type']->value->getId();?>
, event);"><i class="fas fa-times"></i></a></td>
            </tr>
            <?php $_smarty_tpl->_assignInScope('name1', $_smarty_tpl->tpl_vars['phone_types']->value->next());?>
        <?php }?>

    </tbody>
</table><?php }
}
