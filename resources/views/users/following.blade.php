        {{-- show user profile --}}
        <x-applayout>
        <div class="border-b -mt-5 py-10">
        <x-container>
        <div class="flex">
        <div class="flex-shrink-0 mr-3">
        <img class="rounded-full w-14 h-14 border-2 border-blue-400 p-1" src="{{ $user->gravatar()}}" alt="{{ $user->name}}">
        </div>
        <div>
        <h1 class="font-semibold mb-2">{{ $user->name }}</h1>
        <div class="text-sm text-gray-500 "> joined {{ $user->created_at->diffForHumans()}} </div>
        </div>
        </div>
        </x-container>
        </div>
        <x-statistic :user="$user"/>

        <x-container>
        <div class="grid grid-cols-3 gap-3">
        <x-following :users="$follows"/>
        </div>



        </x-container>

        </x-applayout>
