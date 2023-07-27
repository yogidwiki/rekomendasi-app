@if ($articles->count() > 0)
@foreach ($articles as $item)
  <div class="row d-flex  align-items-center gap-3 mb-5 p-3" style="border: 1px solid green;border-radius:18px;box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;">
    <div class="col-md-4" style="overflow: hidden;">
      <img src="{{ asset('/public/posts/' . $item->image) }}"  style="width: 100%; height: 250px; object-fit: cover;border-radius:18px;" alt="">
  </div>
  
    <div class="col-md-7">

      <a href="{{ route('detail.artikel', ['id' => $item->id]) }}" class="nav-link">
        <h2 class="fw-semibold mt-3">{{ $item->title }}</h2>
    </a>
      
      <span class="badge text-bg-success mb-2" >{{$item->category->name}}</span>
      
      <p >
        {{$item->description}} Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo ipsam alias, eligendi fugiat expedita unde assumenda incidunt velit repudiandae aperiam.
      </p>

      <div class="d-flex gap-3 align-items-center">
        <img src="{{asset('/image/profile.png')}}" style="width: 50px" alt="">
        <div class="row">
          <span class="fw-semibold fs-5">{{$item->author}}</span>
          <span>{{$item->publisher}}</span>
        </div>
      </div>
      

      <p class="text-end">{{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</p>
    </div>
  </div>
  @endforeach

@else
<div class="text-center">
    <p >-- Artikel ga Ada --</p>
    <a href="{{route('artikel')}}" class="btn btn-login btn-success">Tampilkan semua artikel</a>
</div>
    
@endif
