@extends('adm.layouts.layouts')
@section('style')

@endsection
@section('content')
<div class="content">
    <h2 class="content-heading">Edit user</h2>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
             <x-auth-session-status class="mb-4" :status="session('status')" />
             <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="block block-rounded">
                <div class="block-content">
                  <form action="/admin/user/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-lg-4">
                        <p class="text-muted">
                          Edit this user information
                        </p>
                      </div>
                      <div class="col-lg-8 col-xl-5">
                        <div class="form-floating mb-4">
                          <input type="text" class="form-control" name="name" placeholder="John Doe" autocomplete="off" value="{{$user->name}}">
                          <label class="form-label" for="example-text-input-floating">Name</label>
                        </div>
                        <div class="form-floating mb-4">
                          <input type="email" class="form-control" id="example-email-input-floating" name="email" placeholder="john.doe@example.com" autocomplete="off" value="{{$user->email}}">
                          <label class="form-label" for="example-email-input-floating">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                          <select name="role" class="form-control">
                            <option value="2" {{$user->roles[0]->pivot->role_id == 2 ? 'selected' : ''}}>Admin</option>
                            <option value="3" {{$user->roles[0]->pivot->role_id == 3 ? 'selected' : ''}}>User</option> 
                          </select>
                          <label class="form-label" for="example-email-input-floating">Role</label>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-10 col-xl-6">
                              <div class="push">
                                <img class="img-avatar" src="{{asset('profile/'.$user->image)}}" alt="">
                              </div>
                              <div class="mb-4">
                                <label class="form-label" for="profile-settings-avatar">Choose new avatar</label>
                                <input class="form-control" type="file" id="profile-settings-avatar" name="image">
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary mb-3">Edit user</button>
                      </div>
                    </div>
                  </form>
                  <hr>
                  <form action="/admin/user/updatepassword/{{$user->id}}" method="POST" class="mt-5">
                    @csrf
                    <div class="row">
                      <div class="col-lg-4">
                        <p class="text-muted">
                          Change Password for this user
                        </p>
                      </div>
                      <div class="col-lg-8 col-xl-5">
                        <div class="form-floating mb-4">
                          <input type="password" class="form-control" id="example-password-input-floating" name="password" placeholder="Password" autocomplete="off">
                          <label class="form-label" for="example-password-input-floating">Password</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="example-password-input-floating" name="password_confirmation" placeholder="Password" autocomplete="off">
                            <label class="form-label" for="example-password-input-floating">Confirm Password</label>
                        </div>
                          <button type="submit" class="btn btn-primary mb-3">Change password for this user</button>
                      </div>


                      <div class="m-2">
                        <a href="/admin/news/delete/{{$user->id}}" class="btn btn-danger" onclick="return confirm('You sure delete this user')"> Delete User </a>
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
  
@endsection