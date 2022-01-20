    @foreach($users as $user)
    <x-card>
            <div class="flex items-center">
            <div class="flex-shrink-0 mr-3">
            <img class="w-10 h-10 rounded-xl" src="{{ $user->gravatar() }}" alt="{{ $user->name }}" >
            </div>
            <div>
            <div class="font-semibold">
           {{ $user->name }}
            </div> 
            @if(request()->routeIs('users.index'))
             <div class="text-sm text-gray-500">
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
                    <a href="" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    edit profile</a>
                    @endif
                    </div>
                    
             @if($user->pivot)
             {{ $user->pivot->created_at->diffForHumans()}}
             @endif
             </div>

             @endif
             </div>
             </div>     
    </x-card>
    @endforeach