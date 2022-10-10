@props(['list'])

<div class="bg-gray-50 border border-gray-200 rounded p-6">
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block" src="{{asset('storage/'.$list->logo)}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="{{route('show-detail',['id' => $list->id])}}">{{$list->title}}</a>
      </h3>
      <div class="text-xl font-bold mb-4">{{$list->company}}</div>
      <x-tags-card tags="{{$list->tags}}"/>
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i>
        {{$list->location}}
      </div>
    </div>
  </div>
</div>