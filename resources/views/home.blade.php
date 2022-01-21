@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">


            <div class="card">

                <div class="user_id d-none">{{$user->id}}</div>

                <div class="card-header mb-5">{{ __('Dashboard') }}</div>

                <h4 class="px-4">Your refereal link</h4>
                <p class="text-center mb-5">{{$user->referral_link}}</p>
                <hr>

                    <div class="card p-5">
                        <h4>Number of users registered using your link</h4>
                        <div class="text-center"><p style="width: fit-content;border:2px solid rgba(255, 26, 104, 1);border-radius: 50%" class="p-4 shadow font-weight-bold d-block m-auto h4 ">{{$referred_users_count}} <span class="h5">user</span></p></div>
                    </div>

                <div class="chartBox  m-auto my-5">
                    <canvas id="myChart"></canvas>
                </div>
                <hr>

                <div class="container">
                <div class="table-responsive m-b-40">
                    <table class="table  table-data3">
                        <thead >
                        <tr>
                            <th >date of creation</th>
                            <th>user name</th>
                            <th>user email</th>


                        </tr>
                        </thead>
                        <tbody>




                    @foreach($referrer_users as $referrer_user)
                        <tr style="background-color: rgba(255, 26, 104, 0.1)">
                            <td>{{$referrer_user->created_at}}</td>

                            <td>{{$referrer_user->name}}</td>

                            <td>{{$referrer_user->email}}</td>

                        </tr>
                    @endforeach


                        </tbody>
                    </table>
                </div>
                </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // setup
    const options={
        headers:{
            "token": "application/json",

        }
    }
    const user_id=document.querySelector('.user_id').innerText;
    fetch(`api/referred-count/${user_id}`).then((res) => res.json())
        .then((jsonData)    => {
            const data = {
                labels: jsonData[1],
                datasets: [{
                    label: 'Daily Users Referred',
                    data: jsonData[0],
                    backgroundColor: [
                        'rgba(255, 26, 104, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(0, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 26, 104, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(0, 0, 0, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            // config
            const config = {
                type: 'bar',
                data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // render init block
            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );

        })
</script>

@endsection
