
<x-layout>
    <a href="/">home</a>
      <h1>
            this is home page 
        </h1>

        <!--that name is called here -->
<h2>
    he is called like{{$name}}
</h2>

<form method="POST" action="/profile">
@csrf
@method('PATCH')
<input type="text" name="name" value="{{ old('name') }}">
@error('name')
<p class="error">{{ $message }}</p>
@enderror
<button type="submit">Update</button>
</form>


@fragment('user-list')
<ul>
@foreach ($users as $user)
<li>{{ $user->name }}</li>
@endforeach
</ul>
@endfragment

Lazy Loading Components:​
<!-- Use @once to prevent duplicate rendering of scripts/styles:​
​ -->
@once
<script src="/js/app.js"></script>
@endonce

</x-layout>