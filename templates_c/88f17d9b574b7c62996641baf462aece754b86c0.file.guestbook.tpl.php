<?php /* Smarty version Smarty-3.1.16, created on 2014-02-17 17:23:47
         compiled from "/home/ricblt/workspace/guestbook/templates/guestbook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1724467329530229836952d8-46099477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88f17d9b574b7c62996641baf462aece754b86c0' => 
    array (
      0 => '/home/ricblt/workspace/guestbook/templates/guestbook.tpl',
      1 => 1392642169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1724467329530229836952d8-46099477',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'data' => 0,
    'entry' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_530229837177f0_19039134',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530229837177f0_19039134')) {function content_530229837177f0_19039134($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/home/ricblt/workspace/guestbook/Smarty-3.1.16/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/ricblt/workspace/guestbook/Smarty-3.1.16/libs/plugins/modifier.date_format.php';
?>

<table border="0" width="300">
    <tr>
        <th colspan="2" bgcolor="#d1d1d1">
            Guestbook Entries (<a href="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=add">add</a>)</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars["entry"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["entry"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["entry"]->key => $_smarty_tpl->tpl_vars["entry"]->value) {
$_smarty_tpl->tpl_vars["entry"]->_loop = true;
?>
        <tr bgcolor="<?php echo smarty_function_cycle(array('values'=>"#dedede,#eeeeee",'advance'=>false),$_smarty_tpl);?>
">
            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['entry']->value['Name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
            <td align="right">
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['entry']->value['EntryDate'],"%e %b, %Y %H:%M:%S");?>
</td>
        </tr>
        <tr>
            <td colspan="2" bgcolor="<?php echo smarty_function_cycle(array('values'=>"#dedede,#eeeeee"),$_smarty_tpl);?>
">
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['entry']->value['Comment'], ENT_QUOTES, 'UTF-8', true);?>
</td>
        </tr>
        <?php }
if (!$_smarty_tpl->tpl_vars["entry"]->_loop) {
?>
        <tr>
            <td colspan="2">No records</td>
        </tr>
    <?php } ?>
</table><?php }} ?>
