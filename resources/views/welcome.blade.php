<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GIM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('images/2f.jpg');
                color: white;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 0vh;
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
                text-align: left;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 10px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .login_btn{
    color: white;
    background-color: white;
    width: 100px;
    }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
        <div class="content">
                <div class="title m-b-md">
                &#9733;&#9733; Gimnasio fit &#9733;&#9733;
                    
                </div>
     
      
   </nav>
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
       
        

               
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="login_btn">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="login_btn ">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif

           
        </nav>

               
                  
                
            
        </div>
    </body>
</html>
