@include('admin.header')
<style>
    .chat-m-heading h1 {
        display: inline-block;
    }
    .chat-m-heading .dataTables_filter {
        text-align: right;
        display: inline-block;
        float: right;
    }
    .chat-d-heading h3 {
        display: inline-block;
        font-size: 18px;
    }
    .chat-d-heading a {
        float: right;
        color: #777;
        text-decoration: none;
        margin-top: 20px;
    }
    .chat-d-heading a i {
        font-size: 20px;
        color: rgb(42, 120, 228);
    }
    .chat-m-option ul {
        padding-left: 0px;
    }
    .chat-m-option ul li {
        float: left;
        list-style: none;
        background-color: #dddddd;
        padding: 11px 10px;
        margin-right: 10px;
        margin-top: 15px;
    }
    .chat-m-option ul li span {
        display: inline-block;
        margin-right: 10px;
    }
    .chat-m-option ul li input {
        width: 120px;
    }
    .chat-m-option ul li button i:hover {
        color: #e74c3c;
    }
    .chat-d-heading {
        border-top: 1px solid #ddd;
    }
    .chat-m-option .btn.btn-success {
        margin-top: 30px;
        margin-right: 12px;
    }
</style>
<div class="offerPage ExplorerListPage">
    <div class="layout-content">
        <div class="layout-content-body">
            <div class="row gutter-xs">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 chat-m-heading">
                                    <div class="title-bar">
                                        <h1 class="title-bar-title">
                                            <span class="d-ib">Details</span>
                                        </h1>
                                        <div id="demo-datatables-5_filter" class="dataTables_filter"><label><input type="search" class="form-control input-sm" placeholder="Search…" aria-controls="demo-datatables-5"></label></div>
                                    </div>
                                </div>
                                <div class="col-md-12 chat-d-heading">
                                    <h3>Mute Notification</h3>
                                    <a href="#" data-toggle="modal" data-target="#add-cht-optn"><i class="fa fa-plus-circle" aria-hidden="true"></i> <h4>Add</h4></a>
                                    <h4 align="left"> <span style="color:green">{{Session::get('success-message')}}</span></h4>
                                    <h4 align="left"><span style="color:red">{{Session::get('fail-message')}}</span></h4>
                                <form id="muteNotify" method="post" action="{{url('admin/set-mute')}}">
                                    <div class="chat-m-option">
                                        <ul id="items">
                                            {{csrf_field()}}
                                            <li><span>Days</span><input type="number" id="days" name="days" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" / ><button class="btn btn-sm" type="button" >
                                                    <i class="icon icon-trash icon-lg icon-fw"></i>
                                                </button><br>
                                                <span id="days-err"></span>
                                            </li>
                                            <li><span>Weeks</span><input type="number" id="weeks" name="weeks" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" /><button class="btn btn-sm" type="button" >
                                                    <i class="icon icon-trash icon-lg icon-fw"></i>
                                                </button><br>
                                                <span id="weeks-err"></span>
                                            </li>
                                            <li><span>Years</span><input type="number" id="years" name="years" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" /><button class="btn btn-sm" type="button">
                                                    <i class="icon icon-trash icon-lg icon-fw"></i>
                                                </button><br>
                                                <span id="years-err"></span>
                                            </li>
                                        </ul>
                                        <button  id="notifyMute" class="btn btn-success pull-right" type="button">Save</button>
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
@include('admin.footer')
<div id="dlt-popup" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <span class="text-danger icon icon-times-circle icon-5x"></span>
                    <h3 class="text-danger">Danger</h3>
                    <h4>Are you want to delete this item</h4>
                    <div class="m-t-lg">
                        <button class="btn btn-danger" data-dismiss="modal" type="button">Continue</button>
                        <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="add-cht-optn" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <form action="" method="post">
                    <div class="text-center">
                        <h6 class="text-danger">Select an option from the following</h6>
                        <div class="select-cht-option">
                            <input type="radio" class="rad-opt" name="radio1" value="Hours" data-id="Hours"><label>Hours</label><br>
                            <input type="radio" class="rad-opt" name="radio1" value="Days" data-id="Days"><label>Days</label><br>
                            <input type="radio" class="rad-opt" name="radio1" data-id="Weeks"><label>Weeks</label><br>
                            <input type="radio" class="rad-opt" name="radio1"data-id="Months"><label>Months</label><br>
                            <input type="radio" class="rad-opt" name="radio1" data-id="Years"><label>Years</label><br>
                        </div>
                        <div class="m-t-lg">
                            <button id="add1" class="btn btn-danger set-rad" data-dismiss="modal" type="button" data-id="a">Select</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#select-all').click(function() {
        if ($(this).is(':checked')) {
            $('#demo-datatables-5 input[type=checkbox]').prop('checked', true);
        } else {
            $('#demo-datatables-5 input[type=checkbox]').prop('checked', false);
        }
    }); 
