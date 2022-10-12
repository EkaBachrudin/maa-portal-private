@extends('usr.layouts.layouts')
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css" integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">
<style>
</style>
@endsection
@section('content')
<div class="content">
  </div>
  <div class="content">
    <h2 class="content-heading">latest News</h2>
    <div class="row">
      <div class="col-md-12">
        <section class="splide">
          <div class="splide__track">
            <ul class="splide__list">
              @foreach ($news as $item)
              <li class="splide__slide" style="min-width: 300px;max-width: 300px">
                <div class="block block-rounded d-flex flex-column h-100 mb-0 card shadow-sm">
                  <div class="block-content block-content-full bg-image flex-grow-0" 
                  style="height: 180px; background-image: url('news/{{$item->image}}');">
                  </div>
                  <div class="block-content flex-grow-1">
                    <h5 class="mb-1">
                      <a class="text-dark" href="/maa/news/{{$item->id}}">
                        {{$item->title}}
                      </a>
                    </h5>
                    
                  </div>
                  <div class="block-content py-1 bg-body-light flex-grow-0">
                    <div class="row g-0 fs-sm">
                      <div class="col-md-12 mb-3">
                        <span>Pubished by  {{$item->publish}}</span>
                        <span>Post on  {{$item->created_at->isoFormat('D MMM YY')}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js" integrity="sha256-EZ92IjxfDkxLNzfU5LeyYSHivLIGLygoFLDrhTVjRxw=" crossorigin="anonymous"></script>
<script>
 new Splide( '.splide', {
  type    : 'slide',
  gap     : '10px',
  perPage : 2,
} ).mount();
</script>
@endsection