@extends('website.master')

@section('title')
    Login - Voter
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-header">Update Profile</div>
                    <div class="card card-body mb-2">
                        <form action="{{route('voter.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-md-4">Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" value="{{$voter->name}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-4">Voter Id</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="voter_id" value="{{$voter->voter_id}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-4">Mobile</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="mobile" value="{{$voter->mobile}}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="" class="col-md-4">Photo</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control mb-1" name="image">
                                    <img src="{{asset($voter->image)}}" width="80" height="80" alt="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-success" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>



@endsection


