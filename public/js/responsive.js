$(document).ready(function(){
    toggleSidebar();
});

$(window).resize(function() {

    toggleSidebar();

});

function toggleSidebar(){
    if ($(this).width() < 750) {
        $('.sidebar-container').hide();
    } 
    else {
        $('.sidebar-container').show();
    }
}