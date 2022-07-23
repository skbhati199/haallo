<!DOCTYPE html>
<html>
<head>
<title>Help</title>
<link rel="stylesheet" href="{{asset('/Admin/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/elephant.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/application.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/profile.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/product.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/shopping-cart.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/demo.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/iEdit.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/style.css')}}">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
<style type="text/css">
	pre{
}
</style>
</head>
@if($id==1)
<body style="background-color:black; ">
@endif
@if($id==0)
<body style="background-color:white;">
@endif
<!-- <h1>Help:</h1> -->
<div class="row" style="text-align: justify;margin: 20px;font-size: 14px;" id='tex'>

	
	<font @if($id==1) color="white" @else style="color: #253d67;" @endif>
	
	<?php echo $helpData->help_text; ?></font>

</div>
<script src="{{asset('/Admin/js/jquery.min.js')}}"></script>
<script src="{{asset('/Admin/js/vendor.min.js')}}"></script>
    <script src="{{asset('/Admin/js/elephant.min.js')}}"></script>
    <script src="{{asset('/Admin/js/application.min.js')}}"></script>
    <script src="{{asset('/Admin/js/iEdit.js')}}"></script>
    <script src="{{asset('/Admin/js/profile.min.js')}}"></script>
    <script src="{{asset('/Admin/js/product.min.js')}}"></script>
     <script src="{{asset('/Admin/js/demo.min.js')}}"></script>
</body>
</html>

