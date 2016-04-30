<?php
/* Smarty version 3.1.28, created on 2016-03-08 20:21:53
  from "/private/var/www/blog/views/login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_56de99b1d6f468_65283434',
  'file_dependency' => 
  array (
    '8f6b59956f82b64641f18f0d00d03da2bc0fd3fa' => 
    array (
      0 => '/private/var/www/blog/views/login.tpl',
      1 => 1457428911,
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
function content_56de99b1d6f468_65283434 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<head>
    <title>Blog::Login</title>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="login" style="width: 30%; margin: auto; padding-top: 7%;">
    <form class="form-signin" method="post">
        <h2 class="form-signin-heading" style="text-align:center">Log in</h2>
        <?php if ($_smarty_tpl->tpl_vars['failed']->value) {?>
            <div class="alert alert-danger" role="alert">Error: <?php echo $_smarty_tpl->tpl_vars['failMessage']->value;?>
</div>
        <?php }?>
        <input type="text" class="form-control" required autofocus name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" maxlength="30" placeholder="Username" />
        <input type="password" class="form-control" placeholder="Password" required name="password" />
        <p style="padding-top:20px;">
            <input class="btn btn-lg btn-info btn-block" type="submit" name="submit" value="Sign in" />
        </p>
    </form>
</div>
</body>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</html><?php }
}
