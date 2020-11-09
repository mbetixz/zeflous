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
{block name=css}{/block}
<title>{block name=title}Zeflous CMS{/block}</title>
</head>
<body>
<main layout-name="main">
	<aside layout-name="left-sidebar">
		{$smarty.capture.leftSidebar}
	</aside>
	<section layout-name="content">
		<div class="progress"><div class="progress-bar" style="animation-duration:{true|benchmark}"><div class="progress-shadow"></div></div></div>
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
								{$smarty.capture.notifynotifications}
							</a>
							{$smarty.capture.dropdownNotifications}
						</li>
						<li>
							<a data-toggle="head-dropdown" href="#">
								<i class="zi chat"></i>
								{$smarty.capture.notifymessages}
							</a>
							{$smarty.capture.dropdownMessages}
						</li>
						<li>
							<a data-toggle="head-dropdown" href="#">
								<i class="zi question_answer"></i>
								{$smarty.capture.notifyforums}
							</a>
							{$smarty.capture.dropdownForums}
						</li>
					</ul>
				</li>
				<li data-toggle="sidebar" toggle="rightsidebar"><i class="zi dashboard"></i></li>
			</ul>
		</header>
		{block name=body}{/block}
	</section>
	<aside layout-name="right-sidebar">
		{$smarty.capture.rightSidebar}
	</aside>
</main>
<script src="/assets/styles/plugins/jquery/jquery.min.js"></script>
<script src="/assets/styles/js/default.main.js"></script>
{block name=javascript}{/block}
{false|benchmark}
</body>
</html>
