<x-app-layout>
    <x-slot name="header">
    Hiii... <b>{{Auth::user()->name}}</b>
    <span style="float:right;">Total Users
    <span class="badge bg-danger">{{count($users)}}</span>
    </span>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <table class="table">
                    <thead>
                    
                        <tr>
                            <th scope="col">Sno.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created At</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{carbon\carbon::parse($user->created_at)->diffForHumans()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
