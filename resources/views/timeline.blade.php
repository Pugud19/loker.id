        <x-app-layout>

       {{-- <div class=""></div> --}}

        {{-- status section --}}
        <x-container>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-7">

            {{-- status post --}}
            <div class="border rounded-xl p-5 ">
            <form action="{{ route('status.store')}}" method="post">
            @csrf
            <div class="flex">
            <div class="flex-shrink-0 mr-3">
            <img class="w-10 h-10 rounded-xl" src="{{ Auth::user()->gravatar() }}" alt="{{ Auth::user()->name }}" >
            </div>
            <div class="w-full">
            <div class="font-semibold">
            {{ Auth::user()->name }}
            </div>
             <div class="my-3 ">
               <textarea class="form-textarea p-2 w-full border-gray-300 rounded-lg resize-none focus:border-blue-100 focus:ring focus:ring-blue-200 transition duration-100 "
               name="body" id="body" placeholder="what is on your mind ?"></textarea>
             </div>
             <div class="text-right">
             <x-button>post</x-button>
             </div>
             </div>
             </form>
             </div>
            </div>



            {{-- timeline status section --}}
            <div class="space-y-6 mt-3">
            <div class="rounded-lg space-y-3">
            <x-statuses :statuses="$statuses"></x-statuses>
            </div>
            </div>
            </div>


            {{-- friend card --}}
            @if(Auth::user()->follows()->count())
            <div class="col-span-5">
            <x-card>
             <h1 class="font-semibold mb-5">Recently follows</h1>
             <div class="space-y-4">
             <x-following :users="Auth::user()->follows()->limit(5)->get()"></x-following>
                </div>
             </x-card>
            </div>
            @endif

        </div>
        </x-container>
        </x-app-layout>
