<?php
/* Smarty version 3.1.33, created on 2019-05-28 10:17:43
  from '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Profiles/Edit/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cecc477e7ccb4_19965698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1a940dde9065a549f64f62081a87c6d63e2c6a0' => 
    array (
      0 => '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Profiles/Edit/edit.tpl',
      1 => 1559020661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cecc477e7ccb4_19965698 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['js']->value;?>


<?php if ($_smarty_tpl->tpl_vars['id']->value == 0) {?>
    <h2>Добавление</h2>
<?php } else { ?>
    <h2>Редактирование</h2>
<?php }?>

<form method="post" id="fmEdit" action="">
    <div class="form-group">
        <label for="inpSurname">Фамилия</label>
        <input type="text" class="form-control" id="inpSurname" placeholder="Фамилия" required="required" value="<?php if (isset($_smarty_tpl->tpl_vars['profiles']->value[0])) {
echo $_smarty_tpl->tpl_vars['profiles']->value[0]['surname'];
}?>">
    </div>

    <div class="form-group">
        <label for="inpName">Имя</label>
        <input type="text" class="form-control" id="inpName" placeholder="Имя" required="required" value="<?php if (isset($_smarty_tpl->tpl_vars['profiles']->value[0])) {
echo $_smarty_tpl->tpl_vars['profiles']->value[0]['name'];
}?>">
    </div>

    <div class="form-group">
        <label for="inpPatronymic">Отчество</label>
        <input type="text" class="form-control" id="inpPatronymic" placeholder="Отчество" required="required" value="<?php if (isset($_smarty_tpl->tpl_vars['profiles']->value[0])) {
echo $_smarty_tpl->tpl_vars['profiles']->value[0]['patronymic'];
}?>">
    </div>

    <div class="form-group">
        <label>E-mail <a href="#"><i class="fas fa-plus"></i></a></label>
        <div class="emails">
            <?php if (isset($_smarty_tpl->tpl_vars['profiles']->value[0]['emails']) && count($_smarty_tpl->tpl_vars['profiles']->value[0]['emails']) > 0) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profiles']->value[0]['emails'], 'email');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['email']->value) {
?>
                    <div class="email <?php if ($_smarty_tpl->tpl_vars['email']->value['main'] == '1') {?> main<?php }?>">
                        <input type="email" class="form-control email-inp" value="<?php echo $_smarty_tpl->tpl_vars['email']->value['email'];?>
" name="email[<?php echo $_smarty_tpl->tpl_vars['profiles']->value[0]['id'];?>
][<?php echo $_smarty_tpl->tpl_vars['email']->value['id'];?>
]">
                        <a class="email-main" href="/Profiles/SetMainEmail/?id=<?php echo $_smarty_tpl->tpl_vars['email']->value['id'];?>
" onclick="if (confirm('Are you sure?')) return true; else return false;"><i class="fas fa-check"></i></a>
                        <a class="email-del" href="/Profiles/DeleteEmail/?id=<?php echo $_smarty_tpl->tpl_vars['email']->value['id'];?>
" onclick="if (confirm('Are you sure?')) return true; else return false;"><i class="fas fa-times"></i></a>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <div class="email main">
                    <input type="email" class="form-control email-inp" value="" name="email[0][0]">
                    <a class="email-main" href="#" onclick="if (confirm('Are you sure?')) return true; else return false;"><i class="fas fa-check"></i></a>
                    <a class="email-del" href="#" onclick="if (confirm('Are you sure?')) return true; else return false;"><i class="fas fa-times"></i></a>
                </div>
            <?php }?>
        </div>
    </div>

    <div class="form-group">
        <label>Телефоны <a href="#"><i class="fas fa-plus"></i></a></label>
        <div class="phones">
            <?php if (isset($_smarty_tpl->tpl_vars['profiles']->value[0]['phones']) && count($_smarty_tpl->tpl_vars['profiles']->value[0]['phones']) > 0) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profiles']->value[0]['phones'], 'phone');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['phone']->value) {
?>
                <div class="row phone <?php if ($_smarty_tpl->tpl_vars['phone']->value['main'] == '1') {?> main<?php }?>">
                    <div class="col-12 col-md-6">
                        <input type="tel" class="form-control phone-inp" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value['phone'];?>
" name="phone[<?php echo $_smarty_tpl->tpl_vars['profiles']->value[0]['id'];?>
][<?php echo $_smarty_tpl->tpl_vars['phone']->value['id'];?>
]">
                        <a class="email-main" href="/Profiles/SetMainPhone/?id=<?php echo $_smarty_tpl->tpl_vars['phone']->value['id'];?>
" onclick="if (confirm('Are you sure?')) return true; else return false;"><i class="fas fa-check"></i></a>
                        <a class="email-del" href="/Profiles/DeletePhone/?id=<?php echo $_smarty_tpl->tpl_vars['phone']->value['id'];?>
" onclick="if (confirm('Are you sure?')) return true; else return false;"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="col-12 col-md-6">
                        <select class="form-control" name="phone_type[<?php echo $_smarty_tpl->tpl_vars['profiles']->value[0]['id'];?>
][<?php echo $_smarty_tpl->tpl_vars['phone']->value['id'];?>
]" >
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['phone_types']->value, 'phone_type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['phone_type']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['phone_type']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['phone']->value['phone_type']['id'] == $_smarty_tpl->tpl_vars['phone_type']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['phone_type']->value['name'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
                <div class="row phone main">
                    <div class="col-12 col-md-6">
                        <input type="tel" class="form-control phone-inp" value="" name="phone[0][0]">
                        <a class="email-main" href="#" onclick="if (confirm('Are you sure?')) return true; else return false;"><i class="fas fa-check"></i></a>
                        <a class="email-del" href="#" onclick="if (confirm('Are you sure?')) return true; else return false;"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="col-12 col-md-6">
                        <select class="form-control" name="phone_type[0][0]" >
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['phone_types']->value, 'phone_type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['phone_type']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['phone_type']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['phone_type']->value['name'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                </div>
            <?php }?>
        </div>

    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Сохранить</button>
</form><?php }
}
