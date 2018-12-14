$(document).ready(function(){
    $('[rel=popover]').popover({
        html:true,
        placement:'bottom',
        content:function(){
            return $($(this).data('contentwrapper')).html();
        }
    });
});

// Enable popover everywhere with data-toggle
$(document).ready(function(){
    $('[data-toggle="popover"]').popover()
});