@extends('layouts.app')

@section('content')

<!-- Hero -->
<section class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4">
  <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
    style="background-image: url('images/laravel-logo.png')"></div>

  <div class="z-10">
    <h1 class="text-6xl font-bold uppercase text-white">
      Lara<span class="text-black">Gigs</span>
    </h1>
    <p class="text-2xl text-gray-200 font-bold my-4">
      Find or post Laravel jobs & projects
    </p>
    @if(Auth::user() && Auth::user()->id == '')
    <div>
      <a href="{{route('register')}}"
        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">Sign
        Up to List a Gig</a>
    </div>
    @endif
  </div>
</section>

<main>
  <x-search />

  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @foreach($listing as $list)
      <x-listing-card :list="$list" />
    @endforeach
  </div>
  <div class="mt-6 p-4">
    {{$listing->links()}}
  </div>
</main>

@endsection