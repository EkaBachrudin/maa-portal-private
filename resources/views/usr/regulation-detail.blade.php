@extends('usr.layouts.layouts')
@section('style')
    <style>
           
    </style>
@endsection
@section('content')
<div class="content">
    <h2 class="content-heading">Detail Regulation</h2>
    <hr>
</div>
<div class="content">
    <div class="row my-3 justify-content-center">
        <div class="col-md-10">
            <h3>{{$regulation->title}}</h3>
            <br>
            <p>{{$regulation->content}}</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if($regulation->file)
            <embed controlsList="nodownload" src="/regulation/{{$regulation->file}}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="800px">
            @else
            <h2>PDF Not found . . . .</h2>
            @endif
        </div>
    </div>
</div>
@endsection

@section('javascript')
 <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>
<script>
     $(document).ready(function() {
    $(window).on("contextmenu",function(e){
       return false;
    }); 
}); 
 document.onkeydown = function (e) {
    e = e || window.event;//Get event
    if (e.ctrlKey) {
        var c = e.which || e.keyCode;//Get key code
        switch (c) {
            case 83://Block Ctrl+S
            case 87://Block Ctrl+W --Not work in Chrome
            case 73://Block Ctrl+I
            case 67: //Block Ctrl+C
                e.preventDefault();     
                e.stopPropagation();
            break;
        }
    }
};
</script>
@endsection