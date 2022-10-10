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
    
  </div>
</section>

<main>
  <div class="mx-4">
      <div
          class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
      >
          <header class="text-center">
              <h2 class="text-2xl font-bold uppercase mb-1">
                  Create a Gig
              </h2>
              <p class="mb-4">Post a gig to find a developer</p>
          </header>

          <form action="{{route('store-job')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="mb-6">
                  <label
                      for="company"
                      class="inline-block text-lg mb-2"
                      >Company Name</label
                  >
                  <input
                      type="text"
                      class="border border-gray-200 rounded p-2 w-full"
                      name="company"
                  />
                  <span class="text-red-600">
                    @error('company')
                        {{$message}}
                    @enderror
                  </span>
              </div>

              <div class="mb-6">
                  <label for="title" class="inline-block text-lg mb-2"
                      >Job Title</label
                  >
                  <input
                      type="text"
                      class="border border-gray-200 rounded p-2 w-full"
                      name="title"
                      placeholder="Example: Senior Laravel Developer"
                  />
                  <span class="text-red-600">
                    @error('title')
                        {{$message}}
                    @enderror
                  </span>
              </div>

              <div class="mb-6">
                  <label
                      for="location"
                      class="inline-block text-lg mb-2"
                      >Job Location</label
                  >
                  <input
                      type="text"
                      class="border border-gray-200 rounded p-2 w-full"
                      name="location"
                      placeholder="Example: Remote, Boston MA, etc"
                  />
                  <span class="text-red-600">
                    @error('location')
                        {{$message}}
                    @enderror
                  </span>
              </div>

              <div class="mb-6">
                  <label for="email" class="inline-block text-lg mb-2"
                      >Contact Email</label
                  >
                  <input
                      type="text"
                      class="border border-gray-200 rounded p-2 w-full"
                      name="email"
                  />
                  <span class="text-red-600">
                    @error('email')
                        {{$message}}
                    @enderror
                  </span>
              </div>

              <div class="mb-6">
                  <label
                      for="website"
                      class="inline-block text-lg mb-2"
                  >
                      Website/Application URL
                  </label>
                  <input
                      type="text"
                      class="border border-gray-200 rounded p-2 w-full"
                      name="website"
                  />
                  <span class="text-red-600">
                    @error('website')
                        {{$message}}
                    @enderror
                  </span>
              </div>

              <div class="mb-6">
                  <label for="tags" class="inline-block text-lg mb-2">
                      Tags (Comma Separated)
                  </label>
                  <input
                      type="text"
                      class="border border-gray-200 rounded p-2 w-full"
                      name="tags"
                      placeholder="Example: Laravel, Backend, Postgres, etc"
                  />
                  <span class="text-red-600">
                    @error('tags')
                        {{$message}}
                    @enderror
                  </span>
              </div>

              <div class="mb-6">
                  <label for="logo" class="inline-block text-lg mb-2">
                      Company Logo
                  </label>
                  <input
                      type="file"
                      class="border border-gray-200 rounded p-2 w-full"
                      name="logo"
                  />
                  <span class="text-red-600">
                    @error('logo')
                        {{$message}}
                    @enderror
                  </span>
              </div>

              <div class="mb-6">
                  <label
                      for="description"
                      class="inline-block text-lg mb-2"
                  >
                      Job Description
                  </label>
                  <textarea
                      class="border border-gray-200 rounded p-2 w-full"
                      name="description"
                      rows="10"
                      placeholder="Include tasks, requirements, salary, etc"
                  ></textarea
                  >
                  <span class="text-red-600">
                    @error('description')
                        {{$message}}
                    @enderror
                  </span>
              </div>

              <div class="mb-6">
                  <button
                      class="bg-laravel text-white rounded py-2 px-4 hover:bg-black text-lg"
                  >
                      Create Gig
                  </button>

                  <a href="{{route('manage')}}" class="text-black ml-4">
                      Back
                  </a>
              </div>
          </form>
      </div>
  </div>
</main>

@endsection