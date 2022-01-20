<x-applayout>
    <x-slot name="header">
        <h1 class="font-semibold text-lg">
            Change Your Password
        </h1>
    </x-slot>


    <x-container>
        <div class="flex">
            <div class="w-full mt-3">
            <x-card>
                <form action="{{ route('password.edit')}}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <x-label for="current_password">Current Password</x-label>
                        <x-input class="mt-1 w-full" type="password" name="current_password" id="current_password"/>
                            @error('current_password')
                            <div class="text-pink-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="mb-3">
                        <x-label for="password">New Password</x-label>
                        <x-input class="mt-1 w-full" type="password" name="password" id="password"/>
                            @error('password')
                            <div class="text-pink-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="mb-3">
                        <x-label for="pasword_confirmation">Confirm Password</x-label>
                        <x-input class="mt-1 w-full" type="password" name="pasword_confirmation" id="pasword_confirmation"/>
                            @error('pasword_confirmation')
                            <div class="text-pink-500 mt-2 text-sm">{{ $message }}</div>
                        @enderror
                    </div> 
                    <x-button>Update</x-button>
            
            </form>
            </x-card>
        </div>
        
    </x-container>
</x-applayout>