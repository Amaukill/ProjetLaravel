<x-app-layout>
    <x-slot name="header"  >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ __('Ajouter un article') }}
        </h2>
        <div class="d-flex flex-row justify-content-between ">
            <form  method="POST"  action="{{route('ajoutArticle')}}" class="form-inline my-2 my-lg-0" class="d-flex flex-row">
                @csrf
                <div class="d-flex flex-row">
                    <input class="form-control mr-sm-2" type="text" name="name" placeholder="Nom" id='name' >
                    <input class="form-control mr-sm-2" type="text" name="price" placeholder="Prix" id='prix' >
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ajouter</button>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
