<x-app-layout>
    <x-slot name="header"  >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ __('Description') }}
        </h2>
        <br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            Article : {{$SpecificArticle[0]->name}}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            Prix : {{$SpecificArticle[0]->price}}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            Description :
            <br>
            <h3 class="font-semibold text-l text-gray-800 leading-tight pb-2">
            {{$SpecificArticle[0]->description}}
            </h3>
        </h2>

    </x-slot>
</x-app-layout>
