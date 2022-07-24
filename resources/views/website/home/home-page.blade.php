@extends('website.master')

@section('title')
    Welcome to E-voting System
@endsection

@section('body')

<section class="py-5">
    <div class="container">
        <div class="row" style="height: 500px">
            <div class="col-md-8 mx-auto text-center">
                <div class="card border-0">
                    <h2>Welcome To E-Voting System</h2>
                    <p class="text-muted">Voting Is Now Easy & Fun</p>
                    <hr>
                    <h4>Please Login to Continue</h4>



                           <div class="card-body mx-auto">

                                   <div class="row mx-auto">


                                       <div class="col-md-4">
                                           <a href="{{route('voter.login.page')}}" class="btn btn-outline-primary px-5">Voter</a>
                                       </div>
                                       <div class="col-md-2"></div>
                                       <div class="col-md-4">
                                           <a href="" class="btn btn-outline-primary px-5">Party</a>
                                       </div>

                               </div>
                           </div>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
