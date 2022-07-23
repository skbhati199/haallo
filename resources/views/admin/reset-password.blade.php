<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hallo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#2c3e50">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{asset('/Admin/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/elephant.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/application.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/login-2.min.css')}}">
  </head>
  <body>
    <div class="login">
      <div class="login-body">
      <h4 align="left"> <span style="color:green">{{Session::get('success-message')}}</span></h4>
          <h4 align="left"><span style="color:red">{{Session::get('fail-message')}}</span></h4>
        <a class="login-brand" href="#">
          <img class="img-responsive" src="{{asset('/Admin/img/logo-blk.png')}}" alt="logo">
        </a>
        <div class="login-form">
          <form method="post" action="{{url('password-reset')}}" data-toggle="validator">
          {{csrf_field()}}
            <div class="form-group">
              <label for="password">Enter New Password</label>
              <input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
              <input type="hidden" name='uid' value="{{$id}}">
            </div>
            <div class="form-group">
              <label for="password">Re-Enter New Password</label>
              <input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Confirm password." required>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
      </div>
      
    </div>
     <script src="js/vendor.min.js"></script>
    <script src="js/elephant.min.js"></script>
    <script src="js/application.min.js"></script>
   
  </body>
</html>