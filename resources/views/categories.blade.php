<x-app-layout>
    <x-slot name="header"  >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ __('Catégories') }}
        </h2>

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
                            <a href="Article/{{$query->id}}">{{$query->name}}</a>
                            </td>
                            @if(Auth::user()->role_id == 1)

                                <td><a  href="/CategorieToModify/{{$query->id}}"><i class="fa fa-cog"></i></a></td>

                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </x-slot>
</x-app-layout>
