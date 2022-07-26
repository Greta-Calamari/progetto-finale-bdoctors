<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
        .container {
            height: 90vh;
            background-image: url("https://www.asrt.org/images/default-source/404-page/404-x-ray.jpg");
            background-size: 40% cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .loupe {
            position: absolute;
            background-color: black;
            background-image: url("https://www.asrt.org/images/default-source/404-page/404-alt-x-ray.jpg");
            background-size: 40% cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: center center;
            width: 120px;
            height: 120px;
            border-radius: 0px;
            border: 5px solid #808080;
            cursor: none;
            top: 25%;
            left: 40%;
        }
        .error{
            color: #053777;
            font-size: 50px;
            font-weight: bold;
            text-align: center;
            
        }
        </style>
    </head>
    <body>
        
        <div class="main-404 container">
            <div class="error">
                @yield('code')
                @yield('message')
            </div>
            <div class="loupe">
            </div>

        </div> 
        {{-- <div class="flex-center position-ref full-height">
            <div class="code">
                @yield('code')
            </div>

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div> --}}
        </div>
        <script>
            var loupe;
            loupe = document.querySelector('.loupe');
            document.addEventListener('mousemove', function(ev) {
            loupe.style.top = (ev.clientY - 65) + 'px';
            return loupe.style.left = (ev.clientX - 65) + 'px';
            });
        </script>
    </body>
</html>
