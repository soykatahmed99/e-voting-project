@extends('admin.master')

@section('title')
    Manage Parties
@endsection

@section('body')


    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Pending Voters</h3>
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="mx-auto text-success text-center">{{Session::get('message')}}</h3>
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
                                    <div class="col-md-12">
                                        <a href="{{route('voter.approve', ['id'=>$voter->id])}}" onclick="return confirm('Are you sure?')" class="btn btn-success">Approve</a>
                                        <a href="{{route('voter.block.pending', ['id'=>$voter->id])}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Block</a>
                                    </div>
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
