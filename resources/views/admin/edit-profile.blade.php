@include('admin.header')
<div class="profilePage"></div>
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h4 align="left"> <span style="color:green">{{Session::get('success-message')}}</span></h4>
          <h4 align="left"><span style="color:red">{{Session::get('fail-message')}}</span></h4>
            <h1 class="title-bar-title">
              <span class="d-ib">Edit Admin Profile /</span>
              <a href="{{url('/admin/profile')}}">Back to list</a>
            </h1>

        </div>
        <div class="row gutter-xs">
            <div class="col-md-8 card panel-body" style="box-shadow: 0px 0px 14px #999;">
                <div class="col-sm-12 col-md-12">
                    <div class="demo-form-wrapper">
                        <form id="update-pro" action="{{url('/admin/update-profile')}}" method="post" class="form form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-group">
                             <div class="col-md-6">
                              <label class=" control-label">Name</label>
                              <input id="a-name" name="name" class="form-control a-name" type="text" value="{{$adminData->name}}" >
                              <span id="a-name-err"></span>
                             </div>
                             <div class="col-md-6">
                              <label class=" control-label">Mobile</label>
                              <input id="mobile" name="mobile" class="form-control mobile" type="text" value="{{$adminData->mobile}}" >
                              <span id="mobile-err"></span>
                             </div>
                            </div>
                            <div class="form-group">
                             <div class="col-md-6 add-pic">
                              <label class=" control-label">Add Images</label>
                              <div class="pic-box">
                                <div class="logoImg">
                                 <img src="{{asset('/uploads/images/')}}/{{$adminData->image}}" id="result">
                                 <input id="logo-file" type="file" class="hide" name="image" >
                                 <span id="image-err"></span>
                                 <label for="logo-file" class="btn btn-large"></label>
                                </div>
                              </div>
                             </div>
                            </div>
                            <div class="form-group">
                             <div class="col-md-6">
                              <label class=" control-label">Email ID</label>
                              <input id="email" name="email" class="form-control email" type="text" value="{{$adminData->email}}" >
                              <span id="email-err"></span>
                             </div>
                             <div class="col-md-6">
                              <label class=" control-label">City</label>
                              <input id="city" name="city" class="form-control city" type="text" value='{{$adminData->city}}' >
                              <span id="city-err"></span>
                             </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <label for="about" class=" control-label">Description</label>
                                <textarea id="descript" name="descript" class="form-control descript" rows="3">{{$adminData->description}}</textarea>
                                <span id="descript-err"></span>
                              </div>
                            </div>
                            <div class="form-group">
                                <div class=" col-sm-8  col-md-8 ">
                                    <button id="up-date-pro" class="btn btn-primary up-date-pro" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@include('admin.footer')
<script type="text/javascript">
              $(document).ready(function(){
               $("#logo-file").change(function(e){
                var img = e.target.files[0];
                if(!iEdit.open(img, true, function(res){
                 $("#result").attr("src", res);      
                })){
                  alert("Whoops! That is not an image!");
                }
               });
               $(document).on("click",".add-facility .plus-btn",function() {
                $('.add-facility .facility-box').append('\
                   <div class="col-md-6">\
                    <input id="" class="form-control" type="date">\
                    <span class="del">x</span>\
                   </div>');
                  $(".add-facility .del").on('click',function(){
                    $(this).parent('.col-md-6').remove();
                  });
              });
              });
</script>
<script type="text/javascript">
  $("#up-date-pro").click(function(){

      var name        =  $('#a-name').val();
      var mobile      =  $('#mobile').val();
      var image       =  $("#image").val();
      var email       =  $('#email').val();
      var city        =  $("#city").val();
      var descript    =  $("#descript").val();
                $("#a-name-err").empty();
                $("#mobile-err").empty();
                $("#image-err").empty();
                $("#email-err").empty();
                $("#city-err").empty();
                $("#descript-err").empty();
                if(name.charAt(0)==" "){
                   $("#a-name-err").text("First character shouldn't be space").css('color','red');
                  return false;
                }
                if(name==""){
                  //alert();
                  $("#a-name-err").text("Enter  name").css('color','red');
                  return false;
                }
                
                if(mobile==""){
                  $("#mobile-err").text("Enter  mobile").css('color','red');
                  return false;
                }
                if(mobile.length<5 || mobile.length>15){
                  $("#mobile-err").text("Mobile number should be 5-15 character").css('color','red');
                  return false;
                }
              // alert(email);
               if(email==""){
                 $("#email-err").text("Enter email").css('color','red');
                   return false;
               }
                
                if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)))
                 {
                 $("#email-err").text("Enter a valid email").css('color','red');
                   return false;
                 } 
                
                if(city.charAt(0)==" "){
                   $("#city-err").text("First character shouldn't be space").css('color','red');
                  return false;
                }
                if(city==""){ 
                  $("#city-err").text("Enter city").css('color','red');
                  return false;
                }
                if(descript.charAt(0)==" "){
                   $("#descript-err").text("First character shouldn't be space").css('color','red');
                  return false;
                }
                 if(descript==""){
                 $("#descript-err").text("Enter description").css('color','red');
                   return false;
                 }
               $("#update_pro").submit();
                        
  });

                $(document).delegate('#mobile','keypress',function(e){
                 if(e.which === 32){
                       return false;
                     } 
               });
               $(document).delegate('#email','keypress',function(e){
                 if(e.which === 32){
                       return false;
                     } 
               });
  
               $(document).delegate('#cpassword','keypress',function(e){
                 if(e.which === 32){
                       return false;
                     } 
               });
</script>