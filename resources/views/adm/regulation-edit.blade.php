@extends('adm.layouts.layouts')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="content">
    <h2 class="content-heading">Edit Regulation</h2>
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
                    <form action="/admin/regulation/update/{{$regulation->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row push">
                            <div class="col-lg-4">
                              <p class="text-muted">
                                Edit Regulation Information
                              </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                              <div class="mb-4">
                                <label class="form-label">Regulation title</label>
                                <input class="form-control" value="{{$regulation->title}}" name="title">
                              </div>
                              <div class="mb-4">
                                <label class="form-label">Regulation Content</label>
                                <textarea class="form-control" name="content" name="content" rows="10">{{$regulation->content}}</textarea>
                              </div>
                              <div class="mb-4">
                                <label class="form-label">Preview existing file</label>
                                <iframe src="/regulation/{{$regulation->file}}#toolbar=0"" width="100%" height="500px">
                              </div>
                              <div class="mb-4">
                                <label class="form-label">Preview Form file</label>
                                <p>{{$regulation->file}}</p>
                              </div>
                              <div class="mb-4 mt-4">
                                <label class="form-label">Regulation Form upload</label>
                                </iframe>
                                <input type="file" class="form-control" name="file">
                              </div>
                              <button type="submit" class="btn btn-primary">Regulation update</button>
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