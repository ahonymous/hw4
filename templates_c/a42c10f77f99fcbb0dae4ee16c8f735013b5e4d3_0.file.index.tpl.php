<?php /* Smarty version 3.1.27, created on 2015-11-01 19:47:32
         compiled from "/var/www/hw4.com/public_html/templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:121503879256365034c1f5d5_74894404%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a42c10f77f99fcbb0dae4ee16c8f735013b5e4d3' => 
    array (
      0 => '/var/www/hw4.com/public_html/templates/index.tpl',
      1 => 1446400047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121503879256365034c1f5d5_74894404',
  'variables' => 
  array (
    'users' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56365034c398d9_22671811',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56365034c398d9_22671811')) {
function content_56365034c398d9_22671811 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '121503879256365034c1f5d5_74894404';
?>
<html>
<head>
    <title>Home work #4</title>
</head>
<body>
    <h1>Index</h1>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>password in MD5</th>
            <th>email</th>
            <th>Register date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['users']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
            <td><?php echo $_smarty_tpl->tpl_vars['users']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['users']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['users']->value['password'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['users']->value['email'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['users']->value['data_reg'];?>
</td>
            <td><a href="/index.php?action=users&subaction=del&id=<?php echo $_smarty_tpl->tpl_vars['users']->value['id'];?>
"></td>
            <?php endfor; endif; ?>
        </tr>
    </tbody>
</table>
</body>
</html><?php }
}
?>