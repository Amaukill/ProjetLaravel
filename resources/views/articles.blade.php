
<x-app-layout>
    <x-slot name="header"  >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ __('Articles') }}
        </h2>



    <form  action="{{route('getArticles')}}" method="GET">
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
                    @foreach($articles as $key=>$value)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>
                            <a href="/Descriptions/{{$value->id}}">{{$value->name}}</a>
                        </td>
                        <td>{{$value->price}}€</td>
                        @if(Auth::user()->role_id == 1)

                            <td><a  href="/ArticleToModify/{{$value->id}}"><i class="fa fa-cog"></i></a></td>

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
