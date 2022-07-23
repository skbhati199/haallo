@include('admin.header')
<div class="profilePage"></div>
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
                <h4 align="left"> <span style="color:green">{{Session::get('success-message')}}</span></h4>
          <h4 align="left"><span style="color:red">{{Session::get('fail-message')}}</span></h4>
            <h1 class="title-bar-title">
              <span class="d-ib">Change Password /</span>
              <a href="{{url('/admin/profile')}}">Back</a>
            </h1>
        </div>

        <div class="row gutter-xs">


            <div class="col-md-8 card panel-body  " id="">
                <div class="col-sm-12 col-md-12">

                    <div class="demo-form-wrapper">
                        <form id="pass-change" action="{{url('/admin/password-change')}}"  method="post" class="form form-horizontal">
                        {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-md-8">
                                    <label for="" class=" control-label">Old Password</label>

                                    <input id="old-password" name="old_password" class="form-control" type="password">
                                    <span id="old-password-err"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <label for="" class=" control-label">New Password</label>

                                    <input id="password" name="password" class="form-control" type="password">
                                    <span id="password-err"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <label for="" class=" control-label">Confirm Password</label>

                                    <input id="cpassword" name="cpassword" class="form-control" type="password">
                                    <span id="cpassword-err"></span>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <div class=" col-sm-8  col-md-8 ">
                                    <button id="change-pass" class="btn btn-primary btn-block " type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>

@include('admin.footer')

<script>
$("#change-pass").click(function(){
    var oldpassword = $("#old-password").val();
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();
    $("#old-password-err").empty();
    $("#password-err").empty();
    $("#cpassword-err").empty();
     if(oldpassword.charAt(0)==" "){
        $("#old-password-err").text("First character shouldn't be space").css('color','red');
       return false;
     }
     if(oldpassword==""){
    //alert();
       $("#old-password-err").text("Enter old  password").css('color','red');
       return false;
     }
     if(password.charAt(0)==" "){
        $("#password-err").text("First character shouldn't be space").css('color','red');
       return false;
     }           
     if(password==""){
       $("#password-err").text("Enter  password").css('color','red');
       return false;
     }
     if(password.length<8){
       $("#password-err").text("Password should be minimum 8 character").css('color','red');
       return false;
     }
     if(password!=cpassword){
       $("#cpassword-err").text("Confirm password is not equal to password").css('color','red');
       return false;
     }
});

</script>