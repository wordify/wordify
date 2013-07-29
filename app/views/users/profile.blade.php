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

            @if(Auth::check())
                <div id="followButtonContainer">
                        @if(Auth::user()->id != $user->id)
                            @if($followstatus)
                                <a href="#" id="profileFollowBtn" class="unFollowButton {{ $user->id }}">Unfollow</a>
                            @else
                                <a href="#" id="profileFollowBtn" class="followButton {{ $user->id }}">Follow</a>
                            @endif
                        @else
                            <a href="#" id="profileFollowBtn" class="editProfileButton {{ $user->id }}">Edit profile</a>
                        @endif
                </div>
            @endif

                <a href="#" class="profileFollowNumber profileStatusBarNumber following">{{ $following }}</a> Following<br/>
                <a href="#" class="profileFollowNumber profileStatusBarNumber followed">{{ $followers }}</a> Followers<br/><br/>
            @unless(is_null($user->country) && is_null($user->website) && is_null($user->job))
                @unless(is_null($user->country)) Is from  {{ $user->country }}<br/> @endunless
                @unless(is_null($user->website)) <a href="{{ $user->website }}" target="_BLANK">Homepage link</a><br/>@endunless
                @unless(is_null($user->job)) Job: {{ $user->job }}<br/>@endunless
            @else {{ $user->username }} is new here. No information is added yet.
            @endunless
        </div>
    </div>

    <div id="profileWordsDiv">
            @if ($user->userStatus == 1 && $user->id == Auth::user()->id)
                <div id="profileWordsDivHeadline">Create new topic</div>
                <input type="text" name="new_topic" id="create_new_topic" placeholder="WRITE TOPIC" />
            @endif
        <div id="profileWordsDivHeadline">Word cloud</div>
        @if(!is_null($words))

            @foreach ($words as $w)
                {{--*/$commentcount = $w->comments()->count();/*--}}
                @if($commentcount < 1) {{--*/$commentcount = 1;/*--}} @endif
                @if($totalCount != 0)
                    @if (($commentcount/$totalCount)*100 < 10)
                        <span class="tagcloud tagcloud-word1 {{ $w->id }}">{{ $w->word }} </span>
                    @elseif (($commentcount/$totalCount)*100 < 20)
                        <span class="tagcloud tagcloud-word2 {{ $w->id }}">{{ $w->word }}</span>

                    @elseif (($commentcount/$totalCount)*100 < 40)
                        <span class="tagcloud tagcloud-word3 {{ $w->id }}">{{ $w->word }}</span>
                    @elseif (($commentcount/$totalCount)*100 < 60)
                        <span class="tagcloud tagcloud-word4 {{ $w->id }}">{{ $w->word }}</span>
                    @elseif (($commentcount/$totalCount)*100 < 80)
                        <span class="tagcloud tagcloud-word5 {{ $w->id }}">{{ $w->word }}</span>

                    @else
                        <span class="tagcloud tagcloud-word6 {{ $w->id }}">{{ $w->word }}</span>
                    @endif
                @endif
            @endforeach
        @else
            <b>This user has not posted any words yet!</b>
        @endif    
    </div>
@endif