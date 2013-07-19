$(document).ready(function() {
	function openModal(itemId) {
		var modal = '#'+itemId;
		$('.modal_container').fadeIn();
		$('.modal_container').addClass(itemId);
		$(modal).fadeIn();
	}

	//	Login clicked
    $('#loginButton').on('click', function() {
    	openModal('loginModal');
    });

    // Register clicked
    $('#createUserButton').on('click', function() {
    	openModal('registerModal');
    });
});