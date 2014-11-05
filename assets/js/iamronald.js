$(document).ready(function() {
    $('#footer li a img').hover(function() {
    	$(this).addClass('animated bounce');
    }).mouseout(function() {
    	$(this).removeClass('animated bounce');
    });
    $('#sidenav-toggle').click(function(e) {
    	e.preventDefault();
    	if($('#sidenav').data('state') == 'closed') {
    		$('#sidenav').animate({'right': '0px'}, 100);
    		$('#sidenav').data('state', 'open');
    	} else {
    		$('#sidenav').animate({'right': '-400px'}, 100);
    		$('#sidenav').data('state', 'closed');
    	}
    });
    $('.search-submit').replaceWith('<button type="submit" class="clear-btn search-submit"><i class="fa fa-search"></i></button>');
});