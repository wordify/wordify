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

var timer = null;

// Loads words, guesses and notifications
function startRefresh() {
    timer = setTimeout(startRefresh,4000);
    /**$.get('http://wordify.me/application/posts/getwords.php?id='+wordMaxId+'&commentid='+commentMaxId+'<?php if (is_object($printUser)) { echo "&userid=".$printUser->getId(); } ?>', function(data) {
    	$("#words").prepend(data);
    	$(".wordBlock").fadeIn('slow');
    	commentMaxId = $('.maxCommentID').text();
    	wordMaxId = $('.wordBlock').first().attr("id");
    	//alert(data);
    	//console.log(commentMaxId);

    });*/
}