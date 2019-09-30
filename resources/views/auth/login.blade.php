<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/828f671aa2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
</head>
<body>
    <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                    <div class="col-lg-8">
                            <section class="login-header">
                                <img src="{{asset('img/logo_inteiro.png')}}"  width="300px" height="200px" class="" alt="doomus-logo">
                                  </section>
                                
                                  <form action="{{route('login')}}" method="POST">
                                    @csrf
                                    <div class="mdc-text-field login-email">
                                      <input type="text" class="mdc-text-field__input" id="email-input" name="email" required>
                                      <label class="mdc-floating-label" for="email-input">Email</label>
                                      <div class="mdc-line-ripple"></div>
                                    </div>
                                    <div class="mdc-text-field login-password">
                                      <input type="password" class="mdc-text-field__input" id="password-input" name="password" required minlength="6">
                                      <label class="mdc-floating-label" for="password-input">Senha</label>
                                      <div class="mdc-line-ripple"></div>
                                    </div>
                                    <div class="login-button-container">
                                        <a style="margin-top:3.2px;" class="mdc-button mdc-button--raised" href="{{ URL::previous() }}">
                                            <span class="mdc-button__label">
                                            Voltar
                                            </span>
                                        </a>
                                      <button class="mdc-button mdc-button--raised next" type="submit">
                                        <span class="mdc-button__label">
                                          Logar
                                        </span>
                                      </button>
                                    </div>
                                  </form>
                    </div>
                </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>