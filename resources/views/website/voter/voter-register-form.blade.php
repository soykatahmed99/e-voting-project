@extends('website.master')

@section('title')
    Login - Voter
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-header">Register for Voting</div>
                    <div class="card card-body mb-2">
                        <form action="{{route('voter.create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-md-4">Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name">
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
                                <label for="" class="col-md-4">Password</label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-4">Photo</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-success" value="Register">
                                </div>
                            </div>
                        </form>
                    </div>
                    <h6>Already have a Voting Account? <a href="{{route('voter.login.page')}}" class="text-decoration-none">Login Here.</a></h6>
                </div>

            </div>
        </div>
    </section>



@endsection

