$( function() {

	$('.fancybox').fancybox({
		openEffect: 'fade',
		closeEffect: 'fade',
		openSpeed: 400,
		closeSpeed: 400,
		helpers: {
			overlay: {
				locked: false
			}
		}
	});

	$('.slider').css('margin-top',$('header').innerHeight());
	$(window).resize(function(){
		$('.slider').css('margin-top',$('header').innerHeight());
	});

	var top = $(window).scrollTop();
	$(".linked_menu a").click(function () {
	    window.elementClick = $(this).attr("href");
	    window.destination = $(elementClick).offset().top;
	    jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination-70}, 600);

	    return false;
	});
  
	var $container = $('#destination');
	// init
	$container.isotope({
		// options
		itemSelector: '.item',
		masonry: {
	      gutter: 0
	    }
	});

	$('#source button').click(function(){
		$container.isotope({ filter: $(this).attr('data-filter') });
		$('#source button').removeClass('active');
		$(this).addClass('active');
	});
	
	window.onload = function () {
		$('#source button').eq(0).trigger('click');
	};

	$('.disabler').click(function(){
		$(this).hide();
	});
	$('#map').mouseleave(function(){
		$('.disabler').show();
	});
	
	jQuery('.carousel-inner').find('.item:first').addClass('active');
	jQuery('.carousel-indicators').find('li:first').addClass('active');
});