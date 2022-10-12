@extends('adm.layouts.layouts')
@section('style')
<style>
  .lk{
    color: rgb(84, 84, 84)
  }
  
  .lk:hover{
    transition: all;
    text-decoration: underline;
  }
</style>
@endsection
@section('content')
<div class="content">
    <h2 class="content-heading">Dashboard</h2>
    <h1><strong>Welcome to <span class="text-dual">portal</span><span class="text-primary">maa</span></strong></h1>
    <p>Select what you wont to control</p>
    <ul>
      <li><a href="/admin/news" class=" lk">Internal News</a></li>
      <li><a href="/admin/sop" class=" lk">Sop & Form</a></li>
      <li><a href="/admin/user" class=" lk">User Control</a></li>
      <li><a href="/admin/regulation" class=" lk">Regulation</a></li>
      <li><a href="/admin/dashboard" class=" lk">Elearning</a></li>
    </ul>
  </div>
@endsection

@section('javascript')
  
@endsection