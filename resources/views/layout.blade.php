<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>News</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="{{asset('assets/images/news.jpg')}}" alt=""></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
    <li>
        <a href='{{ route('home') }}' class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Home
        </a>
    </li>

    @foreach ($categories as $category)
        <li>
            <a href='{{ route('category.header', $category->id) }}'
               class="{{ request()->route('id') == $category->id ? 'active' : '' }}">
                {{ $category->name }}
            </a>
        </li>
    @endforeach
</ul>
            </div>
        </div>
    </div>
</div>


<div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    
                    @yield('content')
                </div>
              @include('sidebar')
            </div>
        </div>
    </div>


   <div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright 2019 News | Powered by  Bilal Khan</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
