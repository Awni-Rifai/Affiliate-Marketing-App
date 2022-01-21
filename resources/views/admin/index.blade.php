@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="table-responsive m-b-40">
            <table class="table  table-data3">
                <thead >
                <tr>
                    <th >date of creation</th>
                    <th>user name</th>
                    <th>user email</th>
                    <th>Number of referred users</th>


                </tr>
                </thead>
                <tbody>




                @foreach($users as $referrer_user)
                    <tr style="background-color: rgba(255, 200, 200, 0.8)">
                        <td>{{$referrer_user->created_at}}</td>

                        <td>{{$referrer_user->name}}</td>

                        <td>{{$referrer_user->email}}</td>
                        <td>{{$referrer_user->refers_number??0}}</td>

                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
