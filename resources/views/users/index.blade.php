<x-applayout>
    <div class=" mt-5 mx-3.5">

    <div class="grid grid-cols-5 gap-4">
        <x-following :users="$users"/>
    </div>
    <div class=" mt-5">
        {{ $users->links()}}
        </div>
</div>

</x-applayout>
