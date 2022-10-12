@extends('adm.layouts.layouts')
@section('style')

@endsection
@section('content')
<main id="main-container">
    <div class="#" style="background-image: url('{{asset('/assets/media/photos/photo13@2x.jpg')}}');">
      <div class="bg-black-75 py-4">
        <div class="content content-full text-center">
  
          <div class="mb-3">
            <a class="img-link" href="#">
              @if($user->image)
              <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('profile/'.$user->image)}}" alt="">
              @else
              <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
              @endif
            </a>
          </div>

          <h1 class="h3 text-white fw-bold mb-2">{{$user->name}}</h1>
          <h2 class="h5 text-white-75">
            Login as admin
          </h2>
        </div>
      </div>
    </div>
    <!-- END User Info -->

    <!-- Main Content -->
    <div class="content">
      <!-- User Profile -->
      <div class="block block-rounded">
          <x-auth-session-status class="mb-4" :status="session('status')" />
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="block-header block-header-default">
          <h3 class="block-title">
            <i class="fa fa-user-circle me-1 text-muted"></i> User Profile
          </h3>
        </div>
        <div class="block-content">
            <form action="/admin/profile/update/{{Auth()->user()->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row items-push">
              <div class="col-lg-3">
                <p class="text-muted">
                  Your account’s vital info.
                </p>
              </div>
              <div class="col-lg-7 offset-lg-1">
                <div class="mb-4">
                  <label class="form-label" for="profile-settings-name">Name</label>
                  <input type="text" class="form-control form-control-lg" id="profile-settings-name" name="name" placeholder="Enter your name.." value="{{Auth()->user()->name}}">
                </div>
                <div class="mb-4">
                  <label class="form-label" for="profile-settings-email">Email Address</label>
                  <input type="email" class="form-control form-control-lg" id="profile-settings-email" name="email" placeholder="Enter your email.." value="{{Auth()->user()->email}}">
                </div>
                <div class="row mb-4">
                  <div class="col-md-10 col-xl-6">
                    <div class="push">
                      @if($user->image)
                      <img class="img-avatar" src="{{asset('profile/'.$user->image)}}" alt="">
                      @else
                      <img class="img-avatar" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
                      @endif
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="profile-settings-avatar">Choose new avatar</label>
                      <input class="form-control" type="file" id="profile-settings-avatar" name="image">
                    </div>
                  </div>
                </div>
                <div class="mb-4">
                  <button type="submit" class="btn btn-alt-primary">Update</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">
            <i class="fa fa-asterisk me-1 text-muted"></i> Change Password
          </h3>
        </div>
        <div class="block-content">
            @if($user->roles[0]->id == 2)
            <form action="/admin/profile/updatepassword/{{Auth()->user()->id}}" method="POST">
            @elseif($user->roles[0]->id == 3)
            <form action="/maa/profile/updatepassword/{{Auth()->user()->id}}" method="POST">
            @endif
            @csrf
            <div class="row items-push">
              <div class="col-lg-3">
                <p class="text-muted">
                  Changing your sign in password is an easy way to keep your account secure.
                </p>
              </div>
              <div class="col-lg-7 offset-lg-1">
                <div class="mb-4">
                  <label class="form-label">New Password</label>
                  <input type="password" class="form-control form-control-lg"  name="password">
                </div>
                <div class="mb-4">
                  <label class="form-label">Confirm New Password</label>
                  <input type="password" class="form-control form-control-lg"  name="password_confirmation">
                </div>
                <div class="mb-4">
                  <button type="submit" class="btn btn-alt-primary">Update</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</main>
@endsection

@section('javascript')
  
@endsection