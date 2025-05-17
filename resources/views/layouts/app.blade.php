<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>application</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-100">
    <nav class="p-6 bg-white flex justify-between mb-6">

    <ul class="flex items-center">
        @auth
 <li><a href="#"class="p-3">homepage</a></li>
        <li><a href="{{route('dashboard')}}"class="p-3">Dashboard</a></li>
        <li><a href="#"class="p-3">Post</a></li>
       
           <li><a href="{{route('logout')}}"class="p-3">Logout</a></li>
        @endauth
        @guest
  <li><a href="{{route('login')}}"class="p-3">login</a></li>
          <li><a href="{{route('register')}}"class="p-3">Register</a></li>
        @endguest
       
    </ul>
    </nav>
    @yield('content')
</body>
</html>