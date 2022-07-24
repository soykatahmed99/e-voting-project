<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/')}}website/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/all.css">
</head>
<body>

<nav class="navbar navbar-expand bg-dark navbar-dark">
    <div class="container">
        <a href="{{route('website.home')}}" class="navbar-brand">E-Voting</a>
        <ul class="navbar-nav">

            @if(Session::get('voter_id'))
                <li><a href="{{route('voter.dashboard')}}" class="nav-link">Dashboard</a></li>
            <li class="dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <i class="fa"><img
                            src="{{asset(Session::get('voter_image'))}}" style="height: 25px; width: 25px; border-radius: 50%;" alt=""></i>  {{Session::get('voter_name')}}</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('voter.profile', ['id' => Session::get('voter_id')])}}"class="dropdown-item">My Profile</a></li>
                    <li><a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a></li>
                    <form action="{{route('voter.logout')}}" method="post" id="logoutForm">
                        @csrf
                    </form>
                </ul>
            </li>
            @else
                <li><a href="{{route('website.home')}}" class="nav-link">Home</a></li>
            @endif
        </ul>
    </div>
</nav>

@yield('body')

<footer class="bg-dark py-5" >
    <h4 class="text-muted text-white text-center">@SoykatAhmed</h4>
</footer>
<script src="{{asset('/')}}/website/js/jquery-3.6.0.js"></script>
<script src="{{asset('/')}}/website/js/bootstrap.js"></script>
</body>
</html>
