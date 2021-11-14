@if(Auth::user()->role_id == 1)
    <x-app-layout>
        <x-slot name="header"  >
            <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
                {{ __('Recherche des Logs') }}
            </h2>
            <div class="d-flex flex-row justify-content-between ">
                <form  method="POST"  action="{{route('FindLogs')}}" class="form-inline my-2 my-lg-0" class="d-flex flex-row">
                    @csrf
                    <div class="d-flex flex-column">
                        <input class="form-control mr-sm-2" type="text" name="user_id" placeholder="Recherche par User_id" id='user_id' >
                        <input class="form-control mr-sm-2" type="text" name="action"  placeholder="Recherche par Action" id='action' >
                        <input class="form-control mr-sm-2" type="text" name="item_type"  placeholder="Recherche par Type" id='item_type' >
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                    </div>
                </form>
            </div>
            @if(isset($logs))
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>UserId</th>
                        <th>Action</th>
                        <th>New Value</th>
                        <th>Type</th>
                        <th>ItemId</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td>
                                <a>{{$log->user_id}}</a>
                            </td>
                            <td>
                                <a>{{$log->action}}</a>
                            </td>
                            <td>
                                <a>{{$log->new_value}}</a>
                            </td>
                            <td>
                                <a>{{$log->item_type}}</a>
                            </td>
                            <td>
                                <a>{{$log->item_id}}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

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
