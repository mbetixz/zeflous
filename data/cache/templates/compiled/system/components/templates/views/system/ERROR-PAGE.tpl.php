<?php
/* Smarty version 3.1.36, created on 2020-11-12 16:44:24
  from '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/ERROR-PAGE.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fad666878bea4_51240498',
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
      1 => 1605022984,
      2 => 'file',
    ),
    'd08ce3952c5fdaa7f76dd4244d281a102dedc5b8' => 
    array (
      0 => '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/left-sidebar.tpl',
      1 => 1604825968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:system/ERROR-PAGE.tpl' => 1,
    'file:system/base.tpl' => 1,
    'file:system/left-sidebar.tpl' => 1,
  ),
),false)) {
function content_5fad666878bea4_51240498 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->_subTemplateRender('file:system/ERROR-PAGE.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false, '019cf68621c95aed3c664adb36918e4650ea4601', 'content_5fad66686ca0b1_68038936');
$_smarty_tpl->inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender('file:system/base.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false, 'cf188ccaf79d2715eaa4884e0268b2cd68412368', 'content_5fad66686f73d7_81901365');
}
/* Start inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/ERROR-PAGE.tpl" =============================*/
function content_5fad66686ca0b1_68038936 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9373887575fad66686d9417_33236697', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4251427035fad66686f0124_01240947', 'body');
}
/* {block 'title'} */
class Block_9373887575fad66686d9417_33236697 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9373887575fad66686d9417_33236697',
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
class Block_4251427035fad66686f0124_01240947 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4251427035fad66686f0124_01240947',
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
/* Start inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/left-sidebar.tpl" =============================*/
function content_5fad6668712826_82428000 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'zeflousLogo', null, null);?>
<span class="zi logo">
	<span class="path1"></span>
	<span class="path2"></span>
	<span class="path3"></span>
	<span class="path4"></span>
	<span class="path5"></span>
	<span class="path6"></span>
</span>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
<section name="left-sidebar-header">
	<section class="logo">
		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'zeflousLogo');?>

	</section>
</section>
<section name="left-sidebar-menu">
	<ul class="menu">
		<li>
			<a href="#">
				<i class="zi newspaper"></i>
				<strong>Site News</strong>
			</a>
			<ul>
				<li>Zeflous v1.0 Release</li>
				<li>Anounsment</li>
			</ul>
		</li>
		<li>
			<a href="#">
				<i class="zi bubbles"></i>
				<strong>Forum Disccusion</strong>
			</a>
			<ul>
				<li>Zeflous v1.0 Lounge</li>
				<li>[Help] How to create a module</li>
				<li>[Hot] New Module for social based</li>
			</ul>
		</li>
		<li>
			<a href="#">
				<i class="zi books"></i>
				<strong>Blog</strong>
			</a>
			<ul>
				<li>Tutorial Install Zeflous CMS</li>
				<li>PHP class create a module</li>
				<li>PHP Requirerments for install Zeflous CMS</li>
			</ul>
		</li>
		<li>
			<a href="#">
				<i class="zi download2"></i>
				<strong>Download</strong>
			</a>
			<ul>
				<li>Zeflous CMS Engine</li>
				<li>Module</li>
				<li>Plugins</li>
				<li>Themes</li>
				<li>Others</li>
			</ul>
		</li>
		<li>
			<a href="#">
				<i class="zi users"></i>
				<strong>Users</strong>
			</a>
			<ul>
				<li>New Registered</li>
				<li>List Users</li>
				<li>Search</li>
			</ul>
		</li>
	</ul>
</section><?php
}
/* End inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/left-sidebar.tpl" =============================*/
/* Start inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/base.tpl" =============================*/
function content_5fad66686f73d7_81901365 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/plugins/modifier.benchmark.php','function'=>'smarty_modifier_benchmark',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'notifyNotifications', null, null);?>
<span class=notify>1</span>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'notifyMessages', null, null);?>
<span class=notify>1</span>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'notifyForums', null, null);?>
<span class=notify>1</span>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'leftSidebar', null, null);?>
	<?php
