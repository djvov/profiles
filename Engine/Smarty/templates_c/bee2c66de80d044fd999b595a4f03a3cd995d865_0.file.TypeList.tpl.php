<?php
/* Smarty version 3.1.33, created on 2019-05-31 10:23:28
  from '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Phones/TypeList/TypeList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf0ba50d05b92_76262831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bee2c66de80d044fd999b595a4f03a3cd995d865' => 
    array (
      0 => '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Phones/TypeList/TypeList.tpl',
      1 => 1559278877,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf0ba50d05b92_76262831 (Smarty_Internal_Template $_smarty_tpl) {
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['phone_types']->value, 'phone_type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['phone_type']->value) {
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['phone_type']->value['name'];?>
</td>
                <td class="text-center td-edit"><a href="/Phones/TypeEdit/?id=<?php echo $_smarty_tpl->tpl_vars['phone_type']->value['id'];?>
"><i class="fas fa-edit"></i></a></td>
                <td class="text-center td-edit"><a href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить?')) deletePhoneType(<?php echo $_smarty_tpl->tpl_vars['phone_type']->value['id'];?>
, event);"><i class="fas fa-times"></i></a></td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
