$(document).ready(function() {
	function openModal(itemId) {
		$('.modal_container').fadeIn();
		$('.modal_container').addClass(itemId);
		$('#'.itemId).fadeIn();
	}

	//	Login clicked
    $('#loginButton').on('click', function() {
    	openModal('loginModal');
    });
});