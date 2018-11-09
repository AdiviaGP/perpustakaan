<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  </head>
  <body>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Adivia's Library</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{url('/')}}" data-toggle="collapse" aria-expanded="false">Dashboard</a>
                </li>
                <li>
                    <a href="{{url('book')}}">Books</a>
                </li>
                <li>
                    <a href="{{url('author')}}">Authors</a>
                </li>
                <li>
                    <a href="{{url('genre')}}">Genres</a>
                </li>

            </ul>
        </nav>
        <!--  -->

        <div id="content">
            @section('content')
            @show
        </div>

    </div>

  </body>
</html>
