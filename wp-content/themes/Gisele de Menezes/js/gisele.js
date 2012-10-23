$(function() {
	$('#content img, img.attachment-thumbnail').each(function(){
		if(!$(this).parent().parent().hasClass('videos_item') && !$(this).hasClass('aligncenter')){
			var $deg = rotateCSS();
			$(this).css({
		      '-moz-transform': rotateCSS(),
		      '-webkit-transform': rotateCSS(),
		      '-o-transform': rotateCSS(),
		      'transform': rotateCSS()
		    });
		}
	});
	function rotateCSS(){
		var $i = 'rotate(';
		$i += Math.ceil(Math.random()*5)-3;
		$i += 'deg)';
		
		return $i;
	}
	
	$('input[type=text], textarea').blur(function(){
		$(this).addClass('success');
		if($(this).attr('aria-required') == 'true'){
			if($(this).val() == '') $(this).addClass('error').removeClass('success');
		}
	}).focus(function(){
		$(this).removeClass('success').removeClass('error');
	});
	
	$('a[rel*=lightbox]').lightBox({maxHeight: 550, maxWidth: 800});
});