@extends('adm.layouts.layouts')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="content">
    <h2 class="content-heading">Edit Sop</h2>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div style="color:#ea4c88">
                <!-- Session Status -->
              <x-auth-session-status class="mb-4" :status="session('status')" />
          
              <!-- Validation Errors -->
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/admin/sop/update/{{$sop->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row push">
                            <div class="col-lg-4">
                              <p class="text-muted">
                                The most often used inputs you know and love
                              </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                              <div class="mb-4">
                                <label class="form-label">SOP title / name</label>
                                <input class="form-control" value="{{$sop->sop_title}}"  name="sop_title">
                              </div>
                              <div class="mb-4">
                                <label class="form-label">Preview existing file</label>
                                <iframe src="/sop/{{$sop->file}}#toolbar=0"" width="100%" height="500px">
                              </div>
                              <div class="mb-4 mt-4">
                                <label class="form-label">SOP File upload</label>
                                </iframe>
                                <input type="file" class="form-control" name="file">
                              </div>
                              <div class="mb-4">
                                <label class="form-label">Preview Form file</label>
                                <p>{{$sop->form}}</p>
                              </div>
                              <div class="mb-4 mt-4">
                                <label class="form-label">SOP Form upload</label>
                                </iframe>
                                <input type="file" class="form-control" name="form">
                              </div>
                              <button type="submit" class="btn btn-primary">Sop Update</button>
                            </div>
                          </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
        });
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    });
</script>
@endsection