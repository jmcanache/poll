<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>BAM Polls</title>
    
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-xs-12">
                <figure>
                    <img src="{{URL::asset('imgs/Logo.png')}}" alt="BAM logo" class="bam-logo">
                </figure>  
                
                <br>
                
                @yield('content')

            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
</body>