@extends('admin.master')

@section('title')
    Manage Parties
@endsection

@section('body')


    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manage ALl Elections</h1>
            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Election Name</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($elections as $election)
                            <tr>
                                <td>{{$election->election_name}}</td>
                                <td>
                                    @if($election->election_status == 0)
                                        <h6 class="text-success">Running</h6>
                                    @else
                                        <h5 class="text-danger">Ended</h5>
                                    @endif
                                </td>
                                <td>{{$election->election_description}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if($election->election_status == 0)
                                                <a href="{{route('election.reset',['id'=>$election->id])}}" onclick="return confirm('Are You Sure To Stop The Election Now?')" class="btn btn-danger">Stop Election</a>
                                            @else
                                                <a href="{{route('election.result', ['id' => $election->id])}}" class="btn btn-success">Result</a>
                                            @endif


                                        </div>
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
