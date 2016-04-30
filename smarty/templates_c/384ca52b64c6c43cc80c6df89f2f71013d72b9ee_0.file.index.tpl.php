<?php
/* Smarty version 3.1.28, created on 2016-03-09 10:46:05
  from "/private/var/www/blog/views/index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_56df643d36de02_21797182',
  'file_dependency' => 
  array (
    '384ca52b64c6c43cc80c6df89f2f71013d72b9ee' => 
    array (
      0 => '/private/var/www/blog/views/index.tpl',
      1 => 1457480759,
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
function content_56df643d36de02_21797182 ($_smarty_tpl) {
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


<?php if ($_smarty_tpl->tpl_vars['loggedIn']->value) {?>
<div class="container">
    <form id="blog-post" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Make new post</h3>
            </div>
            <div class="panel-body">
                <label>Title:</label>
                <br />
                <input required name="title" type="text" maxlength="50" placeholder=" Title" style="width: 30%;" />
                <br />
                <br />
                <label>Content:</label>
                <div>
                    <textarea required name="content" maxlength="20000" placeholder="Content" class="form-control" rows="5" style="width: 60%;"></textarea>
                </div>
                <br />
                <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" name="submit">Post!</button>
                </span>
            </div>
        </div>
    </form>
</div>
<?php }?>

<?php
$_from = $_smarty_tpl->tpl_vars['reviews']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_post_0_saved_item = isset($_smarty_tpl->tpl_vars['post']) ? $_smarty_tpl->tpl_vars['post'] : false;
$_smarty_tpl->tpl_vars['post'] = new Smarty_Variable();
$__foreach_post_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_post_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$__foreach_post_0_saved_local_item = $_smarty_tpl->tpl_vars['post'];
?>
    <br />
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['post']->value->getTitle();?>
</h3>
                <h6 class="panel-title"><small>By <?php echo $_smarty_tpl->tpl_vars['post']->value->getCreator()->getUsername();?>
</small></h6>
            </div>
            <div class="panel-body"><?php echo $_smarty_tpl->tpl_vars['post']->value->getContent();?>
</div>
            <div class="panel-body"><strong>Submitted by <?php echo $_smarty_tpl->tpl_vars['post']->value->getCreator()->getUsername();?>
, <?php echo $_smarty_tpl->tpl_vars['post']->value->getTimestamp();?>
</strong></div>
            <?php if ($_smarty_tpl->tpl_vars['loggedIn']->value && $_smarty_tpl->tpl_vars['user']->value->getId() === $_smarty_tpl->tpl_vars['post']->value->getCreator()->getId()) {?>
                <div class="panel-body">
                    <form id="delete-post" method="post">
                        <button class="btn btn-danger" name="delete" value="<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
">Delete post</button>
                    </form>
                </div>
            <?php }?>
        </div>
    </div>
<?php
$_smarty_tpl->tpl_vars['post'] = $__foreach_post_0_saved_local_item;
}
}
if ($__foreach_post_0_saved_item) {
$_smarty_tpl->tpl_vars['post'] = $__foreach_post_0_saved_item;
}
?>


</body>

<?php echo '<script'; ?>
 src="http://127.0.0.1:23232/blog/dist/sweetalert.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="http://127.0.0.1:23232/blog/dist/sweetalert.css">


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
