jQuery(function($){
    
    // For Pagination
    
    $('.pagination li a').addClass('page-link');
    
    if ($('.pagination li').has('span')) {
        var spanText = $('.pagination li span').text();
        $( '<a class="page-link active-a" href="#">' + spanText + '</a>' ).insertBefore( $('.pagination li span') );
        $('.pagination li span').remove('span');
        $('.pagination li a.active-a').parent('li').addClass('active');
    }
    
});
