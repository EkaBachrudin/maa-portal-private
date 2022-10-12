@extends('usr.layouts.layouts')
@section('style')
    <style>
        .lk{
            color: rgb(84, 84, 84)
        }
        .lk:hover{
            text-decoration: underline
        }
    </style>
@endsection
@section('content')
<div class="content">
    <h2 class="content-heading">All employee News</h2>
</div>
<div class="content">
    <div class="row">
        <form action="#">
            <div class="input-group w-50 ">
              <input type="text" class="form-control" id="side-overlay-search" name="search" placeholder="Search..">
              <button type="submit" class="btn btn-secondary">
                <i class="fa fa-search"></i>
              </button>
            </div>
        </form>
        @foreach ($news as $item)
        <div class="col-12 col-md-6 col-lg-6 col-xl-4 pt-4">
          <div class="mb-5">
            <div class="overflow-hidden rounded mb-3" style="height: 200px;">
              <a class="img-link" href="/maa/news/{{$item->id}}">
                <img class="img-fluid" src="/news/{{$item->image}}" alt="">
              </a>
            </div>
            <h3 class="fw-bold mb-2">{{$item->title}}</h3>
            <div class="fs-sm fw-medium text-muted mb-2">
              <span class="me-3">
                <i class="fa fa-fw fa-calendar-alt opacity-50 me-1"></i> {{$item->created_at->isoFormat('D MMM YY')}}
              </span>
              <a class="text-muted me-3" href="be_pages_generic_profile.html">
                <i class="fa fa-fw fa-user opacity-50 me-1"></i> {{$item->publish}}
              </a>
            </div>
            <p class="fs-sm mb-2">
              {{$item->short}}
            </p>
            <a class="fs-sm link-fx fw-semibold" href="/maa/news/{{$item->id}}">Read More..</a>
          </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('javascript')
  
@endsection
