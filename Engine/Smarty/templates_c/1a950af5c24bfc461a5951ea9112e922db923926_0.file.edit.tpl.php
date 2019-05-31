<?php
/* Smarty version 3.1.33, created on 2019-05-24 14:38:31
  from '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Profiles/edit/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce7bb97f19814_02911883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a950af5c24bfc461a5951ea9112e922db923926' => 
    array (
      0 => '/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Views/Profiles/edit/edit.tpl',
      1 => 1558689902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce7bb97f19814_02911883 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'/home/httpd/vhosts/djvov.ru/subdomains/test3/httpdocs/Engine/Smarty/plugins/modifier.debug_print_var.php','function'=>'smarty_modifier_debug_print_var',),));
echo $_smarty_tpl->tpl_vars['js']->value;?>


<?php $_smarty_tpl->_assignInScope('email_hide_to', array('GAV','TCHK'));?>
asd
<?php $_smarty_tpl->_assignInScope('dat1', "asd'sda");
$_smarty_tpl->_assignInScope('dat1', "asd'sda");
echo $_smarty_tpl->tpl_vars['vasya']->value;?>

<?php echo $_smarty_tpl->tpl_vars['dat']->value;?>

<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['dat1']->value);?>

<?php if ($_smarty_tpl->tpl_vars['dat1']->value == 126) {?>
    asd
<?php }
echo smarty_modifier_date_format(time(),"%D");?>

<?php if (isset($_smarty_tpl->tpl_vars['sent']->value)) {
} else { ?>
    <?php $_smarty_tpl->_assignInScope('sent', '12');
}
echo $_smarty_tpl->tpl_vars['sent']->value;?>

<?php echo smarty_modifier_debug_print_var($_smarty_tpl->tpl_vars['email_hide_to']->value);
}
}
