<?php
/* Smarty version 3.1.28, created on 2016-03-08 23:32:10
  from "/private/var/www/blog/views/blocks/navbar.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_56dec64a5a3155_04269094',
  'file_dependency' => 
  array (
    '62036b6e27894b47d08596bc657245d72f8f538d' => 
    array (
      0 => '/private/var/www/blog/views/blocks/navbar.tpl',
      1 => 1457440329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56dec64a5a3155_04269094 ($_smarty_tpl) {
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Blog</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="http://127.0.0.1:23232/blog"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                <li><a> </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?>
                    <li><a href="http://127.0.0.1:23232/blog/account"><span class="glyphicon glyphicon-user"></span> <?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
</a></li>
                    <li><a href="http://127.0.0.1:23232/blog/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login / Register<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://127.0.0.1:23232/blog/login">Login</a></li>
                            <li><a href="http://127.0.0.1:23232/blog/register">Register</a></li>
                        </ul>
                    </li>
                <?php }?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav><?php }
}
