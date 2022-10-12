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
    <h2 class="content-heading">Company Regulation</h2>
    <hr>
</div>
<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body table-responsive">
                    <form action="#">
                        <div class="input-group w-50">
                          <input type="text" class="form-control" id="side-overlay-search" name="search" placeholder="Search..">
                          <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </form>
                    <table class="table table-striped table-vcenter">
                        <thead>
                          <tr>
                            <th style="width: 10%">No</th>
                            <th>Regulation</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                          @foreach ($regulations as $item)
                          <tr>
                            <td>{{$no++}}</td>
                            <td class="fw-semibold"><a href="/maa/regulation/{{$item->id}}" class="lk">{{$item->title}}</a></td>
                            <td>{{$item->created_at->isoFormat('D MMM YY')}}</td>
                        </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
  
@endsection