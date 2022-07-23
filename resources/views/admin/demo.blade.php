@include('admin.header')

<style>
.accordion-container {
    position: relative;
    height: auto;
}

.accordion-container>h2 {
    text-align: center;
    color: #fff;
    padding-bottom: 5px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #ddd;
}

.set {
    position: relative;
    width: 100%;
    height: auto;
    background-color: #f5f5f5;
}

.set>a {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #555;
    font-weight: 600;
    border-bottom: 1px solid #ddd;
    -webkit-transition: all 0.2s linear;
    -moz-transition: all 0.2s linear;
    transition: all 0.2s linear;
}

.set>a i {
    float: right;
    margin-top: 2px;
}

.set>a.active {
    background-color: #b5b4b1;
    color: #fff;
}

.content {
    background-color: #fff;
    border-bottom: 1px solid #ddd;
    display: none;
    padding: 20px;
}

.content p {
    padding: 10px 15px;
    margin: 0;
    color: #333;
}
</style>
<div class="setting-managementPage ExplorerListPage">
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Setting Management</span>
                </h1>

                 <h4 align="left"> <span style="color:green">{{Session::get('success-message')}}</span></h4>
                 <h4 align="left"> <span style="color:red">{{Session::get('fail-message')}}</span></h4>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="accordion-container">
                                <div class="set">
                                    <a href="#">Terms & Conditions <i class="fa fa-plus"></i></a>
                                    <div class="content">
                                        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#termeditcontent-modal"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>Edit</a>
                                        <p>{{(isset($settings->terms_and_conditions)) ? $settings->terms_and_conditions : ''}}</p>
                                    </div>
                                </div>
                                <div class="set mt-1">
                                    <a href="#">Privacy Policy<i class="fa fa-plus"></i></a>
                                    <div class="content">
                                        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#privacyeditcontent-modal"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>Edit</a>
                                        <p>{{ (isset($settings->privacy_policy)) ? $settings->privacy_policy : ''}}</p>
                                    </div>
                                </div>
                                <div class="set mt-1">
                                    <a href="#">Help<i class="fa fa-plus"></i></a>
                                    <div class="content">
                                        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#helpeditcontent-modal"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>Edit</a>
                                        <p>{{(isset($settings->help)) ? $settings->help : ''}}</p>
                                    </div>
                                </div>
                                <div class="set mt-1">
                                    <a href="#">FAQ's<i class="fa fa-plus"></i></a>
                                    <div class="content">
                                        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#faqModal"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>Edit</a>
                                        <p>{{(isset($settings->faqs)) ? $settings->faqs : ''}}</p>
                                    </div>
                                </div>
                                <div class="set mt-1">
                                    <a href="#">Contact Us<i class="fa fa-plus"></i></a>
                                    <div class="content">
                                        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#contactModal"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>Edit</a>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="support-email">
                                                    <h6 class="m-0">Support Email Address</h6>
                                                    <p>abc@gmail.com</p>
                                                </div>
                                                <div class="support-contact mt-3">
                                                    <h6 class="m-0">Support Contact Number</h6>
                                                    <p>99999999</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="set mt-1">
                                <a href="#">About Us<i class="fa fa-plus"></i></a>
                                <div class="content">
                                    <a href="javascript:void(0)" class="btn btn-primary float-right" data-toggle="modal" data-target="#aboutModal"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>Edit</a>
                                    <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque voluptatem illo soluta fugiat doloremque voluptas harum velit quae et blanditiis omnis, voluptatibus natus iste, non architecto perspiciatis quam, consectetur praesentium?
                                    Quaerat quidem pariatur aperiam. Fuga aut neque laboriosam quasi, architecto hic nisi doloribus natus, non quos omnis rem in, commodi dolore dolorum molestias! Sit ullam, nihil error officia voluptate ratione.</p> -->
                                    <p>{{(isset($settings->about_us)) ? $settings->about_us : ''}}</p>
                                </div>
                            </div>
                            <div class="set mt-1">
                                <a href="#">Legal<i class="fa fa-plus"></i></a>
                                <div class="content">
                                <!--     <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#FAQeditcontent-modal"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>Editss</a> -->
                                 <!--    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque voluptatem illo soluta fugiat doloremque voluptas harum velit quae et blanditiis omnis, voluptatibus natus iste, non architecto perspiciatis quam, consectetur praesentium?
                                    Quaerat quidem pariatur aperiam. Fuga aut neque laboriosam quasi, architecto hic nisi doloribus natus, non quos omnis rem in, commodi dolore dolorum molestias! Sit ullam, nihil error officia voluptate ratione.</p> -->
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#legal-modal"><i class="fa fa-pencil mr-2" aria-hidden="true"></i>Edit</a>
                                    <p>{{ (isset($settings->legal)) ? $settings->legal : ''}}</p>
                                </div>
                            </div>
                            <div class="set mt-1">
                                <a href="#">Change Password<i class="fa fa-plus"></i></a>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- <form>
                                                <div class="form-group">
                                                    <input type="password" class="form-control" placeholder="Current Password">
                                                    <input type="password" class="form-control mt-3" placeholder="New Password">
                                                    <input type="password" class="form-control mt-3" placeholder="Re-Enter Password">
                                                </div>
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#passwordchanged-modal">Change</button>
                                            </form> -->
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
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@include('admin.footer')
<!-- Edit Password Modal --->


