<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SPE Admin</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="SPE Admin">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-night-sky bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="app-logo-inverse mx-auto mb-3"></div>
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <h2>Smart Pharmacy Admin</h2>
                                                    <h5>Please login to continue</h5>
                                                  <!--<img src="/images/spe_logo.png" style="width: 300px;" alt="" />-->
                                                </div>
                                            </div>
                                            <br/>
                                        </h4>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                      <div class="form-row">
                                          <div class="col-md-12">
                                              <div class="position-relative form-group">
                                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <div class="position-relative form-group">
                                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="position-relative form-check">
                                        <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                        <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                                      </div>
                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                    </div>
                                </div>
                              </form>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © SPE 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
