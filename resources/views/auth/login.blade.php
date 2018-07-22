<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
        <link rel="stylesheet" href="{!! asset('sbadmin/vendor/font-awesome/css/font-awesome.min.css')!!}" >
        <link rel="stylesheet" href="{!! asset('sbadmin/vendor/datatables/dataTables.bootstrap4.css')!!}" >
        <link rel="stylesheet" href="{!! asset('sbadmin/css/sb-admin.min.css') !!}">
        <link rel="stylesheet" href="{!! asset('css/style-me.css') !!}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/twinlincoln_icon.png') }}" />
        <title>Twinlincoln</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container-fluid my-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 class="mt-4 mb-5">Login</h1>
                            <hr>
                            <form action=" {{ route('login.post') }} " method="post" class="my-5">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" >
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" >
                                </div>
                                <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="{!! asset('js/app.js') !!}"></script>
    <script src="{!! asset('sbadmin/js/sb-admin.min.js') !!}"></script>

    @yield('pageJs')
</html>