<!--Edit About Us Modal --->
<div class="modal modal-danger fade" id="aboutModal" style=" padding-right: 0px;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header text-inverse mdl-hd" style="background-color: #fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
             <form action="{{route('about-us')}}" method="post" id="termCondition">
                {{ csrf_field() }} 
                <div class="modal-body">
                    <div class="form-group">
                        <label>Edit About Us</label>
                        <textarea name="about_us" id="about_us" rows="10" class="form-control" placeholder="Enter Text here..">{{(isset($settings->about_us)) ? $settings->about_us : ''}}</textarea>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-12 text-center">
                            <!-- <button class="btn btn-primary">Save</button> -->
                            <input type="submit" name="submit" class="btn btn-primary" value="edit"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Edit About Us Modal end --->


<!-- Edit FAQ Modal --->
<div class="modal modal-danger fade" id="faqModal" style="display: none; padding-right: 0px;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header text-inverse mdl-hd" style="background-color: #fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{route('faqs')}}" method="post" id="termCondition">
            {{ csrf_field() }} 
            <div class="modal-body">
                <div class="form-group">
                    <label>Edit FAQ</label>
                    <textarea name="faqs" id="" rows="10" class="form-control" placeholder="Enter Text here..">{{(isset($settings->faqs)) ? $settings->faqs : ''}}</textarea>
                </div>
                <div class="row my-4">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary">Savess</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit FAQ Modal ends--->

<!--Edit legal Us Modal --->
<div class="modal modal-danger fade" id="legal-modal" style="display: none; padding-right: 0px;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
             <form action="{{route('legal')}}" method="post" id="termCondition">
                {{ csrf_field() }} 
                <div class="modal-body">
                    <div class="form-group">
                        <label>Edit Legal</label>
                        <textarea name="legal" id="legal" rows="10" class="form-control" placeholder="Enter Text here..">{{(isset($settings->legal)) ? $settings->legal : ''}}</textarea>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-12 text-center">
                            <!-- <button class="btn btn-primary">Save</button> -->
                            <input type="submit" name="submit" class="btn btn-primary" value="edit"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Edit About Us Modal end --->


<!-- Contact Us Modal --->
<div class="modal fade" id="contactModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Edit Support Email Address</label>
                            <!-- <input type="email" name="" id="" class="form-control"> -->
                            <input type="email" name="contact" id="contact" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Edit Support Contact Number</label>
                            <input type="email" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Us Modal ends --->

<div class="modal modal-danger fade" id="passwordchanged-modal" style="display: none; padding-right: 0px;">
    <div class="modal-dialog modal-md mdl-al">
        <div class="modal-content">
            <div class="modal-header text-inverse mdl-hd" style="background-color: #fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body text-center">
                <p>Password changed successfully! </p>
                <p class="text-success"><i class="fa fa-check-circle fa-3x" aria-hidden="true"></i></p>
            </div>
        </div>
    </div>
</div>
<!-- Edit Password Modal ends--->

<!-- Edit Terms & Conditions Modal --->
<div class="modal modal-danger fade" id="termeditcontent-modal" style="display: none; padding-right: 0px;">
    <div class="modal-dialog modal-md mdl-al">
        <!-- <form id="termCondition"> -->
        <form action="{{route('terms-and-conditions')}}" method="post" id="termCondition">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header text-inverse mdl-hd" style="background-color: #fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Edit Terms & Conditions</label>
                    <textarea name="terms_and_conditions" rows="10" class="form-control" placeholder="Enter Text here..">{{(isset($settings->terms_and_conditions)) ? $settings->terms_and_conditions : ''}}</textarea>
                </div>
                <input type="hidden" name="section" value="Terms">
                <div class="row my-4">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary" type="submit" >Save</button>
                        <!-- <input type="submit" name="submit" class="btn btn-primary" value="edit"/> -->
                        <!-- <button class="btn btn-primary" type="submit">Save</button> -->
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- Edit Terms & Conditions Modal ends--->

