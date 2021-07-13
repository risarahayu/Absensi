<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Home</title>
    <style>
        body {
            box-sizing: border-box;

        }

        fieldset {
            padding: 1em;
            font: 80%/1 sans-serif;
            border: 2px solid #04A8EF
        }

        legend {
            padding: 0.2em 0.5em;
            border: 2px solid white;
            color: black;
            font-size: 90%;
            text-align: left;
            width: auto;
        }

        .form-control {
            border: 1px solid #F4C304;
        }

        .container-login {
            margin: auto;
            width: 50;
            height: 50%;

        }
    </style>
</head>

<body>
    @include('layout.navigation')
    @include('alert')
    @yield('content')


</body>

</html>