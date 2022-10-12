<header id="page-header">
  <div class="content-header p-3">
    <div class="space-x-1">
      <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
        <i class="fa fa-fw fa-bars"></i>
      </button>
    </div>
    <div class="space-x-1">
        <div class="dropdown d-inline-block">
          <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user d-sm-none"></i>
            <span class="d-none d-sm-inline-block fw-semibold">{{Auth()->user()->name}}</span>
            <i class="fa fa-angle-down opacity-50 ms-1"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
            <div class="p-2">
              <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="/maa/profile">
                <span>Profile</span>
                <i class="fa fa-fw fa-user opacity-25"></i>
              </a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a 
                  :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();"                     
                  class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="op_auth_signin.html">
                    <span>Sign Out</span>
                    <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                  </a>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div> 
</header>
<nav id="sidebar">
    <div class="sidebar-content">
      <div class="content-header justify-content-lg-center">
        <div>
          <span class="smini-visible fw-bold tracking-wide fs-lg">
            c<span class="text-primary">b</span>
          </span>
          <a class="link-fx fw-bold tracking-wide mx-auto" href="index.html">
            <span class="smini-hidden">
              <i class="fa fa-fire text-primary"></i>
              <span class="fs-4 text-dual">EIP</span><span class="fs-4 text-primary">Maa</span>
            </span>
          </a>
        </div>

        <div>
          <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
            <i class="fa fa-fw fa-times"></i>
          </button>
        </div>
      </div>
      <div class="js-sidebar-scroll">
        <!-- Side User -->
        <div class="content-side content-side-user px-0 py-0">
          <!-- Visible only in mini mode -->
          <div class="smini-visible-block animated fadeIn px-3">
            <img class="img-avatar img-avatar32" src="{{asset('profile/'.Auth()->user()->image)}}" alt="">
          </div>
          <!-- END Visible only in mini mode -->

          <!-- Visible only in normal mode -->
          <div class="smini-hidden text-center mx-auto">
            <a class="img-link" href="/maa/profile">
              @if(Auth()->user()->image)
              <img class="img-avatar" src="{{asset('profile/'.Auth()->user()->image)}}" alt="">
              @else
              <img class="img-avatar" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
              @endif
            </a>
            <ul class="list-inline mt-3 mb-0">
              <li class="list-inline-item p-1">
                <a class=" text-dual fs-sm fw-semibold text-uppercase" href="/maa/profile">
                  {{Auth()->user()->name}}</a>
              </li>
            </ul>
          </div>
          <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
          <ul class="nav-main space-y-3">
            <li class="nav-main-item">
              <a class="nav-main-link {{ (request()->is('/')) ? 'active' : '' }}" href="/">
                <i class="nav-main-link-icon fa fa-house-user"></i>
                <span class="nav-main-link-name">Dashboard</span>
              </a>
            </li>
            <li class="nav-main-item ">
              <a class="nav-main-link {{ (request()->is('maa/regulation*')) ? 'active' : '' }}" href="/maa/regulation">
                <i class="nav-main-link-icon fa fa-handshake"></i>
                <span class="nav-main-link-name">Company Regulation</span>
              </a>
            </li>
            <li class="nav-main-item ">
              <a class="nav-main-link {{ (request()->is('maa/sop*')) ? 'active' : '' }}" href="/maa/sop">
                <i class="nav-main-link-icon fa fa-eye"></i>
                <span class="nav-main-link-name">Sop & Form</span>
              </a>
            </li>
            <li class="nav-main-item ">
              <a class="nav-main-link {{ (request()->is('maa/news*')) ? 'active' : '' }}" href="/maa/news">
                <i class="nav-main-link-icon fa fa-newspaper"></i>
                <span class="nav-main-link-name">Internal News</span>
              </a>
            </li>
            <li class="nav-main-item ">
              <a class="nav-main-link " href="#">
                <i class="nav-main-link-icon fa fa-graduation-cap"></i>
                <span class="nav-main-link-name">E Learning</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>