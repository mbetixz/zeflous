<section name="searchbar">
	<form name="search" action="/search" method="post">
		<input type="search" name="search" minlength="3" maxlength="25" value="" placeholder="Search..."/>
		<button type="submit" name="submit"><i class="zi search"></i></button>
	</form>
</section>
<section name="menu">
{$userId = false}
{if {user userData=id}}
	{include file="system/user/right-sidebar-menu.tpl"}
{else}
	{include file="system/guest/login-box.tpl"}
{/if}
<footer layout-name="footer">
	<div>Copyright &copy; 2018-2020 <span class="zi logo">🤔</span></div>
	<div>Design by @mbetixz</div>
</footer>
</section>