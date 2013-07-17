@extends('master')
@section('content')

	<div id="relatedPeople" align="left">
		<h3>People you might find interesting</h3>
		<table style="clear: both;">
			<tbody><tr>
				<td align="center">
					<span class="username 8">
						<img src="https://graph.facebook.com/100005725362637/picture?width=400&amp;height=400" width="100%" style="max-width: 110px; margin: 10px; margin-top: 0px;">
					</span><br>
					<span class="username 8">jonas.hans.14</span>
				</td>
				<td align="center">
					<span class="username 15">
						<img src="http://wordify.me/profilePicture/unknown.jpg" width="100%" style="max-width: 110px; margin: 10px; margin-top: 0px;">
					</span><br>
					<span class="username 15">mriw1977</span>
				</td>
				<td align="center">
					<span class="username 4">
						<img src="https://graph.facebook.com/1308437768/picture?width=400&amp;height=400" width="100%" style="max-width: 110px; margin: 10px; margin-top: 0px;">
					</span><br>
					<span class="username 4">Wanax</span>
				</td>
				<td align="center">
					<span class="username 11">
						<img src="http://wordify.me/profilePicture/unknown.jpg" width="100%" style="max-width: 110px; margin: 10px; margin-top: 0px;">
					</span><br>
					<span class="username 11">smh</span>
				</td>
				<td align="center">
					<span class="username 14">
						<img src="http://wordify.me/profilePicture/unknown.jpg" width="100%" style="max-width: 110px; margin: 10px; margin-top: 0px;"></span><br>
						<span class="username 14">karel</span>
				</td>
				<td align="center">
					<span class="username 10">
						<img src="https://graph.facebook.com/1246076555/picture?width=400&amp;height=400" width="100%" style="max-width: 110px; margin: 10px; margin-top: 0px;"></span><br><span class="username 10">KSHansen</span></td>
				</tr></tbody>
			</table>
	</div>

	<input type="text" class="input" name="theWord" placeholder="WRITE YOUR WORD...">

	<div id="words">

		@foreach($words as $word)
			<div class="wordBlock">
				<img src="http://wordify.me/application/images/profilePictures/eccbc87e4b5ce2fe28308fd9f2a7baf3/2bc28a211a624c9886d1d299a808643d.jpg" class="profilePic" alt="Profile picture">
				<div class="writer">
					<span class="username 3 feedUsername">afr</span>
					<span class="says">IS WORDING</span>
					<br />
					<span class="words">{{ $word }}...</span>
				</div>
				<div class="commentBlock" id="commentBlock23">
					<span class="guessBtn" onclick="">GUESS WHAT <b>afr</b> IS THINKING... <b><span style="font-style: normal;">(</span><span class="guessCount 23">2</span><span style="font-style: normal;">)</span></b></span>
				</div>
			</div>
		@endforeach

	</div>
	
@endsection