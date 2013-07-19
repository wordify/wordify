@section('words')

	@foreach($words as $word)
		<div class="wordBlock">
			<img src="http://wordify.me/application/images/profilePictures/eccbc87e4b5ce2fe28308fd9f2a7baf3/2bc28a211a624c9886d1d299a808643d.jpg" class="profilePic" alt="Profile picture">
			<div class="writer">
				<span class="username 3 feedUsername">afr</span>
				<span class="says">IS WORDING</span>
				<br />
				<span class="words">{{ $word->word }}...</span>
			</div>
			<div class="commentBlock" id="commentBlock23">
				<span class="guessBtn" onclick="">GUESS WHAT <b>afr</b> IS THINKING... <b><span style="font-style: normal;">(</span><span class="guessCount 23">2</span><span style="font-style: normal;">)</span></b></span>
			</div>
		</div>
	@endforeach
	
@endsection