@props(['tags'])
<ul class="flex">
  @foreach(explode(',',$tags) as $val)
  <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
    <a href="{{route('/',['tag'=>$val])}}">{{$val}}</a>
  </li>
  @endforeach
</ul>