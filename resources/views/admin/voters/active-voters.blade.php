@extends('admin.master')

@section('title')
    Manage Parties
@endsection

@section('body')


    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Active Voters</h3>
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="text-center mx-auto text-danger">{{Session::get('message')}}</h4>
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Voter ID</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($voters as $voter)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$voter->name}}</td>
                                <td>{{$voter->voter_id}}</td>
                                <td>{{$voter->mobile}}</td>
                                <td>{{$voter->email}}</td>
                                <td><img src="{{asset($voter->image)}}" height="80" width="80" alt=""></td>
                                <td>
                                    <a href="{{route('voter.block.active', ['id'=>$voter->id])}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Block</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>




@endsection
