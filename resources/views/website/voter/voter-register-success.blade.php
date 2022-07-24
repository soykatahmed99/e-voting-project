
@extends('website.master')

@section('title')
    Registration Complete
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="col-md-6 mx-auto text-center h-350">
                <div class="card card-body mb-3">
                    <h4>Registration Successfully Completed.</h4>
                    <h5>An admin will review and active your account soon.</h5>
                </div>
                <a href="{{route('website.home')}}" class="btn btn-success">Go Home</a>
            </div>
        </div>
    </section>
@endsection

