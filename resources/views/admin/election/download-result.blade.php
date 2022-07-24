<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/')}}website/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/style.css">
</head>
<body>

<section class="py-5">
    <div class="container-fluid">
        <div class="row mx-auto">
            <h3 class="text-center">Election Name: {{$election->election_name}}</h3>
            <hr>
        </div>
        <div class="row mx-auto">
            <div class="col-md-9 mx-auto">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Party Name</th>
                        <th>Votes</th>
                        <th>Position</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parties as $party)
                        <tr>
                            <td>{{$party->party_name}}</td>
                            <td>{{$party->votes}}</td>
                            <td>{{$loop->iteration == 1 ? 'Winner' : $loop->iteration}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('/')}}website/js/bootstrap.js"></script>
<script src="{{asset('/')}}website/js/jquery.js"></script>
</body>
</html>
