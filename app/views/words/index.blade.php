@foreach($words as $word)
	<div class="wordBlock" id="{{ $word->id }}">
		<img src="{{ $word->user->profilePicture }}" class="profilePic" alt="Profile picture">
		<div class="writer">
			<span class="username {{ $word->user->id }} feedUsername">{{ $word->user->username }}</span>
			<span class="says">IS WORDING</span>
			<br />
			<span class="words">{{ $word->word }}...</span>
		</div>
		<div class="commentBlock" id="commentBlock{{ $word->id }}">
			<div class="commentList" style="display: none;"></div>
			<span class="guessBtn" onclick="">GUESS WHAT <b>{{ $word->user->username }}</b> IS THINKING... <b><span style="font-style: normal;">(</span><span class="guessCount {{ $word->id }}">2</span><span style="font-style: normal;">)</span></b></span><input type="text" class="writeComment" name="writeComment" placeholder="WRITE YOUR GUESS..." style="display: none;">
		</div>
	</div>
@endforeach