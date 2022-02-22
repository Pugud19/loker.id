        {{-- show user profile --}}
        <x-applayout>
        <div class="border-b -mt-5 py-10">
        <x-container>
        <div class="flex">
        <div class="flex-shrink-0 mr-3">
        <img class="rounded-full w-14 h-14 border-2 border-blue-400 p-1" src="{{ $user->gravatar()}}" alt="{{ $user->user}}">
        </div>
        <div>
        <h1 class="font-semibold mb-2">{{ $user->username }}</h1>
        <div class="text-sm text-gray-500 "> joined {{ $user->created_at->diffForHumans()}} </div>
        </div>
        </div>
        </x-container>
        </div>

        {{-- show on click followers, following and statuses --}}
        <x-statistic :user="$user"/>


        <x-container>
        <div class=" grid grid-cols-2 ">
        <div class="space-y-5">
        <x-statuses :statuses="$statuses"/>
        </div>
        </div>


        </x-container>

        </x-applayout>
