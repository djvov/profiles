<?php
/* Smarty version 3.1.33, created on 2019-07-01 16:02:01
  from '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Profiles/Edit/Edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d19e82920f3b2_92831482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1e714fe442446cd2949ac8fc458a3611306d89c' => 
    array (
      0 => '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Profiles/Edit/Edit.tpl',
      1 => 1561978917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d19e82920f3b2_92831482 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="https://unpkg.com/imask"><?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->tpl_vars['js']->value;?>


<?php if ($_smarty_tpl->tpl_vars['id']->value == 0) {?>
    <h2>Добавление</h2>
<?php } else { ?>
    <h2>Редактирование</h2>
    <?php $_smarty_tpl->_assignInScope('profile', $_smarty_tpl->tpl_vars['profiles']->value->current());?>
    <?php $_smarty_tpl->_assignInScope('phones', $_smarty_tpl->tpl_vars['profile']->value->getPhones());?>
    <?php $_smarty_tpl->_assignInScope('emails', $_smarty_tpl->tpl_vars['profile']->value->getEmails());
}?>
<form method="post" id="fmEdit" action="/">
    <input type="hidden" name="profileId" id="profileId" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
    <input type="hidden" name="emailsMain" id="emailsMain" >
    <input type="hidden" name="phonesMain" id="phonesMain" >
    <div class="form-group">
        <label for="inpSurname">Фамилия</label>
        <input type="text" class="form-control" name="surname[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" id="inpSurname" placeholder="Фамилия" required="required" value="<?php if ($_smarty_tpl->tpl_vars['id']->value > 0) {
echo $_smarty_tpl->tpl_vars['profile']->value->getSurname();
}?>">
    </div>

    <div class="form-group">
        <label for="inpName">Имя</label>
        <input type="text" class="form-control" name="name[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" id="inpName" placeholder="Имя" required="required" value="<?php if ($_smarty_tpl->tpl_vars['id']->value > 0) {
echo $_smarty_tpl->tpl_vars['profile']->value->getName();
}?>">
    </div>

    <div class="form-group">
        <label for="inpPatronymic">Отчество</label>
        <input type="text" class="form-control" name="patronymic[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" id="inpPatronymic" placeholder="Отчество" required="required" value="<?php if ($_smarty_tpl->tpl_vars['id']->value > 0) {
echo $_smarty_tpl->tpl_vars['profile']->value->getPatronymic();
}?>">
    </div>

    <div class="form-group">
        <label>E-mail <a href="javascript:void(0)" onclick="addEmail(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);"><i class="fas fa-plus"></i></a></label>
        <div class="emails">
            <?php if (isset($_smarty_tpl->tpl_vars['emails']->value) && count('emails') > 0) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['emails']->value, 'email', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['email']->value) {
?>
                    <?php $_smarty_tpl->_assignInScope('key1', $_smarty_tpl->tpl_vars['key']->value+1);?>
                    <div class="email <?php if ($_smarty_tpl->tpl_vars['email']->value->getMain() == '1') {?> main<?php }?>" data-email-id="<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
">
                        <input type="email" class="form-control email-inp" value="<?php echo $_smarty_tpl->tpl_vars['email']->value->getEmail();?>
" name="email[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['email']->value->getId();?>
]">
                        <a class="email-main" href="javascript:void(0)" onclick="setMainEmail(this);"><i class="fas fa-check"></i></a>
                        <a class="email-del" href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить?')) deleteEmail(event);"><i class="fas fa-times"></i></a>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <div class="email main" data-email-id="1">
                    <input type="email" class="form-control email-inp" value="" name="email[0][add][]">
                    <a class="email-main" href="javascript:void(0)" onclick="setMainEmail(this);" ><i class="fas fa-check"></i></a>
                    <a class="email-del" href="#" onclick="if (confirm('Вы уверены, что хотите удалить?')) deleteEmail(event);"><i class="fas fa-times"></i></a>
                </div>
            <?php }?>
        </div>
    </div>

    <div class="form-group">
        <label>Телефоны <a href="javascript:void(0)" onclick="addPhone(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
);"><i class="fas fa-plus"></i></a></label>
        <div class="phones">
            <?php if (isset($_smarty_tpl->tpl_vars['phones']->value) && count($_smarty_tpl->tpl_vars['phones']->value) > 0) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['phones']->value, 'phone', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['phone']->value) {
?>
                    <?php $_smarty_tpl->_assignInScope('key1', $_smarty_tpl->tpl_vars['key']->value+1);?>
                    <div class="row phone <?php if ($_smarty_tpl->tpl_vars['phone']->value->getMain() == '1') {?> main<?php }?>" data-phone-id="<?php echo $_smarty_tpl->tpl_vars['key1']->value;?>
">
                        <div class="col-12 col-md-6">
                            <input type="tel" class="form-control phone-inp" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value->getPhone();?>
" name="phone[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['phone']->value->getId();?>
]">
                            <a class="email-main" href="javascript:void(0)" onclick="setMainPhone(this);"><i class="fas fa-check"></i></a>
                            <a class="email-del" href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить?')) deletePhone(event);"><i class="fas fa-times"></i></a>
                        </div>
                        <div class="col-12 col-md-6">
                            <select class="form-control" name="phone_type[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['phone']->value->getId();?>
]"  required="required">
                                <option value="0"></option>
                                <?php echo $_smarty_tpl->tpl_vars['phone_types']->value->rewind();?>

                                <?php
 while ($_smarty_tpl->tpl_vars['phone_types']->value->valid()) {?>
                                    <?php $_smarty_tpl->_assignInScope('phone_type', $_smarty_tpl->tpl_vars['phone_types']->value->current());?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['phone_type']->value->getId();?>
" <?php if (isset($_smarty_tpl->tpl_vars['phone']->value) && $_smarty_tpl->tpl_vars['phone_type']->value->getId() == $_smarty_tpl->tpl_vars['phone']->value->getPhoneTypeId()) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['phone_type']->value->getName();?>
</option>
                                    <?php $_smarty_tpl->_assignInScope('name1', $_smarty_tpl->tpl_vars['phone_types']->value->next());?>
                                <?php }?>

                            </select>
                        </div>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <div class="row phone main" data-phone-id="1">
                    <div class="col-12 col-md-6">
                        <input type="tel" class="form-control phone-inp" value="" name="phone[0][add][]">
                        <a class="email-main" href="javascript:void(0)" onclick="setMainPhone(this);"><i class="fas fa-check"></i></a>
                        <a class="email-del" href="javascript:void(0)" onclick="if (confirm('Вы уверены, что хотите удалить?')) deletePhone(event);"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="col-12 col-md-6">
                        <select class="form-control" name="phone_type[0][add][]" required="required" >
                            <option value="0"></option>
                            <?php echo $_smarty_tpl->tpl_vars['phone_types']->value->rewind();?>

                            <?php
 while ($_smarty_tpl->tpl_vars['phone_types']->value->valid()) {?>
                                <?php $_smarty_tpl->_assignInScope('phone_type', $_smarty_tpl->tpl_vars['phone_types']->value->current());?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['phone_type']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['phone_type']->value->getName();?>
</option>
                                <?php $_smarty_tpl->_assignInScope('name1', $_smarty_tpl->tpl_vars['phone_types']->value->next());?>
                            <?php }?>

                        </select>
                    </div>
                </div>
            <?php }?>
        </div>

    </div>
    <div class="row buttons-edit">
        <div class="col-7 col-md-3 text-left text-md-left">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Сохранить</button>
        </div>
        <div class="col-5 col-md-3 text-right text-md-left">
            <a href="/" class="btn btn-secondary"><i class="fas fa-ban"></i> Назад</a>
        </div>
    </div>
</form>
<br><?php }
}
