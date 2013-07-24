@if(!$user)
    <h3>The user could not be found in the database!</h3>
@else
    <h2 id="profileName">{{ $user->name }}</h2>

    <div id="profileInfoBox">
        <div id="profilePictureHoverDiv">
        <img id="profilePicture" src='{{ $user->profilePicture }}' alt="Profile picture" />

            @if(Auth::user()->id == $user->id) 
                <div class="profilePicEdit"><div class="profilePicEditBox {{ $user->id }}">Edit</div></div>
            @endif
        </div>
        <div class="profileFacts">
            <h2>@{{ $user->username }}</h2>

            @if(!Auth::check())
                <div id="followButtonContainer">
                        @if(Auth::user()->id != $user->id)
                                <a href="#" id="profileFollowBtn" class="unFollowButton {{ $user->id }}">Unfollow</a>
                        @else
                            <a href="#" id="profileFollowBtn" class="editProfileButton {{$user->id }}">Edit profile</a>
                        @endif
                </div>
            @endif

            @if(!is_null($user->country) && !is_null($user->website) && !is_null($user->job))
                <a href="#" class="profileFollowedNumber {{ $user->id }} profileStatusBarNumber">{{ $following }}</a> Following<br/>
                <a href="#" class="profileFollowersNumber profileStatusBarNumber">{{ $followers }}</a> Followers<br/><br/>

                @unless(is_null($user->country)) Is from  {{ $user->country }}<br/> @endunless
                @unless(is_null($user->website)) <a href="{{ $user->website }}" target="_BLANK">Homepage link</a><br/>@endunless
                @unless(is_null($user->job)) Job: {{ $user->job }}<br/>@endunless
            @else {{ $user->username }} is new here. No information is added yet.
            @endif
        </div>
    </div>

    <div id="profileWordsDiv">
            @if ($user->userStatus == 1 && $user->id == Auth::user()->id)
                <div id="profileWordsDivHeadline">Create new topic</div>
                <input type="text" name="new_topic" id="create_new_topic" placeholder="WRITE TOPIC" />
            @endif
        <div id="profileWordsDivHeadline">Word cloud</div>
              <b>This user has not posted any words yet!</b>
    </div>
@endif