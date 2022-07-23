@include('admin.header')
<style type="text/css">
  .user_body{
    border: 1px solid #cad6e2;
    padding: 5px;
    height: 175px;
    margin-bottom: 10px;
    border-radius: 5px;
    overflow-y: auto;
  }
  .success_icon {
    border: 1px solid #53f153;
    border-radius: 50%;
    padding: 6px;
    background-color: #53f153;
    font-size: 18px;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
.user-table{
	width: 100%;
}
</style>
<div class="userListPage ExplorerListPage">
   <!-- <div class="profilePage"></div> -->
  <div class="layout-content">
    <div class="layout-content-body">
      <div class="title-bar">        
	      <h1 class="title-bar-title">
	        <span class="d-ib">Friends Management</span>
	      </h1>        
      </div>
      <div class="row gutter-xs">
        <div class="col-xs-12">
          <div class="card">           
            <div class="card-body">
              <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable checkbox-table" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>User Name</th>
                    <th>Set Limit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($user as $key=>$user)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{@$user->user_name}}</td>
                    <td>
                    	<button onclick="setLimit({{@$user->id}})" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#set_limit">Set Limit</button>
                    </td>
                    <td>
                      <button onclick="showFriend({{@$user->id}})" class="btn btn-primary btn-sm delete_user" type="button" data-toggle="modal" data-target="#view">
                        <i class="icon icon-eye icon-lg icon-fw"></i>
                      </button>
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 @include('admin.footer')

<div id="set_limit" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Set Limit</h4>
            </div>
            <form id="set_limit_form"  method="post" >
              {{ csrf_field() }}
            <div class="modal-body provider-detail">
              <div class="form-group">
              	<input class="form-control" id="set_limit_value" type="text" name="setlimit" max ="0" required>
              </div>
              <input type="hidden" name="user_id" value="" id="sets_limit">
                
              <div class="text-center">
                  <button class="btn btn-primary" data-toggle="modal" >Submit</button>
              </div> 
              </form>              
                 
            </div>
            <!-- <div class="modal-footer"></div> -->
        </div>
    </div>      
</div>

 <div id="view" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">User List</h4>
            </div>
            <div class="modal-body provider-detail">
              <div class="user_body">
                <table class="user-table">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>User Name</th>
                    <th>Date</th>
                  </tr>
                </thead>
                </table>
              	<table class="user-table" id="userss_table">                  		
          			                 		                		
              	</table>                    
              </div>
            </div>
            <!-- <div class="modal-footer"></div> -->
        </div>
    </div>      
</div>
<div id="success" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="border-radius: 5px;">      
      <div class="modal-body">        
        <div class="text-center"> 
          <i class="success_icon icon icon-check icon-check"></i>           
          <h5>Set Limit Successfully</h5> 
        </div>        
      </div>      
    </div>
  </div>
</div>
@if(Session::has('msg'))
  <script type="text/javascript">
      $('#success').modal('show');
  </script>
@else
@endif
<script type="text/javascript">
    function setLimit(id){
       $('#sets_limit').val(id);
       $.ajax({
        type:"GET",
        datatype:"json",
        url:"{{url('admin/set-limit')}}"+"/"+id,
        success:function(resp){

          if(resp.data.set_limit){
           $('#set_limit_value').val(resp.data.set_limit);
          }else{
            var val=" ";
           $('#set_limit_value').val(val);
          }
          $('#set_limit_form').attr('action',"{{url('admin/set-limit')}}"+"/"+resp.data.id);
        }
       });
    }

    function showFriend(id){
      $.ajax({
          type:"GET",
          datatype:"json",
          url:"{{url('admin/show-friend-list')}}"+"/"+id,
          success:function(resp){
            console.log(resp.text);
            $('#userss_table').html(resp.text);
          }
      });
    }
</script>



