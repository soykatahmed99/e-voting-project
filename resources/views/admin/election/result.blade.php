@extends('admin.master')

@section('title')
    Manage Parties
@endsection

@section('body')


    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Result Of {{$election->election_name}}</h3>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Party Name</th>
                            <th>Wining Position</th>
                            <th>Person Name</th>
                            <th>Voter Id</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Party Symbol</th>
                            <th>Votes</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($parties as $party)
                            <tr>
                                <td>{{$party->party_name}}</td>
                                <td class="text-bold font-20">{{$loop->iteration == 1 ? 'Winner' : $loop->iteration}}</td>
                                <td>{{$party->person_name}}</td>
                                <td>{{$party->voter_id}}</td>
                                <td>{{$party->mobile}}</td>
                                <td>{{$party->email}}</td>
                                <td><img src="{{asset($party->image)}}" height="80" width="80" alt=""></td>
                                <td><h4 class="text-success">{{$party->votes == null ? '0' : $party->votes}}</h4></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mx-auto text-center">
                <div class="col-md-12">
                    <a href="{{route('result.pdf', ['id'=>$election->id])}}" class="btn btn-success">Download a Result Copy</a>
                </div>
            </div>
        </div>
    </main>




@endsection
