function resizeLeftMenu ()
{
	if (window.matchMedia('(min-width: 992px)').matches) {
	    var leftMenu = $('#exampleAccordion');
		$('.content-wrapper').css('margin-left', leftMenu.width() + 'px');
		$('#mainNav.fixed-top .sidenav-toggler > .nav-item').css('width', leftMenu.width() + 'px');
		$('footer.sticky-footer').css('width', 'calc(100% - ' + leftMenu.width() + 'px')
	} else {
		$('.content-wrapper').css('margin-left', 0);
	}
}
$('#sidenavToggler').click(function() {
	resizeLeftMenu();
});
$( window ).resize(function() {
	resizeLeftMenu();
});
$(document).ready(function() {
	resizeLeftMenu();
});