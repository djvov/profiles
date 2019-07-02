<?php
/* Smarty version 3.1.33, created on 2019-07-01 15:00:21
  from '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Index/Index/Index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d19d9b55e3369_98750863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd430a2a02be29176918315adcfa8f61338ee344' => 
    array (
      0 => '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Index/Index/Index.tpl',
      1 => 1561975205,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d19d9b55e3369_98750863 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['js']->value;?>


<h2>Профили <a href="/Profiles/Edit/?id=0"><i class="fas fa-plus"></i></a></h2>

<p align="right"><a href="/Phones/TypeList"><i class="fas fa-phone-volume"></i> Типы телефонов</a></p>

<?php if (($_smarty_tpl->tpl_vars['saved']->value > 0)) {?>
    <div class="alert alert-success" role="alert">
        Сохранено успешно
    </div>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['profiles']->value->rewind();?>

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
 while ($_smarty_tpl->tpl_vars['profiles']->value->valid()) {?>
            <?php $_smarty_tpl->_assignInScope('profile', $_smarty_tpl->tpl_vars['profiles']->value->current());?>
            <?php $_smarty_tpl->_assignInScope('emails', $_smarty_tpl->tpl_vars['profile']->value->getEmails());?>
            <?php $_smarty_tpl->_assignInScope('phones', $_smarty_tpl->tpl_vars['profile']->value->getPhones());?>
            <tr>
                <td class="td-fio"><?php echo $_smarty_tpl->tpl_vars['profile']->value->getSurname();?>
</td>
                <td class="td-fio"><?php echo $_smarty_tpl->tpl_vars['profile']->value->getName();?>
</td>
                <td class="td-fio"><?php echo $_smarty_tpl->tpl_vars['profile']->value->getPatronymic();?>
</td>
                <td class="td-mail">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['emails']->value, 'email');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['email']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['email']->value->getMain() == 1) {?><b><?php }?><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['email']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['email']->value->getEmail();?>
</a><?php if ($_smarty_tpl->tpl_vars['email']->value->getMain() == 1) {?></b><?php }?> <br>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </td>
                <td class="td-phone">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['phones']->value, 'phone');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['phone']->value) {
?>
                        <div class="row <?php if ($_smarty_tpl->tpl_vars['phone']->value->getMain() == 1) {?>main-phone<?php }?>">
                            <div class="col-7"><a href="tel:<?php echo $_smarty_tpl->tpl_vars['phone']->value->getPhone();?>
"><?php echo $_smarty_tpl->tpl_vars['phone']->value->getPhone();?>
</a></div>
                            <div class="col-5 text-right"><?php echo $_smarty_tpl->tpl_vars['phone']->value->getPhoneTypeName();?>
</div>
                        </div>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </td>
                <td class="text-center td-edit"><a href="/Profiles/Edit/?id=<?php echo $_smarty_tpl->tpl_vars['profile']->value->getId();?>
"><i class="fas fa-edit"></i></a></td>
                <td class="text-center td-edit"><a href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить профиль?')) deleteProfile(<?php echo $_smarty_tpl->tpl_vars['profile']->value->getId();?>
, event);"><i class="fas fa-times"></i></a></td>
            </tr>
                <?php $_smarty_tpl->_assignInScope('name1', $_smarty_tpl->tpl_vars['profiles']->value->next());?>
        <?php }?>

    </tbody>
</table>

<?php }
}
