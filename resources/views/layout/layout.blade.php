<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{config('app.name')}}</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
              <a class="navbar-brand" href="#">Gestión</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                  </li>
                  @can('admin.users')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users')}}">Users</a>
                    </li>
                  @endcan
                  @can('projects')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('projects')}}">Projects</a>
                    </li>
                  @endcan
                  @can('documents.users')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('documents')}}">Documentos</a>
                    </li>
                  @endcan
                  @can('documents.res')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('documents.res')}}">Documentos</a>
                    </li>
                  @endcan
                </ul>
                <form class="form-inline mt-2 mt-md-0" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <label for="" class="mr-sm-2" style="color:white">{{ auth()->user()->nombre }}</label>
                  <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Cerrar Sesión</button>
                </form>
              </div>
            </nav>
          </header>

          <!-- Begin page content -->
          <main role="main" class="container">
            @yield('content')
          </main>

          <footer class="footer">
            <div class="container">
              <span class="text-muted">Copyright &copy; 2019. All rights reserved.</span>
            </div>
          </footer>

        <script src="{{asset('js/app.js')}}"></script>
    </body>

</html>
