@section('words')

	@foreach($words as $word)
		<div class="wordBlock">
			<img src="{{ $word->user->profilePicture }}" class="profilePic" alt="Profile picture">
			<div class="writer">
				<span class="username {{ $word->user->id }} feedUsername">{{ $word->user->username }}</span>
				<span class="says">IS WORDING</span>
				<br />
				<span class="words">{{ $word->word }}...</span>
			</div>
			<div class="commentBlock" id="commentBlock{{ $word->id }}">
				<span class="guessBtn" onclick="">GUESS WHAT <b>{{ $word->user->username }}</b> IS THINKING... <b><span style="font-style: normal;">(</span><span class="guessCount {{ $word->id }}">2</span><span style="font-style: normal;">)</span></b></span>
			</div>
		</div>
	@endforeach
	
@endsection