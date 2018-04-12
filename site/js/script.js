jQuery(function($){
    
    // For Pagination /////////////////////////////////////////////////////////////////////////////
    
    $('.pagination li a').addClass('page-link');
    
    if ($('.pagination li').has('span')) {
        var spanText = $('.pagination li span').text();
        $( '<a class="page-link active-a" href="#">' + spanText + '</a>' ).insertBefore( $('.pagination li span') );
        $('.pagination li span').remove('span');
        $('.pagination li a.active-a').parent('li').addClass('active');
    }
    
    // Back to top ////////////////////////////////////////////////////////////////////////////////
    
    $('#back-to-top').click(function () {					
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
     
});
