

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="{{ route('post.index') }}"><img class="logo" src="{{asset('assets/images/news.jpg')}}" alt="images/news.jpg"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9 col-md-1 " style="background: none">

    <form action="{{ route('logout') }}" method="POST" style="background: none ">

        @csrf

        <button type="submit"
                class="admin-logout"
                style="background:none; border:none; cursor:pointer;">

            Logout

        </button>

    </form>

</div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">

    <li>
        <a href="{{ route('post.index') }}">Post</a>
    </li>

    @if(auth()->user()->role == 1)

        <li>
            <a href="{{ route('category.index') }}">Category</a>
        </li>

        <li>
            <a href="{{ route('user.index') }}">Users</a>
        </li>

    @endif

</ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->

{{-- ya se oper header hai  --}}
@yield('content')

{{-- ya footer hai  --}}

<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright 2019 News | Powered by Bilal khan</span>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
</html>
