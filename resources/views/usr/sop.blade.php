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
    <h2 class="content-heading">Sop & Form</h2>
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
                            <th>Sop title</th>
                            <th>Form</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                          @foreach ($sops as $item)
                          <tr>
                            <td>{{$no++}}</td>
                            <td class="fw-semibold"><a href="/maa/sop/{{$item->id}}" class="lk">{{$item->sop_title}}</a></td>
                            @if ($item->form == null)
                            <td> Empty </td>
                            @else
                            <td> <a href="/maa/sop/downloadfile/{{$item->id}}" onclick="return confirm('Download this file ?')"><i class="fa-solid fa-file"></i> Download</a> </td>
                            @endif
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
