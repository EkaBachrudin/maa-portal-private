
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>EIP MAA</title>

    <meta name="description" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
  </head>
  <body>
    <div id="page-container" class="main-content-boxed">

      <main id="main-container">
        <div class="bg-body-dark">
          <div class="row mx-0 justify-content-center">
            <div class="hero-static col-lg-6 col-xl-4">
              <div class="content content-full overflow-hidden">
                <div class="py-4 text-center">
                  <a class="link-fx fw-bold" href="index.html">
                    <span class="fs-4 text-body-color">EIP</span><span class="fs-4">MAA</span>
                  </a>
                  <h1 class="h3 fw-bold mt-4 mb-2">Welcome to Your Dashboard</h1>
                  <h2 class="h5 fw-medium text-muted mb-0">Start yout session</h2>
                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form class="js-validation-signin" action="{{route('login')}}" method="POST">
                  @csrf
                  <div class="block block-themed block-rounded block-fx-shadow">
                    <div class="block-header bg-gd-dusk">
                      <h3 class="block-title">Please Sign In</h3>
                    </div>
                    <div class="block-content">
                      <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="login-username" name="email" placeholder="Enter your username">
                        <label class="form-label" for="login-username">Email</label>
                      </div>
                      <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter your password">
                        <label class="form-label" for="login-password">Password</label>
                      </div>
                      <div class="row">
                        <div class="col-sm-6 d-sm-flex align-items-center push">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="login-remember-me" name="remember">
                            <label class="form-check-label" for="login-remember-me">Remember Me</label>
                          </div>
                        </div>
                        <div class="col-sm-6 text-sm-end push">
                          <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                            Sign In
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
    <script src="assets/js/codebase.app.min.js"></script>

    <script src="assets/js/lib/jquery.min.js"></script>

    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/js/pages/op_auth_signin.min.js"></script>
  </body>
</html>