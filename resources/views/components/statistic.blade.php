       <div class="border-b mb-6">
        <x-container>
        <div class="flex justify-between items-center">  
        <div class="flex">
        <a href="{{ route('profile', $user->username) }}" class="p-10 py-4  text-center border-l border-r">
        <div class="text-xl font-semibold mb-1">{{ $user->statuses->count()}}</div>
        <div class="uppercase text-xs text-gray-600">Status</div>
        </a>

        <a href="{{ route('following.index', [$user->username, 'following'])}}" class="p-10 py-4  text-center border-r">
        <div class="text-xl font-semibold mb-1">{{ $user->follows->count()}}</div>
        <div class="uppercase text-xs text-gray-600">following</div>
        </a>
        
        <a href="{{ route('following.index', [$user->username, 'follower'])}}" class="p-10 py-4  text-center border-r">
        <div class="text-xl font-semibold mb-1">{{ $user->followers->count()}}</div>
        <div class="uppercase text-xs text-gray-600">follower</div>
        </a>
        </div>
        <div>
        @if(Auth::user()->isNot($user))
        <form action="{{ route('following.store', $user) }}" method="post">
        @csrf
        <x-button>
        @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
        Unfollow
        @else
        Follow
        @endif
        </x-button>
        </form>
        @else 
        <a href="{{ route('profile.edit')}}" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
        edit profile</a>
        @endif
        </div>
        </div>
        </x-container>
        </div>