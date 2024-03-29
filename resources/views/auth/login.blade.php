<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AP-STAGE</title>
    <!-- Scripts -->
    <link href="{{ asset('css/app4.css') }}" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <div class="container">
      <div class="col-left">
        <div class="login-text">

                <img src="{{asset('dist/img/login.png')}}" class="img-circle elevation-2 sidebar-logo" alt="Algerie Poste" height="100" width="100">

                <p style="margin-top: 1cm; font-size: 20px; font-family: 'Times New Roman', serif;color:#002244;">
                    AP-InterneShip
          </p>
        </div>
      </div>
      <div class="col-right">
        <div class="login-form">
          <h2>Se connecter</h2>
          <form class='login-form' method="POST" action="{{ route('login') }}">
            @csrf
            <label class="lf--label" for="password">
            <p>
                <input id="username" type="username" class="lf--input @error('username') is-invalid @enderror" name="username" placeholder='Utilisateur' value="{{ old('username') }}" required autocomplete="username" autofocus>
            </p>
            <p>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder='Mot de passe' required autocomplete="current-password" >
            </p>
            @error('username')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <p>
              <input class="btn" type="submit" value="Se connecter" />
            </p>
    </div>
          </form>
        </div>
      </div>
    </div>
    <div class="credit">
    </div>
  </div>

 </body>
</html>
