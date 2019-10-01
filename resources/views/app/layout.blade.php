<!DOCTYPE html>
<html lang="{{ config('app.locale')}}" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" integrity="sha256-ujE/ZUB6CMZmyJSgQjXGCF4sRRneOimQplBVLu8OU5w=" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('css/theme.css')}}">
  <title>Un regard sur l'Uvéite | {{ $title }}</title>
</head>
<body>
@include('app.navbar',['pagename' => $title])
@yield('content')

<script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

@yield('scripts')

</body>
</html>
