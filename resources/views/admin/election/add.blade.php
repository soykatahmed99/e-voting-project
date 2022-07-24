@extends('admin.master')

@section('title')
    Add a Party
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-header mb-2">Create a Election</div>
                    <h4 class="text-center text-success mb-2">{{Session::get('message')}}</h4>
                    <div class="card card-body mb-2">
                        <form action="{{route('election.create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-md-4">Election Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="election_name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-4">Election Description</label>
                                <div class="col-md-8">
                                    <textarea  class="form-control" name="election_description"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-success" value="Create Election">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
