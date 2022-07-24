@extends('website.master')

@section('title')
    Welcome {{Session::get('voter_name')}}
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="list-group-flush">
                            <a href="" class="list-group-item">My Dashboard</a>
                            <a href="" class="list-group-item">See all Parties</a>
                            <a href="" class="list-group-item">My Profile</a>
                        </div>
                    </div>

                    <div class="col-md-10">

                        <div class="row">
                            @if($election->election_status == 0)
                                <h4 class="mx-auto text-success text-center font-20">{{$election->election_name}}</h4>
                            @else
                                <h4 class="mx-auto text-success text-center font-20">Currently No Election Is Going On.</h4>
                            @endif
                                <hr>
                            <h6 class="mx-auto text-center text-success mb-3">{{Session::get('message')}}</h6>
                            @if($voter->voting_status == 1)
                                <h6 class="mx-auto text-danger mb-3 text-center">You Already Voted For This Election</h6>
                            @else
                                <h6 class="mx-auto text-success text-muted mb-3 text-center">Vote For Your Favourite Party</h6>
                            @endif
                            @foreach($parties as $party)
                            @if($party->account_status == 0)
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header"><h4>{{$party->party_name}}</h4></div>
                                                <img src="{{asset($party->image)}}" style="height: 200px; width: 280px" alt="">
                                                <div class="card-body mx-auto">
                                                    @if($voter->voting_status == 0)
                                                        <a href="{{route('vote.submit', ['id' => $party->id])}}" onclick="return confirm('Are You Sure?')" class="btn btn-success px-5 mx-auto">Vote Now</a>
                                                    @else
                                                        <a href="" class="btn btn-danger disabled px-5 mx-auto">Voted</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                            @endforeach
                                @if($election->election_status == 1)
                                <h3>No Election Is Available</h3>
                                @endif
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
