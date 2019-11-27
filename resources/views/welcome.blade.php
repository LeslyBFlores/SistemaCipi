<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{config('app.name')}}</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
    </head>

    <body>
        <div class="login">
            <h1>Login</h1>
            <form method="post" action="{{route('login')}}">
                @csrf

                <input type="email" name="email" placeholder="Email" required="required" value="{{old('email')}}" />
                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}

                <input type="password" name="password" placeholder="Password" required="required" />
                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}


                <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sesión</button>

            </form>
        </div>

        <script src="{{asset('js/app.js')}}"></script>

    </body>
</html>
