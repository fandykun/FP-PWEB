jQuery(document).ready(function($){
    $(".carousel-control-next").on('click',(function(e) {
        $(".carousel-item.active").toggleClass('active');
	    $(".carousel-item").toggleClass('btn-default');
    }));
});