<?php
/* Smarty version 3.1.28, created on 2016-03-12 12:47:13
  from "C:\wamp64\www\blog\views\account.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_56e37521a88ed6_56805035',
  'file_dependency' => 
  array (
    'c2d1615f81e6ff640fc417b4b936b44f78fe2ba1' => 
    array (
      0 => 'C:\\wamp64\\www\\blog\\views\\account.tpl',
      1 => 1457441864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:blocks/header.tpl' => 1,
    'file:blocks/css.tpl' => 1,
    'file:blocks/navbar.tpl' => 1,
    'file:blocks/js.tpl' => 1,
  ),
),false)) {
function content_56e37521a88ed6_56805035 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<head>
    <title>Blog</title>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container center-block">
    <div class="row">
        <form class="form-name col-center" method="post" style="width: 70%">
            <div class="">
                <h3>Username: <?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</h3>
                <div class="input-group">
                        <input type="text" required name="username" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" maxlength="30" class="form-control" placeholder="Change Username">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">Change!</button>
                        </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </form>
        <form class="form-email col-center" method="post" style="width: 70%">
            <div class="">
                <h3>Email: <?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</h3>
                <div class="input-group">
                    <input type="text" required name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" maxlength="50" class="form-control" placeholder="Change Email">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="submit">Change!</button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </form>
        <form class="form-password col-center" method="post" style="width: 70%">
            <div class="">
                <h3>Change Password:</h3>
                <div class="input-group">
                    <input type="password" required name="oldpassword" class="form-control" placeholder="Old Password">
                    <input type="password" required name="password" class="form-control" placeholder="New Password">
                    <input type="password" required name="confirmpassword" class="form-control" placeholder="Confirm Password">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="submit">Change!</button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </form>
    </div>
</div>

<?php echo '<script'; ?>
 src="http://127.0.0.1:23232/blog/dist/sweetalert.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="http://127.0.0.1:23232/blog/dist/sweetalert.css">



</body>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
    <?php echo '<script'; ?>
>
        $(function() {
            swal("Error!", "<?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
", "error");
        });
    <?php echo '</script'; ?>
>
<?php } elseif ($_smarty_tpl->tpl_vars['success']->value) {?>
    <?php echo '<script'; ?>
>
        $(function() {
            swal("Success!", "<?php echo $_smarty_tpl->tpl_vars['successMessage']->value;?>
", "success");
        });
    <?php echo '</script'; ?>
>
<?php }
}
}
