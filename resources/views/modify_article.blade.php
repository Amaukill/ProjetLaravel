@if(Auth::user()->role_id == 1)
<x-app-layout>
    <x-slot name="header"  >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ __('Modifier un article') }}
        </h2>
        <h3 class="font-semibold text-xxl">L'article à modifier</h3>
        @if(isset($article))
            <div class="d-flex flex-column">
                <div>
                Nom : {{$article->name}}
                </div>
                <div>
                Prix :{{$article->price}}
                </div>
                <div>
               Description : {{$article->description}}
            </div>
            </div>
            <div class="d-flex flex-row justify-content-between ">
            <form  method="POST"  action="{{route('ModifyArticleId' ,['id' => $id])}}" class="form-inline my-2 my-lg-0" class="d-flex flex-row">
                @csrf
                <div class="d-flex flex-column">
                    <input class="form-control mr-sm-2" type="text" name="name" placeholder="Nom" id='name' >
                    <input class="form-control mr-sm-2" type="number" name="price" placeholder="Prix" id='price' >
                    <input class="form-control mr-sm-2" type="text" name="description" placeholder="Description" id='description' >
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Modifier</button>
                </div>
            </form>
        </div>
        @endif
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
