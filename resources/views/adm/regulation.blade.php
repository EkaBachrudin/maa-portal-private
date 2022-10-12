@extends('adm.layouts.layouts')
@section('style')
<link rel="stylesheet" href="{{asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css')}}">
@endsection
@section('content')
<div class="content">
    <h2 class="content-heading inline-block">All Regulation</h2>
    <a href="/admin/regulation/add" class="btn btn-primary"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line>
        </svg> Add Regulation </a>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <x-auth-session-status class="mb-4" :status="session('status')" />
          
              <!-- Validation Errors -->
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
          <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Regulation </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1 @endphp
                            @foreach ($regulations as $regulation)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$regulation->title}}</td>
                                <td class="space-x-3">
                                    <a href="/admin/regulation/edit/{{$regulation->id}}"><i class="fa fa-edit text-info"></i></a>
                                    <a href="/admin/regulation/delete/{{$regulation->id}}" onclick="return confirm('U sure ?')"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
    </script>
@endsection