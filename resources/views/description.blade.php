
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
        <br>
        {{-- Si des commentaires sont présents pour l'articles séléctionné ont les affiches --}}
        @if(isset($Commentaire))
            <h1>Commentaire :</h1>
            <br>
            Ajouter un commentaire
            {{-- Formulaire pour l'ajout d'un commentaire --}}
            <div class="flex-row justify-content-between ">
                <form  method="POST"  action="{{route('ajoutCommentaire')}}" role="search" class="form-inline my-2 my-lg-0" class="d-flex flex-row">
                    @csrf
                    <div>
                        <input class="form-control mr-sm-2" type="text" name="commentaire" placeholder="Commentaire..." id='commentaire' required >
                        <input class="form-control mr-sm-2" type="text" name="note" placeholder="Note : 1, 2, 3, 4, 5" id='note' required >
                        <input class="form-control mr-sm-2" type="text" name="user_id" placeholder="user_id" id='user_id' value="{{Auth::user()->id}}" required hidden>
                        <input class="form-control mr-sm-2" type="text" name="article_id" placeholder="article_id" id='article_id' value="{{$SpecificArticle[0]->id}}" required hidden>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ajouter</button>
                    </div>
                </form>
            </div>
            <br>
            <div class="card" style="width: 30rem;">
            {{-- Ont affiches chacun des commentaires --}}
            @foreach($Commentaire as $key=>$value)
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title">Par {{$login[$key][0]->login}} le {{$value->created_at}} </h5>
                        <p>note : {{$value->note}}</p>
                        <p class="card-text">{{$value->commentaire}}.</p>
                        @if(Auth::user()->role_id == 1 || Auth::user()->id == $login[$key][0]->id)
                        <a  href="/DeleteComment/{{$value->id}}"><i class="fa fa-times"></i></a>
                        @endif
                    </div>
                </div>
                @endforeach
                    </div>
        @endif

    </x-slot>
</x-app-layout>
