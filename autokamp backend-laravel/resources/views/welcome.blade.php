<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center; 
                position: relative;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            img {
            width: 100%;
            height: auto;
            }
            
        </style>
    </head>
    <body>
        
            
            <div class="content">
            @if (Route::has('login'))
                <div class="top-right links">
                    
                    @auth
                        @if(Auth::user()->role_id == 2)
                        <a style="color:white; font-size:1vw;" href="#">Prijava gosta na rezervaciju</a>
                        <a style="color:white; font-size:1vw;" href="{{ url('/api/pretrazivanje/rezervacije') }}">Pregledi boravka</a>
                        <a style="color:white; font-size:1vw;" href="{{ url('/index') }}">Pretaživanje boravka</a>
                        <a style="color:white; font-size:1vw;" href="{{ url('/logout') }}">Odjava</a>
                        @elseif(Auth::user()->role_id == 1)    
                        <a style="color:white; font-size:2vw;" href="{{ url('/cmsadmin/index') }}">ADMIN CMS</a>
                        <a style="color:white; font-size:2vw;" href="{{ url('/logout') }}">Odjava</a>
                        @else
                        <a style="color:white; font-size:2vw;" href="{{ url('/cmskontrola/index') }}">CONTROL CMS</a>
                        <a style="color:white; font-size:2vw;" href="{{ url('/logout') }}">Odjava</a>
                        @endif
                    @else
                        <a style="color:white; font-size:2vw;"href="{{ route('login') }}">Prijava</a>

                        @if (Route::has('register'))
                            <a style="color:white; font-size:2vw;"href="{{ route('register') }}">Registracija</a>
                        @endif
                    @endauth
                    
                </div>
            @endif
            <h1 style="font-size:2vw;position: absolute;margin-left: 10%;color:white;">Dobrodošli u aplikaciju!</h1>
            <h1 style="font-size:5vw;position: absolute;margin-left: 10%;color:white;">AUTOKAMP</h1>     
                <img src="img/polari.jpg" width="460" height="345">  
            </div>
        </div>

    </body>
</html>