<!-- Edit Privacy Policy Modal --->
<div class="modal modal-danger fade" id="privacyeditcontent-modal" style="display: none; padding-right: 0px;">
    <div class="modal-dialog modal-md mdl-al">
        <!-- <form id="privacyPolicy"> -->
         <form action="{{route('privacy-policy')}}" method="post" id="termCondition">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header text-inverse mdl-hd" style="background-color: #fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Edit Privacy Policy</label>
                    <textarea name="description" rows="10" class="form-control" placeholder="Enter Text here..">{{(isset($settings->privacy_policy)) ? $settings->privacy_policy :''}}</textarea>
                    <input type="hidden" name="section" value="Privacy">
                    <div class="row my-4">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>

<!-- Edit Help Modal --->
<div class="modal modal-danger fade" id="helpeditcontent-modal" style="display: none; padding-right: 0px;">
    <div class="modal-dialog modal-md mdl-al">
        <div class="modal-content">
            <div class="modal-header text-inverse mdl-hd" style="background-color: #fff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                 <form action="{{route('helps')}}" method="post" id="termCondition">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Edit Help</label>
                        <textarea name="help" id="help" rows="10" class="form-control" placeholder="Enter Text here..">{{ (isset($settings->help)) ? $settings->help : '' }}</textarea>
                        <div class="row my-4">
                            <div class="col-sm-12 text-center">
                                <!-- <button class="btn btn-primary">Save</button> -->
                                <input type="submit" name="submit" class="btn btn-primary" value="edit"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Help Modal ends --->


<!--Edit About Us Modal --->
<!-- <div class="modal modal-danger fade" id="aboutuseditcontent-modal" style="display: none; padding-right: 0px;">
    <div>
        <div>
            <div>
                 <form action="{{route('faqs')}}" method="post" id="termCondition">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Edit FAQ</label>
                        <textarea name="faqs" id="faqs" rows="10" class="form-control" placeholder="Enter Text here..">{{ (isset($settings->faqs)) ? $settings->faqs : ''}}</textarea>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary">Save</button>
                            <input type="submit" name="submit" class="btn btn-primary" value="edit"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<!-- Edit FAQ Modal ends--->





<!-- successfully-modal -->
<div class="modal fade" id="successfully-modal">
 <div class="modal-dialog modal-sm">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">
         <span aria-hidden="true">×</span>
         <span class="sr-only">Close</span>
       </button>
     </div>
     <div class="modal-body text-center">
       <p class="text-success"><i class="fa fa-check fa-4x"></i></p>
       <h5 id="status-success"></h5>
     </div>
     <div class="modal-footer"></div>
   </div>
 </div>
</div>

<!-- 

<script>
 $(document).ready(function() {
   
   $("#termCondition").submit(function(e) {
     e.preventDefault();
      
      formData = new FormData($("#termCondition")[0]);
      $.ajax({
       url: baseUrl + '/add-terms-condition',
       type: 'POST',
       data: formData,
       contentType: false,
       processData: false,
       success: function(data) {
         if (data.status == true) {
           $("#termeditcontent-modal").modal('hide');
           $("#status-success").text(data.message);
           $("#successfully-modal").modal('show');
           setTimeout(function() {
             $("#successfully-modal").modal('hide');
             location.reload();
           }, 3000);
         }
       },
       error: function(reject) {
         if (reject.status == 422) {
           var errors = $.parseJSON(reject.responseText);
           $.each(errors.errors, function(key, value) {
             $(document).find('[name=' + key + ']').after('<span class="text-strong text-danger">' + value + '</span>');
             setTimeout(function() {
               $(".text-danger").text('');
             }, 5000);
           });
         }
       }
     });
     
  });

   $("#addNew").on('hidden.bs.modal', function() {
     $('#addProduct')[0].reset();
   });
 });
<<<<<<< HEAD
</script>
=======
</script> -->


<script>
    $(document).ready(function() {
        $("#change-password-button").click(function() {
            $(".change-password").slideToggle("slow");
        });
    });
</script>

</script>



<script>
    $(document).ready(function() {
        $(".set > a").on("click", function() {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this)
                .siblings(".content")
                .slideUp(200);
                $(".set > a i")
                .removeClass("fa-minus")
                .addClass("fa-plus");
            } else {
                $(".set > a i")
                .removeClass("fa-minus")
                .addClass("fa-plus");
                $(this)
                .find("i")
                .removeClass("fa-plus")
                .addClass("fa-minus");
                $(".set > a").removeClass("active");
                $(this).addClass("active");
                $(".content").slideUp(200);
                $(this)
                .siblings(".content")
                .slideDown(200);
            }
        });
    });

</script>


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