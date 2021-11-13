@if(Auth::user()->role_id == 1)

<x-app-layout>
    <x-slot name="header"  >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ __('Ajouter une catégorie') }}
        </h2>
        <div class="d-flex flex-row justify-content-between ">
        <form  method="POST"  action="{{route('ajoutCategorie')}}" class="form-inline my-2 my-lg-0" class="d-flex flex-row">
            @csrf
            <div class="d-flex flex-row">
                <input class="form-control mr-sm-2" type="text" name="name" placeholder="Nom" id='name' >
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ajouter</button>
            </div>
        </form>
        </div>
    </x-slot>
</x-app-layout>
@endif
<x-app-layout>
    <x-slot name="header"  >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            Vous n'avez pas accès a cette page
        </h2>
    </x-slot>
</x-app-layout>
