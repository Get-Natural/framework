<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('SITE_NAME') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700|Muli:400,700" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Muli', sans-serif;
            line-height: 1.4;
            color: #506f8c;
            -webkit-font-smoothing: antialiased;
        }
        h1  {
            margin: 0 0 20px;
            font-family: 'Montserrat', sans-serif;
            color: #2c3e50;
            font-size: 45px;
        }
        main {
            max-width: 500px;
            text-align: center;
        }
        nav a {
            padding: 0 0 3px;
            margin: 0 5px;
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            color: #2c3e50;
            text-decoration: none;
            border-bottom: 1px solid #2c3e50;
            transition: all 0.45s ease-in-out;
        }
        nav a:hover {
            color: #D7263D;
            border-color: #D7263D;
        }
        .waving-hand {
            font-size: 20px;
            margin-right: 10px;
            animation: waver 0.65s alternate infinite;
            animation-timing-function: ease-in-out;
        }
        small {
            display: block;
            margin-top: 20px;
        }
        @keyframes waver {
            0% {transform: rotate(-25deg);}
            100% {transform: rotate(30deg);}
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
