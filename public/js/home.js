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


var longpending = null;

// Loads words, guesses and notifications
function startRefresh() {

	longpending = $.ajax({
		type: 'POST',
		//url: '/getNewWords',
		url: '/getNewWords',
		data: { wordid: ""+$('.lastWordId').attr('class').split(' ')[1]+"" },
		async: true,
		cache: false
	}).done(function(data) {
		$("#words").prepend(data);
		startRefresh();
	});

}

function startLoadWords() {

	$.ajax({
		type: 'POST',
		url: '/getNewWords',
		//url: '/test.php',
		data: { wordid: ""+$('.lastWordId').attr('class').split(' ')[1]+"" },
		async: true,
		cache: false
	}).done(function(data) {
		$("#words").prepend(data);
		startRefresh();
	});

}

startLoadWords();
