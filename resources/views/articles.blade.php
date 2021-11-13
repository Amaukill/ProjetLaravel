
<x-app-layout>
    <x-slot name="header"  >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ __('Articles') }}
        </h2>

        <div class="d-flex flex-row justify-content-between ">
            <form  method="POST"  action="{{route('ajoutArticle')}}" role="search" class="form-inline my-2 my-lg-0" class="d-flex flex-row">
                @csrf
                <div class="d-flex flex-row">
                    <input class="form-control mr-sm-2" type="text" name="name" placeholder="Nom" id='name' required>
                    <input class="form-control mr-sm-2" type="text" name="price" placeholder="Prix" id='prix' required>
                    <input type="text" name="id" placeholder="id" id='id' value="{{$id}}" hidden>
                </div>
                <input class="form-control mr-sm-2" type="text" name="description" placeholder="description de l'article" id='description' required >
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ajouter</button>

            </form>
        </div>

    <form  action="{{route('getArticle')}}" method="GET">
        <div class="container">
            @if(isset($articles))
            <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($articles as $query)
                    <tr>
                        <td>{{$query->id}}</td>
                        <td>
                            <a href="Descriptions/{{$query->id}}">{{$query->name}}</a>
                        </td>
                        <td>{{$query->price}}€</td>
                        @if(Auth::user()->role_id == 1)

                            <td><a  href="/ModifyArticle/{{$query->id}}"><i class="fa fa-cog"></i></a></td>

                            @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            @endif
        </div>
    </form>

    </x-slot>
</x-app-layout>
