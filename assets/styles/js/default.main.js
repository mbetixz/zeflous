;(function($) {
	$('[data-toggle=sidebar]').on('click', function(e)
	{
		var $sidebar = $('[layout-name=main]');
		var $target  = $('section[layout-name=content]');
		$sidebar.toggleClass($(this).attr('toggle'));
		$(document.createElement('div'))
			.addClass('backdrop')
			.insertBefore($target)
			.on('click', function(e) {
				$(this).remove();
				$sidebar.toggleClass($(this).attr('toggle'));
			});
	});
	$('[data-toggle=head-dropdown]').on('click', function(e)
	{
		e.preventDefault();
		var $self = $(this);
		$self.addClass("active");
		$self.next().addClass("show");
		$(document.createElement('div'))
			.addClass('backdrop')
			.insertAfter($self)
			.on('click', function(e) {
				$(this).remove();
				$self.removeClass('active');
				$self.next().removeClass("show");
			});
	});
	setTimeout(function() {
		//alert($(window).height());
	},2000);
	$(".progress-bar").on("animationend",function(e) {
		var $parent = $(this).parent();
		$parent.slideUp(500);
	});
})(jQuery);