$_smarty_tpl->_subTemplateRender("file:system/left-sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false, 'd08ce3952c5fdaa7f76dd4244d281a102dedc5b8', 'content_5fad6668712826_82428000');
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'rightSidebar', null, null);?>
Right Sidebar
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'dropdownNotifications', null, null);?>
<ul>
	<li>Notifications</li>
	<li>
		<ul>
			<li>Testt ahjsjjss sjsjsjsjs sjjj</li>
		</ul>
	</li>
	<li>See All Notifications</li>
</ul>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'dropdownMessages', null, null);?>
<ul>
	<li>Messages</li>
	<li>
		<ul>
			<li>Testt ahjsjjss sjsjsjsjs sjjj</li>
		</ul>
	</li>
	<li>See All Messages</li>
</ul>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'dropdownForums', null, null);?>
<ul>
	<li>Forum Replys</li>
	<li>
		<ul>
			<li>Testt ahjsjjss sjsjsjsjs sjjj</li>
		</ul>
	</li>
	<li>See All Replys</li>
</ul>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<meta name=viewport content="width=window-width,initial-scale=1.0">
<meta name=MobileOptimized content=width>
<meta name=HandheldFriendly content=true>
<meta content=yes name=apple-mobile-web-app-capable>
<link rel=stylesheet href=/assets/styles/themes/dark/main.css>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_898553735fad6668737964_65911891', 'css');
?>

<title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9297404425fad666873be70_53295008', 'title');
?>
</title>
</head>
<body>
<main layout-name=main>
	<aside layout-name=left-sidebar>
		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'leftSidebar');?>

	</aside>
	<section layout-name=content>
		<div class=progress><div class=progress-bar style="animation-duration:<?php echo smarty_modifier_benchmark(true);?>
"><div class=progress-shadow></div></div></div>
		<header layout-name=header>
			<ul class=nav>
				<li data-toggle=sidebar toggle=leftsidebar><i class="zi bar"></i></li>
				<li class=logo>
					<a href="/">
						<span class="zi logo">🤔</span>
					</a>
				</li>
				<li class=dropdown>
					<ul class=head-nav>
						<li>
							<a data-toggle=head-dropdown href="#">
								<i class="zi public"></i>
								<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'notifyNotifications');?>

							</a>
							<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'dropdownNotifications');?>

						</li>
						<li>
							<a data-toggle=head-dropdown href="#">
								<i class="zi chat"></i>
								<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'notifyMessages');?>

							</a>
							<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'dropdownMessages');?>

						</li>
						<li>
							<a data-toggle=head-dropdown href="#">
								<i class="zi question_answer"></i>
								<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'notifyForums');?>

							</a>
							<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'dropdownForums');?>

						</li>
					</ul>
				</li>
				<li data-toggle=sidebar toggle=rightsidebar><i class="zi dashboard"></i></li>
			</ul>
		</header>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9955637215fad6668777568_61357781', 'body');
?>

	</section>
	<aside layout-name=right-sidebar>
		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'rightSidebar');?>

	</aside>
</main>
<?php echo '<script'; ?>
 src=/assets/styles/plugins/jquery/jquery.min.js><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src=/assets/styles/js/default.main.js><?php echo '</script'; ?>
>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14103953475fad6668780b49_03298131', 'javascript');
?>

<?php echo smarty_modifier_benchmark(false);?>

</body>
</html><?php
}
/* {block 'css'} */
class Block_898553735fad6668737964_65911891 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css' => 
  array (
    0 => 'Block_898553735fad6668737964_65911891',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'css'} */
/* {block 'title'} */
class Block_9297404425fad666873be70_53295008 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9297404425fad666873be70_53295008',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Zeflous CMS<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_9955637215fad6668777568_61357781 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_9955637215fad6668777568_61357781',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'javascript'} */
class Block_14103953475fad6668780b49_03298131 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_14103953475fad6668780b49_03298131',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'javascript'} */
/* End inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/base.tpl" =============================*/
}
