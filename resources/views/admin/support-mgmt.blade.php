@include('admin.header')
<div class="userListPage ExplorerListPage">
  <div class="layout-content">
    <div class="layout-content-body">
      <div class="title-bar">
        <h1 class="title-bar-title">
          <span class="d-ib">Support Management</span>
        </h1>        
      </div>

      <div class="row gutter-xs">
        <div class="col-xs-12">
          <div class="card">           
            <div class="card-body">
              <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable checkbox-table" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Image</th>
                    <th>User Name</th>
                    <th>Mobile Number</th>
                    <th>Report</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key=>$rowdata)
                  <tr>
                    <td>{{++$key}}</td>
                    <td><img src="{{@$rowdata->getUser->image}}" class="wpx-40" style="width:50px;height:50px; border:0;" /></td>
                    <td>{{@$rowdata->getUser->name}}</td>
                    <td>{{@$rowdata->getUser->mobile}}</td>
                    <td>{{@$rowdata->report}}</td>
                    <td>
                      <a href="#" class="btn btn-info btn-sm show-user" type="button" data-toggle="modal" data-target="#send_reply">Reply</a>

                      <button onclick="delete_support({{@$rowdata->id}})" class="btn btn-danger btn-sm delete_user" type="button">
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
   
 <div id="send_reply" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Reply Box</h4>
            </div>
            <div class="modal-body provider-detail">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                        </div>   
                        <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#success" data-dismiss="modal">Send</button>
                        </div>                
                    </div>
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
            <!-- <i class="icon-check-sign"></i> -->
          <!-- <i class="text-success fa fa-check-circle-o" aria-hidden="true"></i> -->
            <!-- <span class="text-success fa fa-check-circle-o icon-5x"></span> -->
            <span class="sidenav-icon icon icon-check icon-check"></span>
            <h5>Replied Successfully</h5> 
          </div>        
      </div>      
    </div>
  </div>
</div>

<script type="text/javascript">
    function delete_support(id){
    var delete_url="{{url('admin/delete-support')}}"+"/"+id;
    window.location.href=delete_url;
    }
</script>
