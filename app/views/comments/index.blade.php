<script>
	@foreach($comments as $comment)
		$('#commentBlock{{ $comment->word_id }}').find('.commentList').append('<img class="point" src="http://wordify.me/application/images/icons/point_grey.png"><div class="acommentBox"><span class="username {{ $comment->user_id }}"><b style="font-size: 25px;">afr</b></span><br> {{ $comment->comment }}</div>');
		$('guessCount {{ $comment->word_id }}').text(''+$('#commentBlock{{ $comment->word_id }}').find('.commentList .acommentBox').length+'');
	@endforeach
</script>