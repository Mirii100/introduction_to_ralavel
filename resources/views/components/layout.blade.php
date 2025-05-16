<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>root</title>
    @vite(['resources/css/app.css'])
</head>
</head>
<body class="bg-grey-900 text-blue">
<!--this is the root that you can use to place common attributes to all pages  -->
<!-- 
use slot inside double curry braces like 
{{$slot }}

-->
<div class="flex flex-col items-center justify-center min-h-screen">
       {{ $slot }}
    </div>

</body>
</html>