$(document).ready(function() {
  $(".delete").hide();
  //when the Add Field button is clicked
  $("#add1").click(function(e) {
    // $(".delete").fadeIn("1500");
    var a=$(this).attr('data-id'); 
    if(a=="Months"){
        var b = a.replace("M", "m");
    }
    if(a=="Hours"){
        var b = a.replace("H", "h");
    }
    
    $("#items").append(
      '<li><span>'+ a +'</span><input type="number" name="'+b+'" id="'+b+'" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" /><button class="delete btn btn-sm" type="button"><i class="icon icon-trash icon-lg icon-fw"></i></button><br><span id="'+b+'-'+'err'+'"></span></li>'
    );
  });
  $("body").on("click", ".delete", function(e) {
    $("#items li").last().remove();
  });    
});


$("input[type='radio']").click(function(){
   var a=$(this).attr("data-id");
   $('#add1').attr('data-id',a);
});

$("#notifyMute").click(function(){
   var days     =   document.getElementById('days').value;
   if(document.getElementById('months')){
     var months =document.getElementById('months').value;
   }
   if(!document.getElementById('months')){
     var months =null;
   }
   var years    =   document.getElementById('years').value;
   var weeks    =   document.getElementById('weeks').value;
   if(document.getElementById('hours')){
    var hours   =   document.getElementById('hours').value;
   }
   if(!document.getElementById('hours')){
    var hours   =   null;
   }
   $("#days-err").empty();
   $("#weeks-err").empty();
   $("#years-err").empty();
   $("#months-err").empty();
   $("#hours-err").empty();
   
  //alert(weeks);

   if(days==""|| days==0){
      $("#days-err").text("Days should not be empty").css('color','red');
     return false;
   }
   if(days < 0){
      $("#days-err").text("Days should not be negetave").css('color','red');
     return false;
   }
   if(days>365){
      $("#days-err").text("Days should not be greater than 365").css('color','red');
     return false;
   }
   
   if(years==""){
     $("#years-err").text("Year should not be empty ").css('color','red');
     return false;
   }
   if(years< 0){
      $("#years-err").text("Years should not be negative").css('color','red');
     return false;
   }
   if(years>10){
     
     $("#years-err").text("Year should not be greater than 10 ").css('color','red');
     return false;
   }
   if(weeks==""){
      $("#weeks-err").text("Weeks should not be empty").css('color','red');
     return false;
   }
   if(weeks< 0){
      $("#weeks-err").text("Weeks should not be negative").css('color','red');
     return false;
   }
   if(weeks>52){
      $("#weeks-err").text("Weeks should not be greater than 52").css('color','red');
     return false;
   }
   
   if(months==""){
       $("#months-err").text("Months should not be empty").css('color','red');
      return false;
    }
    if(months< 0){
      $("#months-err").text("Months should not be nagetive").css('color','red');
     return false;
   }
    if(months>12){
       $("#months-err").text("Months should not be greater than 12").css('color','red');
      return false;
    }
    //alert(weeks);
    
   
   if(hours==""){
      $("#hours-err").text("Hours should not be empty").css('color','red');
     return false;
   }
   if(hours< 0){
      $("#hours-err").text("Hours should not be negative").css('color','red');
     return false;
   }
   if(hours>365){
      $("#hours-err").text("Hours should not be greater than 24").css('color','red');
     return false;
   }
   else{
        $("#muteNotify").submit();
   }
   

});
       
</script>
