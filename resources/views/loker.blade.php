<x-applayout>
<x-container>
    <div class="border rounded-xl p-5 mt-5 ">
        <form action="{{ route('jobs.store')}}" method="post">
            @csrf
            <div class="flex">
            <div class="flex-shrink-0 mr-3">
            <img class="w-10 h-10 rounded-xl" src="{{ Auth::user()->gravatar() }}" alt="{{ Auth::user()->name }}" >
            </div>
            <div class="w-full">
            <div class="font-semibold">
            {{ Auth::user()->name }} 
            </div>
             <div class="my-5">
                
                <textarea class="form-textarea p-2 w-full border-gray-300 h-10 rounded-lg resize-none overflow-hidden focus:border-blue-100 focus:ring focus:ring-blue-200 transition duration-100 " 
               name="name" id="name" placeholder="Nama perusahaan "></textarea>
               <textarea class="form-textarea p-2 w-full border-gray-300 h-10 rounded-lg resize-none overflow-hidden focus:border-blue-100 focus:ring focus:ring-blue-200 transition duration-100 " 
               name="bagian" id="bagian" placeholder="Bagian pekerjaan"></textarea>
               <textarea class="form-textarea p-2 w-full border-gray-300 h-10 rounded-lg resize-none overflow-hidden focus:border-blue-100 focus:ring focus:ring-blue-200 transition duration-100 " 
               name="tempat" id="tempat" placeholder="Tempat pekerjaan"></textarea>
               <textarea class="form-textarea p-2 w-full border-gray-300 h-10 rounded-lg resize-none overflow-hidden focus:border-blue-100 focus:ring focus:ring-blue-200 transition duration-100 " 
               name="gaji" id="gaji" placeholder="Gaji"></textarea>
               <textarea class="form-textarea p-2 w-full border-gray-300 h-10 rounded-lg resize-none overflow-hidden focus:border-blue-100 focus:ring focus:ring-blue-200 transition duration-100 " 
               name="pengalaman" id="pengalaman" placeholder="Pengalaman minimal "></textarea>
              
             </div>
             <div class="text-right">
             <x-button>post</x-button>
             </div>
             </div>
        </form>    
    </div>
</x-container>

      <div class="grid grid-cols-3 gap-6 space-y-3">
        @foreach($lokers as $loker)
        <x-card>
        <div class="flex">
            <div class="flex-shrink-0 mr-3">
            <img class="w-10 h-10 rounded-xl" src="{{ Auth::user()->gravatar() }}" alt="{{ Auth::user()->name }}" >
            </div>
            <div class="w-full">
            <div class="font-semibold">
            {{ $loker->name }} 
            </div>
            <div>
                <div class=" text-sm text-blue-400">{{ $loker->bagian }}</div>
                <div class=" my-2 text-sm ">
                    <div>{{ $loker->tempat }}</div>
                    <div>{{ $loker->gaji }}</div>
                    <div>{{ $loker->pengalaman }} Tahun</div>
                </div>
            </div>
            <div class="text-sm text-right text-gray-500">{{ $loker->created_at->diffForhumans()}}</div>
            </div>
        </div>
       
      </x-card>
        
        @endforeach  
       

    </div>
    {{-- <div class="mx-3 5"> 
        <div class="grid grid-cols-3 gap-6 space-y-3">
            <x-job :lokers="$lokers"/>
        </div>
   </div> --}}
        
</x-applayout>