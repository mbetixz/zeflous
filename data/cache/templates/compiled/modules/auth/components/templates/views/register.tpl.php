<?php
/* Smarty version 3.1.36, created on 2020-11-19 02:16:20
  from '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/modules/auth/components/templates/views/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5fb5d57439bd03_48212223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1244436ba69c1dd037250554fe0ee33c4066ebd1' => 
    array (
      0 => '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/modules/auth/components/templates/views/register.tpl',
      1 => 1605752178,
      2 => 'extends',
    ),
    'f3ec379c45974ce2e5a979c5b39167b8d471f442' => 
    array (
      0 => '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/modules/auth/components/templates/views/register.tpl',
      1 => 1605752178,
      2 => 'file',
    ),
    'af5824adbe7477fe72f33ca959403530b7d87eaa' => 
    array (
      0 => '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/base.tpl',
      1 => 1605022984,
      2 => 'file',
    ),
    '97c4ce347a43a2c18ac2d27263166caae562e1f3' => 
    array (
      0 => '/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/left-sidebar.tpl',
      1 => 1604825968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:register.tpl' => 1,
    'file:system/base.tpl' => 1,
    'file:system/left-sidebar.tpl' => 1,
  ),
),false)) {
function content_5fb5d57439bd03_48212223 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->_subTemplateRender('file:register.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false, 'f3ec379c45974ce2e5a979c5b39167b8d471f442', 'content_5fb5d574239247_32110591');
$_smarty_tpl->inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender('file:system/base.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false, 'af5824adbe7477fe72f33ca959403530b7d87eaa', 'content_5fb5d5742f8085_51456795');
}
/* Start inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/modules/auth/components/templates/views/register.tpl" =============================*/
function content_5fb5d574239247_32110591 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19835731425fb5d57424bd49_08195484', 'body');
}
/* {block 'body'} */
class Block_19835731425fb5d57424bd49_08195484 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_19835731425fb5d57424bd49_08195484',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/plugins/function.translate.php','function'=>'smarty_function_translate',),1=>array('file'=>'/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/plugins/function.HTMLinput.php','function'=>'smarty_function_HTMLinput',),2=>array('file'=>'/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/plugins/function.HTMLselect.php','function'=>'smarty_function_HTMLselect',),3=>array('file'=>'/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/plugins/function.HTMLcheckbox.php','function'=>'smarty_function_HTMLcheckbox',),));
?>

<?php echo smarty_function_translate(array('import'=>'register','set'=>true),$_smarty_tpl);?>

<section layout-name=register>
	<form name=register method=post>
		<ul>
			<li>
				<?php echo smarty_function_HTMLinput(array('label'=>lng('Name'),'name'=>'name','type'=>'text','minlength'=>3,'maxlength'=>15,'desc'=>lng("Min:3 &amp; Max:15 Characters"),'required'=>'required'),$_smarty_tpl);?>

			</li>
			<li>
				<?php echo smarty_function_HTMLinput(array('label'=>lng('Fullname'),'name'=>'fullname','type'=>'text','minlength'=>3,'maxlength'=>30,'desc'=>lng("Min:3 &amp; Max:30 Characters"),'required'=>'required'),$_smarty_tpl);?>

			</li>
			<li>
				<?php echo smarty_function_HTMLinput(array('label'=>lng('Email Address'),'name'=>'email','type'=>'text','minlength'=>6,'maxlength'=>30,'desc'=>lng("Please enter valid email address"),'required'=>'required'),$_smarty_tpl);?>

			</li>
			<li>
				<?php echo smarty_function_HTMLinput(array('label'=>lng('Password'),'name'=>'password','type'=>'password','minlength'=>8,'maxlength'=>30,'desc'=>lng("Please enter strongest password"),'required'=>'required'),$_smarty_tpl);?>

			</li>
			<li>
				<?php echo smarty_function_HTMLinput(array('label'=>lng('Retype Password'),'name'=>'repassword','type'=>'password','minlength'=>8,'maxlength'=>30,'desc'=>lng("Please confirm password"),'required'=>'required'),$_smarty_tpl);?>

			</li>
			<li>
				<?php echo smarty_function_HTMLselect(array('label'=>lng('Gender'),'name'=>'gender','data'=>array(''=>lng('Please select'),'m'=>lng('Male'),'w'=>lng('Female')),'desc'=>lng("Please enter strongest password"),'required'=>'required'),$_smarty_tpl);?>

			</li>
			<li>
				<?php echo smarty_function_HTMLcheckbox(array('label'=>lng('Term &amp; Services'),'name'=>'term','desc'=>lng("By clicking submit button, you agree with term &amp; service this site."),'required'=>'required'),$_smarty_tpl);?>

			</li>
			<li>

			</li>
		</ul>
	</form>
</section>
<?php
}
}
/* {/block 'body'} */
/* End inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/modules/auth/components/templates/views/register.tpl" =============================*/
/* Start inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/left-sidebar.tpl" =============================*/
function content_5fb5d574317586_60105848 (Smarty_Internal_Template $_smarty_tpl) {
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
function content_5fb5d5742f8085_51456795 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->_subTemplateRender("file:system/left-sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false, '97c4ce347a43a2c18ac2d27263166caae562e1f3', 'content_5fb5d574317586_60105848');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15629740945fb5d57434bf39_39719760', 'css');
?>

<title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16683398055fb5d57434fdb9_65217507', 'title');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9752249055fb5d574389b73_55395456', 'body');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19641933355fb5d574391ce7_21615331', 'javascript');
?>

<?php echo smarty_modifier_benchmark(false);?>

</body>
</html><?php
}
/* {block 'css'} */
class Block_15629740945fb5d57434bf39_39719760 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'css' => 
  array (
    0 => 'Block_15629740945fb5d57434bf39_39719760',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'css'} */
/* {block 'title'} */
class Block_16683398055fb5d57434fdb9_65217507 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_16683398055fb5d57434fdb9_65217507',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Zeflous CMS<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_9752249055fb5d574389b73_55395456 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_9752249055fb5d574389b73_55395456',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'javascript'} */
class Block_19641933355fb5d574391ce7_21615331 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'javascript' => 
  array (
    0 => 'Block_19641933355fb5d574391ce7_21615331',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'javascript'} */
/* End inline template "/storage/9F59-0903/Android/data/com.termux/files/mbetixz/project/Zeflous/system/components/templates/views/system/base.tpl" =============================*/
}
