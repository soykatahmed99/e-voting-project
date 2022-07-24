@extends('website.master')

@section('title')
    Profile - {{Session::get('voter_name')}}
@endsection

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <img src="{{asset($voter->image)}}" class="align-items-center" style="height: 120px; width: 120px; border-radius: 50%;" alt="">
                    <h3 class="mt-2">{{$voter->name}}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <table class="table-hover table table-bordered">
                        <tbody>
                        <tr>
                            <th class="col-md-5">Voter ID</th>
                            <td>{{$voter->voter_id}}</td>

                        </tr>
                        <tr>
                            <th class="col-md-5">Mobile</th>
                            <td>{{$voter->mobile}}</td>
                        </tr>
                        <tr>
                            <th class="col-md-5">Email</th>
                            <td>{{$voter->email}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mx-auto">
                <a href="{{route('voter.profile.update')}}" class="btn col-md-2 mx-auto btn-success mt-2">Update Profile</a>
            </div>
        </div>
    </section>


@endsection
