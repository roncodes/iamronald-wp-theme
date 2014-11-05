$(document).ready(function() {
    $('#footer li a img').hover(function() {
    	$(this).addClass('animated bounce');
    }).mouseout(function() {
    	$(this).removeClass('animated bounce');
    });
    $('#sidenav-toggle').click(function(e) {
    	e.preventDefault();
    	if($('#sidenav').data('state') == 'closed') {
    		$('#sidenav').animate({'right': '0px', 'opacity': '1'}, 100);
    		$('#sidenav').data('state', 'open');
    	} else {
    		$('#sidenav').animate({'right': '-400px', 'opacity': '0'}, 100);
    		$('#sidenav').data('state', 'closed');
    	}
    });
});