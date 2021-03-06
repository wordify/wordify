$(function() {
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

    // Followed number clicked
	$(document).on('click', '.profileFollowNumber', function() {	
		var userId = $('#profileBox').attr('class');
		var follow = $(this).attr('class').split(' ')[2];
		console.log("Follow: " + follow);
		$.post('/user/follow/'+follow+'', {
			userId: userId
		}).done(function(data) {
			openModal('followedModal');
			$('.followedModal').find('.modalContent').append(data);
		});
	});

	// Edit profile picture button clicked
	$(document).on('click', '.profilePicEditBox', function() {
		openModal('profilepictureModal');
	})

});


$(document).on('click','.username', function(e) {
	var userId = $(this).attr('class').split(' ')[1];   
	$.post("/getProfile", {
		userId: userId
	}).done(function(data){
		$('#profileBox').html(data);
		$('#profileBox').addClass(userId);
	});
	$('#profileBox').animate({ width: 'show' });
});

var longpending = null;

// Loads words, guesses and notifications
function startRefresh() {

	longpending = $.ajax({
		type: 'POST',
		//url: '/getNewWords',
		url: '/getNewItems',
		data: { wordid: ""+$('.lastWordId').attr('class').split(' ')[1]+"", commentid: ""+$('.lastCommentId').attr('class').split(' ')[1]+"" },
		async: true,
		cache: false
	}).done(function(data) {
		$("#words").prepend(data);
		startRefresh();
	});

}

function startLoadWords() {

	longpending = $.ajax({
		type: 'POST',
		url: '/getNewItems',
		//url: '/test.php',
		data: { wordid: ""+$('.lastWordId').attr('class').split(' ')[1]+"", commentid: ""+$('.lastCommentId').attr('class').split(' ')[1]+"" },
		async: true,
		cache: false
	}).done(function(data) {
		$("#words").prepend(data);
		startRefresh();
	});

}

startLoadWords();
