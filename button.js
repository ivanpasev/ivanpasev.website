function showImages(el) {
        var windowHeight = jQuery( window ).height();
        $(el).each(function(){
            var thisPos = $(this).offset().top;

            var topOfWindow = $(window).scrollTop();
            if (topOfWindow + windowHeight - 200 > thisPos ) {				
                $(this).addClass("fadeIn");
            }
        });
    }

    // if the image in the window of browser when the page is loaded, show that image
    $(document).ready(function(){
            showImages('[id=bottomMenu]');
    });

    // if the image in the window of browser when scrolling the page, show that image
    $(window).scroll(function() {
            showImages('[id=bottomMenu]');
    });
	
	//smoothbehavior
	if(window.innerWidth <= 1026){
	$(document).on('click', 'a[href^="#"]', function (e) {
    e.preventDefault();
    $('html, body').stop().animate({
		scrollTop: $($(this).attr('href')).offset().top -50
    }, 1000, 'linear');	
});
	}
	else{
	$(document).on('click', 'a[href^="#"]', function (e) {
    e.preventDefault();
    $('html, body').stop().animate({
		scrollTop: $($(this).attr('href')).offset().top -5
    }, 1000, 'linear');	
});	
	}
	
