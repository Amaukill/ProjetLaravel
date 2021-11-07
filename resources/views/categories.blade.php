<x-app-layout>
    <x-slot name="header"  >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ __('Catégories') }}
        </h2>
        <div class="d-flex flex-row justify-content-between ">

        <form  action="{{route('getCategorie')}}" method="GET" role="search" class="form-inline my-2 my-lg-0" class="d-flex flex-row">
            <div class="d-flex flex-row">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </div>
        </form>
        </div>
        <div class="container">
            @if(isset($categorie))
                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categorie as $query)
                        <tr>
                            <td>
                            <a href="getArticleByCat/{{$query->id}}">{{$query->name}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </x-slot>
</x-app-layout>