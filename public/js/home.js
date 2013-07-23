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
var wordMaxId = 0;
var lastWordId = 0;

startRefresh();

// Loads words, guesses and notifications
function startRefresh() {
    timer = setTimeout(startRefresh,4000);

	$.post("/getNewWords", { wordid: ""+$('.lastWordId').attr('class').split(' ')[1]+"" })
		.done(function(data) {
			$("#words").prepend(data);
			$(".wordBlock").fadeIn('slow');
			lastWordId = $('.lastWordId').attr('class').split(' ')[1];
			console.log(lastWordId);
		});

    /**$.get('http://wordify.me/application/posts/getwords.php?id='+wordMaxId+'&commentid='+commentMaxId+'<?php if (is_object($printUser)) { echo "&userid=".$printUser->getId(); } ?>', function(data) {
    	$("#words").prepend(data);
    	$(".wordBlock").fadeIn('sl
    	ow');
    	commentMaxId = $('.maxCommentID').text();
    	wordMaxId = $('.wordBlock').first().attr("id");
    	//alert(data);
    	//console.log(commentMaxId);

    });*/
}