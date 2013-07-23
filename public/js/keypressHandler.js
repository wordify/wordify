$(document).ready(function() {

	var focusElementID = false;
	var focusElementCom = null;

	$(".input").focus(function() {
		if (!focusElementID && this.id != "searchText")
			focusElementID = true;
	});

	$('.input').blur(function() {
		focusElementID = false;
	});

	$(document).on('click','.guessBtn', function(e) {
    	$(this).parent().find('.writeComment').fadeIn();
    	$(this).parent().find('.guessBtn').hide();
    	$(this).parent().find('.commentList').fadeIn();
  	});

	$(document).keypress(function(e) {

		var theKey = e.which;

		if (focusElementID && e.keyCode == 13) {
			
			clearTimeout(timer);

			var getWord = $(".input").val();

			var userId = $('.loggedInUserId').attr('class').split(' ')[1];
			
			$.post("/words", { word: ""+getWord+"", userid: userId, topicid: "0"/**+$('select[name="selectTopic"]').val()*/ })
			.done(function(data) {
				$(".input").val("");
				startRefresh();
			});

		} else if (focusElementID && /[^a-zA-Z0-9]/.test(String.fromCharCode(theKey))) {
			
			/**
			// Check if key is an exception
			if (jQuery.inArray(theKey, [8, 41, 40, 58, 59, 64, 35]) != -1)
				return true;
			else
				return false;
			*/
		
		} else if (e.keyCode == 13 && "writeComment" == $(':focus').attr("class")) {
			
			/**
			clearTimeout(timer);

			var wordUser = $(':focus').parent().parent().parent().find(".username").attr("class").split(' ')[1];
			var wordid = $(':focus').parent().parent().parent().attr("id");

			$.post("http://wordify.me/application/posts/postcomment.php", { comment: ""+$(':focus').val()+"", wordid: ""+wordid+"", userid: "<?php if (is_object($printUser)) { echo $printUser->getId(); } ?>", receiver: ""+wordUser+"" })
			.done(function(data) {
				$(':focus').val("");
				//alert(data);
				startRefresh();
			});
			*/
			
		} else if (e.keyCode == 13 && "create_new_topic" == $(':focus').attr("id")) {
			
			/**
			$.post("http://wordify.me/application/posts/posttopic.php", { 
				topic: ""+$(':focus').val(),
				userid: "<?php if (is_object($printUser)) { echo $printUser->getId(); } ?>"
			})
			.done(function(data) {
				alert(data);
				$(':focus').val("");
				$('body').append('<div id="succesElement" style="position: fixed; z-index: 1000; top: 0px; width: 100%; background: #fff;"><p style="margin-left: 20px;">succes! the topic is added</p></div>').fadeIn();
				setTimeout(function() { $("#succesElement").fadeOut().remove(); }, 3000);
			});
			*/
			
		}

				// Close modals!
		if (e.keyCode == 27) {

			var containerClasses = $('.modal_container').attr("class").split(' ');

		    $('#'+containerClasses.slice(-1)[0]).fadeOut();

	        if (containerClasses.length > 1) {

	        	if (containerClasses.slice(-1)[0]) {
	        		$('.modal_container').fadeOut();
	        	}

		        $('.modal_container').removeClass(containerClasses.slice(-1)[0]);
		        containerClasses = $('.modal_container').attr("class").split(' ');
	        }

	        //alert(containerClasses);

	        if (containerClasses.length == 1) {
	        	$('.modal_container').fadeOut();
	        }

		}

	});
});