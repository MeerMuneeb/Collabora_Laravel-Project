<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>collabora.</title>
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <link href="{{ asset('styles.css') }}" rel="stylesheet">
   <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
   <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="{{ asset('js/script.js') }}"></script>

</head>
<body>
   @if(request()->has('success'))
    <script>
        alert("{{ request('success') }}");
    </script>
   @endif

   {{-- @if(request()->session()->has('user'))
      @yield ('script2')
   @endif --}}

   
   {{View::make('header')}}
   @yield('content')
   {{View::make('footer')}}

   


</body>
</html>