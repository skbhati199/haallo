@include('admin.header')
<div class="userListPage ExplorerListPage">
  <div class="layout-content">
    <div class="layout-content-body">
      <div class="title-bar">
        <h1 class="title-bar-title">
          <span class="d-ib">Account Management</span>
        </h1>
        <h5> <span style="color:green">{{Session::get('success-message')}}</span></h5>
        <h5><span style="color:red">{{Session::get('fail-message')}}</span></h5>
        <h5>{{$errors->first()}} </h5>
      </div>

      <div class="row gutter-xs">
        <div class="col-xs-12">
          <div class="card">
            <div class="card-header">
              <div class="card-actions">
                <select class="sort_type" id="p_status" name="p_status" style="width:200px;" selected="<?php if(!isset($selectVal)){$selectVal=0;} echo $selectVal; ?>">
                  <option value="0">--Sort By--</option>
                  <option value="1">Blocked</option></a>
                  <option value="2">Unblocked</option>
                  <option value="3">Online</option>
                  <option value="4">Offline</option>
                </select>
              </div>
              <strong>Total : 54351</strong>
            </div>
            <div class="card-body">
              <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable checkbox-table" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>
                      <label class="custom-control custom-control-primary custom-checkbox">
                        <input id="select-all"  class="custom-control-input" type="checkbox">
                        <span class="custom-control-indicator"></span>
                      </label>
                    </th>
                    <th>Image</th>
                    <th>User Name</th>
                    <th>Created On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $value)
                  <tr>
                    <td>
                      <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox">
                        <span class="custom-control-indicator"></span>
                      </label>
                    </td>
                    <td><img src="{{$value->image}}" class="wpx-40" style="width:100px;height:100px; border:0;" /></td>
                    <td>{{$value->user_name}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>
                      <a data-toggle="modal" data-target="#viewUser" id="show-user" class="btn btn-info btn-sm show-user" type="button" data-id='{{$value->id}}'>
                        <i class="icon icon-eye icon-lg icon-fw"></i>
                      </a>
                      @if($value->is_block==0)
                      <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#blockUser" onclick="getblocklink('{{ url('/admin/user-block',$value->id) }}',1)" data-id='{{$value->id}}'>
                        <i class="icon icon-ban icon-lg icon-fw"></i>
                      </button>
                      @endif
                      @if($value->is_block==1)
                      <button class="btn btn-success btn-sm d-none" type="button" data-toggle="modal" data-target="#unblockUser" onclick="getblocklink('{{ url('/admin/user-block',$value->id) }}',2)" data-id='{{$value->id}}'>
                        <i class="icon icon-check icon-lg icon-fw"></i>
                      </button>
                      @endif
                      <button class="btn btn-danger btn-sm delete_user" type="button" data-toggle="modal" data-target="#deleteUser" data-id='{{$value->id}}'>
                        <i class="icon icon-trash icon-lg icon-fw"></i>
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
<div id="viewUser" tabindex="-1" role="dialog" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header bg-primary">
      <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">×</span>
        <span class="sr-only">Close</span>
      </button>
      <h4 class="modal-title">User full detail</h4>
    </div>
    <div class="modal-body provider-detail">
     <div class="row">
      <div class="col-md-6">
        <div class="card text-center">
          <div class="card-image">
            <div class="overlay">
            </div>
          </div>
          <div class="card-avatar text-left">
            <a class="card-thumbnail rounded" style="width: 150px;height: 160px;overflow: hidden;" href="#">
              <img id='uimage' class="img-responsive" src="img/8447261358.jpg" alt="Instagram">
            </a>
          </div>
          <div class="card-body">
            <h3 class="card-title text-left">User Name</h3>
            <p class="text-justify" id="uname"></p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <ul class="media-list">
              <li class="media">
                <div class="media-middle media-body">
                  <h4 class="m-y-0">Mobile No.</h4>
                  <small id="umobile">9876543210</small>
                </div>
              </li>
              <li class="media">
                <div class="media-middle media-body">
                  <h4 class="m-y-0">Group</h4>
                  <small id="ugroup">Group 1</small>
                </div>
              </li>
              <li class="media">
                <div class="media-middle media-body">
                  <h4 class="m-y-0">Status</h4>
                  <small id="ustatus">Active</small>
                </div>
              </li>
              <li class="media">
                <div class="media-middle media-body">
                  <h4 class="m-y-0">Account Creation </h4>
                  <small id="ucreated_at">24/07/2019</small>
                </div>
              </li>
              <li class="media">
                <div class="media-middle media-body">
                  <h4 class="m-y-0">Last Seen</h4>
                  <small id="ulast_seen">11/07/2019 , 10:55 am</small>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>
</div>      
</div>

<div id="unblockUser" tabindex="-1" role="dialog" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">×</span>
        <span class="sr-only">Close</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="text-center">
        <span class="text-success icon icon-times-circle icon-5x"></span>
        <h3 class="text-success">Sure</h3>
        <h4>Are you want to unblock this item?</h4>
        <div class="m-t-lg">
         <a href="javascript:void(0)" id="unblocklink"> <button class="btn btn-success"  type="button">Continue</button> </a>

         <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
       </div>
     </div>
   </div>
   <div class="modal-footer"></div>
 </div>
</div>      
</div>
<div id="blockUser" tabindex="-1" role="dialog" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">×</span>
        <span class="sr-only">Close</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="text-center">
        <span class="text-danger icon icon-times-circle icon-5x"></span>
        <h3 class="text-danger">Danger</h3>
        <h4>Are you want to block this item?</h4>
        <div class="m-t-lg">
          <a href="javascript:void(0)" id="blocklink"> <button class="btn btn-danger"  type="button">Continue</button> </a>
          <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
        </div>
      </div>
    </div>
    <div class="modal-footer"></div>
  </div>
</div>      
</div>

<div id="deleteUser" tabindex="-1" role="dialog" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">×</span>
        <span class="sr-only">Close</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="text-center">
        <span class="text-danger icon icon-times-circle icon-5x"></span>
        <h3 class="text-danger">Danger</h3>
        <h4>Are you want to delete this item</h4>
        <div class="m-t-lg">
          <a id="delete_sure" href="javascript:void(0)">
            <button class="btn btn-danger" type="button">Continue</button></a>
            <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
          </div>
        </div>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>      
</div>

<script type="text/javascript">
  $(".show-user").click(function(){
    var id=$(this).attr('data-id');
  //alert(id);
  $.ajax({
    type: "GET",
    url: "{{url('/admin/user-details')}}"+"/"+id,
    dataType: 'json',
   // data: {"id":id},
   success: function(data){
    console.log(data);
         // alert(data.user_name);
         document.getElementById("uname").innerHTML =data.user_name;
         document.getElementById("uimage").src = data.image;
         document.getElementById("umobile").innerHTML = data.mobile;
         document.getElementById("ucreated_at").innerHTML = data.created_at;
       }
     });
});  


  function getblocklink(url,type){

    if(type==1){
      $('#blocklink').attr('href',url);
    }else{
      $('#unblocklink').attr('href',url);
    }
  }

  $("#demo-datatables-5").on("click", ".delete_user", function(){
    //$(".delete_user").click(function(){
      //alert('aa gaya');
      var id  =  $(this).attr('data-id');
      $("#delete_sure").attr("href", "{{url('/admin/delete-user')}}" + "/" + id);
    });


  $(document).delegate(".sort_type","change",function(){
    window.location.href="{{url('admin/user-sort')}}/"+$(this).val();
  });

  $( document ).ready(function() {
    var name='<?php echo $selectVal; ?>';
    document.getElementById("p_status").value=name;


  });

</script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>

<script type="text/javascript">
  $('#demo-datatables-5').DataTable({
    dom: 'Bfrtip',
    "searching": false,
    buttons: [
    'csv',
    ]
  });
  $("#btnExport").on("click", function() {

    $(".buttons-csv").trigger("click");
  });
</script>

<style type="text/css">
  .dataTables_filter{
    /*display: none;*/
  }
  .buttons-csv{
    float: right;
    background: green;
    padding: 5px;
    color: white;
    margin: 7px;
    width: 80px;
  }
</style>