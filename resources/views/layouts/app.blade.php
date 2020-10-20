<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PhotoShow</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
   @include('inc.navbar')
   <div class="container">
      @include('inc.messages')
       @yield('content')
   </div>
    
</body>
</html>