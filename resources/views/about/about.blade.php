<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About route </title>
    @vite(['resources/css/app.css'])
</head>
</head>
<body>
      <a href="/">home</a>
    <div>
        <h1>
            this is about page 
        </h1>

        <!--that name is called here -->
<h2>
    it is called like{{$name}}
</h2>
    </div>
    <!-- Defining a Stack:​
​ -->
@stack('scripts')

<!-- Pushing to a Stack:​
​ -->
@push('scripts')
<script src="/js/app.js"></script>
@endpush


<!-- Prepending to a Stack:​
​ -->
@prepend('scripts')
<script src="/js/vendor.js"></script>
@prepend


Method Spoofing

@method('PUT')<!-- Outputs: <input type="hidden" name="_method" value="PUT"> -->
</body>
</html>