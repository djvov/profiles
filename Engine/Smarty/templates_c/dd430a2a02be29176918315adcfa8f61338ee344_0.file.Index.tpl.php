<?php
/* Smarty version 3.1.33, created on 2019-05-31 10:19:41
  from '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Index/Index/Index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf0b96d3dcbd5_70569565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd430a2a02be29176918315adcfa8f61338ee344' => 
    array (
      0 => '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Index/Index/Index.tpl',
      1 => 1559278377,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf0b96d3dcbd5_70569565 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['js']->value;?>


<h2>Профили <a href="/Profiles/Edit/?id=0"><i class="fas fa-plus"></i></a></h2>

<p align="right"><a href="/Phones/TypeList"><i class="fas fa-phone-volume"></i> Типы телефонов</a></p>

<?php if (($_smarty_tpl->tpl_vars['saved']->value > 0)) {?>
    <div class="alert alert-success" role="alert">
        Сохранено успешно
    </div>
<?php }?>

<table class="profiles-table table table-striped table-hover">
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
                <td class="td-fio"><?php echo $_smarty_tpl->tpl_vars['profile']->value['surname'];?>
</td>
                <td class="td-fio"><?php echo $_smarty_tpl->tpl_vars['profile']->value['name'];?>
</td>
                <td class="td-fio"><?php echo $_smarty_tpl->tpl_vars['profile']->value['patronymic'];?>
</td>
                <td class="td-mail">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['emails'], 'email');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['email']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['email']->value['main'] == 1) {?><b><?php }?><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['email']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['email']->value['email'];?>
</a><?php if ($_smarty_tpl->tpl_vars['email']->value['main'] == 1) {?></b><?php }?> <br>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </td>
                <td class="td-phone">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['phones'], 'phone');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['phone']->value) {
?>
                        <div class="row <?php if ($_smarty_tpl->tpl_vars['phone']->value['main'] == 1) {?>main-phone<?php }?>">
                            <div class="col-7"><a href="tel:<?php echo $_smarty_tpl->tpl_vars['phone']->value['phone'];?>
"><?php echo $_smarty_tpl->tpl_vars['phone']->value['phone'];?>
</a></div>
                            <div class="col-5 text-right"><?php echo $_smarty_tpl->tpl_vars['phone']->value['phone_type']['name'];?>
</div>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </td>
                <td class="text-center td-edit"><a href="/Profiles/Edit/?id=<?php echo $_smarty_tpl->tpl_vars['profile']->value['id'];?>
"><i class="fas fa-edit"></i></a></td>
                <td class="text-center td-edit"><a href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить профиль?')) deleteProfile(<?php echo $_smarty_tpl->tpl_vars['profile']->value['id'];?>
, event);"><i class="fas fa-times"></i></a></td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table><?php }
}
