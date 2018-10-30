jQuery(function() {
	var $banner = $('#banner_wrap');

	$('.open_banner').hide();

	$('a.call_button.closed_banner, a#reduzir').click(function(e){
		e.preventDefault();
		toggleBanner();
	})

	function toggleBanner(){
		if($banner.hasClass('opened')){
			$('.open_banner').slideUp();
			$('.closed_banner').delay(800).slideDown('slow');
			$banner.removeClass('opened');
		}
		else{
			$('.open_banner').delay(800).fadeIn('slow');
			$('.closed_banner').slideUp();
			$banner.addClass('opened');
		}
	}
});