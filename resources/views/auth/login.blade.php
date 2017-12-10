<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PNP | Crime Management System</title>
        <!-- Styles -->
        <link href="{{ asset('inspinia/css/bootstrap.min.css') }} " rel="stylesheet">
        <link href="{{ asset('inspinia/font-awesome/css/font-awesome.css') }} " rel="stylesheet">
        <link href="{{ asset('inspinia/css/animate.css') }} " rel="stylesheet">
        <link href="{{ asset('inspinia/css/style.css') }} " rel="stylesheet">
    </head>
    <body class="">
        <div class="middle-box animated fadeInDown ">
            <div class="ibox">
                <div class="ibox-title text-center">
                    <h4>Philippine National Police</h4>
                </div>
                <div class="ibox-content">
                <div class="row">
                    <div class="col-xs-4">
                        <img src="{{ URL::asset('assets/img/logo.png_96x96.png') }}" class="img-thumbnail">
                        
                        
                    </div>
                    <div class="col-xs-8">
                        <h4><strong>Crime Management System</strong></h4>
                        <p>Cagayan de Oro City, Misamis Oriental, <br />9000, Philippines</p>
                    </div>
                </div>
                <form class="m-t" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

                        <input id="username" type="email" class="form-control" name="username" value="{{ old('username') }}" autofocus placeholder="Username/Email">
                        @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                        
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        
                        
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        
                    </div>
                    <div class="form-group">
                        
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        
                        <button type="submit" class="btn btn-primary block full-width m-b">
                        Login
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="{{ asset('inspinia/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('inspinia/js/bootstrap.min.js') }}"></script>
    </body>
</html>