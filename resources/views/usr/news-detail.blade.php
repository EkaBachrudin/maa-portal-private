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
    <div class="row justify-content-center text-center">
        <div class="d-flex justify-content-center col-lg-10 col-md-10 col-12">
            <h1 class="">{{$news->title}}</h1>
        </div>
        <p class="text-mute"><i class="fa fa-fw fa-user opacity-50 me-1"></i> post by {{$news->publish}}</p>
        <div class="d-flex justify-content-center col-lg-10 col-md-10 col-12">
            <img class="rounded img-fluid w-100 shadow-lg" src="/news/{{$news->image}}" alt="Image">
        </div>
    </div>

    <div class="row mt-4 justify-content-center">
        <div class="d-flex justify-content-center col-lg-10 col-md-10 col-12">
            <div>
                {!!$news->content!!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
  
@endsection
