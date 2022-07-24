@extends('admin.master')

@section('title')
    Add a Party
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            @if($election->election_status == 0)
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-header mb-2">Create a Party</div>
                        <h4 class="text-center text-success mb-2">{{Session::get('message')}}</h4>
                        <div class="card card-body mb-2">
                            <form action="{{route('party.create')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="" class="col-md-4">Party Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="party_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4">Person Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="person_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4">Voter Id</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" name="voter_id">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4">Mobile</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" name="mobile">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4">Party Symbol</label>
                                    <div class="col-md-8">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success" value="Create Party">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            @else
            <h4 class="text-center mx-auto">Please Create a Election First to add Party <a href="{{route('election.add')}}">Here</a></h4>
            @endif
        </div>
    </section>


@endsection
