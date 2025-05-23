@extends('layouts.base')

@section('title')
Dashboard
@endsection
@section('content')

 <!-- <div >


<div >
    dashboard 
</div>

    <div >
        Welcome, {{ auth()->user()->name }}! -->
    <!-- </div>
    <br><br>
  


</div>
 Welcome, {{ auth()->user()->name }}!
<br><br><br><br> --> 
 

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/education/showcase-1.webp);">
      <div class="container position-relative">
        <h1> Welcome, {{ auth()->user()->name }}!</h1>
        <p>Your selected program: {{ $user->program->title ?? 'No program selected' }}</p>
        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Admissions Section -->
    <section id="admissions" class="admissions section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 g-lg-5">
          <div class="col-lg-6">


<div >
    <h1 class="text-3xl font-bold mb-4">Welcome, {{ $user->name }}</h1>

    <div class="bg-green  p-4 rounded shadow">
       <p><strong>Program:</strong> {{ $program?->title ?? 'No program selected' }}</p>

        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Fees Paid:</strong> ${{ number_format($user->fees_paid, 2) }}</p>
       <div class="mt-4 space-x-4">
  <a href="{{ route('dashboard.fee-pdf.view') }}"
     target="_blank"
      
   class="bg-green-500 text-blue px-4 py-2 rounded">
    View Fee Structure
  </a>

  <a href="{{ route('dashboard.fee-pdf.download') }}"
    
   class="bg-green-500 text-blue px-4 py-2 rounded">
    Download Fee Structure
  </a>
</div>


    </div>

    <div class="mt-6">
        <h2 
   class="bg-green-500 text-brown-500 px-5 py-6 rounded">Update Profile</h2>
        <form action="{{ route('dashboard.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full p-2 border rounded" placeholder="Name">

            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full p-2 border rounded" placeholder="Email">

            <input type="password" name="password" class="w-full p-2 border rounded" placeholder="New Password (optional)">

            <input type="file" name="avatar" class="w-full p-2 border rounded">

            <button type="submit" class="bg-blue-500 text-green px-4 py-2 rounded">Update</button>
        </form>
    </div>
</div>

<!-- Display success message -->
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>



            
          </div>

         

       
      </div>
      @endif


<div class="mt-6 bg-white p-6 rounded-lg shadow">
  <h3 class="text-xl font-semibold mb-4">Pay Fees</h3>
  <form action="{{ route('dashboard.payFee') }}" method="POST" class="flex items-center space-x-3">
    @csrf

    <input
      type="number"
      name="amount"
      step="0.01"
      min="0.01"
      placeholder="Amount (e.g. 100.00)"
      class="w-32 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-300 @error('amount') border-red-500 @enderror"
    />

    <button
      type="submit"
      class="bg-sky-500 text-green px-6 py-6 rounded-lg hover:bg-sky-600 transition m-auto"
    >
      Pay
    </button>
  </form>

  @error('amount')
    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
  @enderror
</div>

      </div>
    </section><!-- /Admissions Section -->



@endsection


