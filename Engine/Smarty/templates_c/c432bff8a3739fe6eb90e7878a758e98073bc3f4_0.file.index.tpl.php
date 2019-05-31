<?php
/* Smarty version 3.1.33, created on 2019-05-28 09:35:04
  from '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Index/Index/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cecba7876fa51_09372185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c432bff8a3739fe6eb90e7878a758e98073bc3f4' => 
    array (
      0 => '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Index/Index/index.tpl',
      1 => 1558979526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cecba7876fa51_09372185 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Профили</h2>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>E-mail</th>
            <th>Телефон</th>
            <th class="text-center">Изменить</th>
            <th class="text-center">Удалить</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profiles']->value, 'profile');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['profile']->value) {
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['profile']->value['surname'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['profile']->value['patronymic'];?>
</td>
                <td>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['emails'], 'email');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['email']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['email']->value['main'] == 1) {?><b><?php }
echo $_smarty_tpl->tpl_vars['email']->value['email'];
if ($_smarty_tpl->tpl_vars['email']->value['main'] == 1) {?></b><?php }?> <br>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </td>
                <td>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['phones'], 'phone');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['phone']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['phone']->value['main'] == 1) {?><b><?php }
echo $_smarty_tpl->tpl_vars['phone']->value['phone'];?>
, <?php echo $_smarty_tpl->tpl_vars['phone']->value['phone_type']['name'];
if ($_smarty_tpl->tpl_vars['phone']->value['main'] == 1) {?></b><?php }?> <br>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </td>
                <td class="text-center"><a href="/Profiles/Edit/?id=<?php echo $_smarty_tpl->tpl_vars['profile']->value['id'];?>
"><i class="fas fa-edit"></i></a></td>
                <td class="text-center"><a href="/Profiles/Delete/?id=<?php echo $_smarty_tpl->tpl_vars['profile']->value['id'];?>
" onclick="if (confirm('Are you sure?')) return true; else return false;"><i class="fas fa-times"></i></a></td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
