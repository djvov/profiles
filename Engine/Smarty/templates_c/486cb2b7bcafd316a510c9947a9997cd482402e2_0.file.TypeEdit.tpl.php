<?php
/* Smarty version 3.1.33, created on 2019-07-02 14:29:36
  from '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Phones/TypeEdit/TypeEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d1b2400739ef2_82627243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '486cb2b7bcafd316a510c9947a9997cd482402e2' => 
    array (
      0 => '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Phones/TypeEdit/TypeEdit.tpl',
      1 => 1562059763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d1b2400739ef2_82627243 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['id']->value == 0) {?>
    <h2>Добавление</h2>
<?php } else { ?>
    <h2>Редактирование</h2>
    <?php $_smarty_tpl->_assignInScope('phone_type', $_smarty_tpl->tpl_vars['phone_types']->value->current());
}?>

<form method="post" id="fmEdit" action="/Phones/TypeList">
    <input type="hidden" name="typeId" id="typeId" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
    <div class="form-group">
        <label for="inpSurname">Название</label>
        <input type="text" class="form-control" name="typeName[<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
]" id="inpTypeName" placeholder="Название" required="required" value="<?php if (isset($_smarty_tpl->tpl_vars['phone_type']->value)) {
echo $_smarty_tpl->tpl_vars['phone_type']->value->getName();
}?>">
    </div>
    <div class="row buttons-edit">
        <div class="col-7 col-md-3 text-left text-md-left">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Сохранить</button>
        </div>
        <div class="col-5 col-md-3 text-right text-md-left">
            <a href="/Phones/TypeList" class="btn btn-secondary"><i class="fas fa-ban"></i> Назад</a>
        </div>
    </div>
</form>
<br><?php }
}
