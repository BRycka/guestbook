<?php /* Smarty version Smarty-3.1.16, created on 2014-02-17 17:25:23
         compiled from "/home/ricblt/workspace/guestbook/templates/guestbook_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:660299702530229e37b1972-13156168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7f374d66910f202444443cfda823774b6edb466' => 
    array (
      0 => '/home/ricblt/workspace/guestbook/templates/guestbook_form.tpl',
      1 => 1392642208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '660299702530229e37b1972-13156168',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SCRIPT_NAME' => 0,
    'error' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_530229e38344c0_66609008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530229e38344c0_66609008')) {function content_530229e38344c0_66609008($_smarty_tpl) {?>

<form action="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
?action=submit" method="post">
    <table border="1">
        <?php if ($_smarty_tpl->tpl_vars['error']->value!='') {?>
            <tr>
                <td bgcolor="yellow" colspan="2">
                    <?php if ($_smarty_tpl->tpl_vars['error']->value=="name_empty") {?>You must supply a name.
                    <?php } elseif ($_smarty_tpl->tpl_vars['error']->value=="comment_empty") {?> You must supply a comment.
                    <?php }?>
                </td>
            </tr>
        <?php }?>
        <tr>
            <td>Name:</td>
            <td>
                <input type="text" name="Name"
                       value="<?php //echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['Name'], ENT_QUOTES, 'UTF-8', true);?>
" size="40">
            </td>
        </tr>
        <tr>
            <td valign="top">Comment:</td>
            <td>
                <textarea name="Comment" cols="40" rows="10"><?php //echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value['Comment'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Submit">
            </td>
        </tr>
    </table>
</form>
<?php }} ?>
