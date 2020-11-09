<?php
/* Smarty version 3.1.36, created on 2020-11-09 00:27:59
  from '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/ERROR-PAGE.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fa88d0f895ec5_58610352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9e5b39f729862d984ab1338920c8aab346c1d62' => 
    array (
      0 => '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/ERROR-PAGE.tpl',
      1 => 1604825968,
      2 => 'extends',
    ),
    '019cf68621c95aed3c664adb36918e4650ea4601' => 
    array (
      0 => '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/ERROR-PAGE.tpl',
      1 => 1604825968,
      2 => 'file',
    ),
    'cf188ccaf79d2715eaa4884e0268b2cd68412368' => 
    array (
      0 => '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/base.tpl',
      1 => 1604826736,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:system/ERROR-PAGE.tpl' => 1,
    'file:system/base.tpl' => 1,
  ),
),false)) {
function content_5fa88d0f895ec5_58610352 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->_subTemplateRender('file:system/ERROR-PAGE.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false, '019cf68621c95aed3c664adb36918e4650ea4601', 'content_5fa88d0f717dc5_34257857');
$_smarty_tpl->inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender('file:system/base.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false, 'cf188ccaf79d2715eaa4884e0268b2cd68412368', 'content_5fa88d0f77e608_29430497');
}
/* Start inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/ERROR-PAGE.tpl" =============================*/
function content_5fa88d0f717dc5_34257857 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3754299555fa88d0f737495_96015404', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2289865485fa88d0f774f82_54615249', 'body');
}
/* {block 'title'} */
class Block_3754299555fa88d0f737495_96015404 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_3754299555fa88d0f737495_96015404',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>

<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_2289865485fa88d0f774f82_54615249 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_2289865485fa88d0f774f82_54615249',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section name="error-content" align="center" class="error-page">
	<h1><?php echo $_smarty_tpl->tpl_vars['error_code']->value;?>
</h1>
	<p><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</p>
</section>
<?php
}
}
/* {/block 'body'} */
/* End inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/ERROR-PAGE.tpl" =============================*/
/* Start inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/base.tpl" =============================*/
function content_5fa88d0f77e608_29430497 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/plugins/modifier.benchmark.php','function'=>'smarty_modifier_benchmark',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=window-width,initial-scale=1.0">
<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
<meta content="yes" name="apple-mobile-web-app-capable">
<link rel="stylesheet" href="/assets/styles/themes/dark/default.css" />
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14919809765fa88d0f7878c4_21663180', 'css');
?>

<title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21257284735fa88d0f78cd60_84851321', 'title');
?>
</title>
</head>
<body>
<main layout-name="main">
	<aside layout-name="left-sidebar">
		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'leftSidebar');?>

	</aside>
	<section layout-name="content">
		<div class="progress"><div class="progress-bar" style="animation-duration:<?php echo smarty_modifier_benchmark(true);?>
"><div class="progress-shadow"></div></div></div>
		<header layout-name="header">
			<ul class="nav">
				<li data-toggle="sidebar" toggle="leftsidebar"><i class="zi bar"></i></li>
				<li class="logo">
					<a href="/">
						<span class="zi logo">🤔</span>
					</a>
				</li>
				<li class="dropdown">
					<ul class="head-nav">
						<li>
							<a data-toggle="head-dropdown" href="#">
								<i class="zi public"></i>
								<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'notifynotifications');?>

							</a>
							<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'dropdownNotifications');?>

						</li>
						<li>
							<a data-toggle="head-dropdown" href="#">
								<i class="zi chat"></i>
								<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'notifymessages');?>

							</a>
							<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'dropdownMessages');?>

						</li>
						<li>
							<a data-toggle="head-dropdown" href="#">
								<i class="zi question_answer"></i>
								<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'notifyforums');?>

							</a>
							<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'dropdownForums');?>

						</li>
					</ul>
				</li>
				<li data-toggle="sidebar" toggle="rightsidebar"><i class="zi dashboard"></i></li>
			</ul>
		</header>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14865964315fa88d0f86dc43_07653052', 'body');
?>

	</section>
	<aside layout-name="right-sidebar">
		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'rightSidebar');?>

	</aside>
</main>
<?php echo '<script'; ?>
 src="/assets/styles/plugins/jquery/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/assets/styles/js/default.main.js"><?php echo '</script'; ?>
>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5869970845fa88d0f881073_43232924', 'javascript');
?>

<?php echo smarty_modifier_benchmark(false);?>

</body>
</html>
<?php
}
/* {block 'css'} */
class Block_14919809765fa88d0f7878c4_21663180 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css' => 
  array (
    0 => 'Block_14919809765fa88d0f7878c4_21663180',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'css'} */
/* {block 'title'} */
class Block_21257284735fa88d0f78cd60_84851321 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_21257284735fa88d0f78cd60_84851321',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Zeflous CMS<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_14865964315fa88d0f86dc43_07653052 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_14865964315fa88d0f86dc43_07653052',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'javascript'} */
class Block_5869970845fa88d0f881073_43232924 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_5869970845fa88d0f881073_43232924',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'javascript'} */
/* End inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/base.tpl" =============================*/
}
