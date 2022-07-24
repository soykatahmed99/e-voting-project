@extends('website.master')

@section('title')
    Login - Voter
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row h-350">
                <div class="col-md-4 mx-auto">
                    <div class="card card-header">Voter Login</div>
                    <div class="card card-body mb-2">
                        <form action="{{route('voter.login')}}" method="post">
                            @csrf
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
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-success" value="Login">
                                </div>
                            </div>
                            <h5 class="text-danger text-center">{{Session::get('message')}}</h5>
                        </form>
                    </div>
                    <h6>Don't have a Voting Account? <a href="{{route('voter.register')}}" class="text-decoration-none">Create Here.</a></h6>
                </div>

            </div>
        </div>
    </section>



@endsection
