@include('admin.header')
<style type="text/css">
.star-rating {
    overflow: hidden;
    position: relative;
    display: inline-block;
    vertical-align: middle;
    height: 1em;
    line-height: 1;
    font-size: 17px;
    width: 99px;
    font-family: 'star';
    font-weight: 400;
    word-break: keep-all;
    margin-bottom: 5px;
}
.star-rating:before {
    content: "\f006\f006\f006\f006\f006";
    font-family: FontAwesome;
    letter-spacing: 0.3em;
    opacity: .25;
    float: left;
    top: 0;
    left: 0;
    position: absolute;
    color: #ff9900;
}
.star-rating span {
    overflow: hidden;
    float: left;
    top: 0;
    left: 0;
    position: absolute;
    padding-top: 1.5em;
}
.star-rating span:before {
    content: "\f005\f005\f005\f005\f005";
    font-family: FontAwesome;
    letter-spacing: 0.3em;
    top: 0;
    position: absolute;
    left: 0;
    color: #ff9900;
}
</style>
<div class="userListPage ExplorerListPage">
   <!-- <div class="profilePage"></div> -->
  <div class="layout-content">
    <div class="layout-content-body">
      <div class="title-bar">
        <div class="d-flex" style="justify-content: space-between;">
          <h1 class="title-bar-title">
            <span class="d-ib">Rating Management</span>
          </h1> 
          <!-- <h1 class="title-bar-title">
            <button class="btn btn-primary" data-toggle="modal" data-target="#send_notification">Send Notification</button>
          </h1>  -->
        </div>       
      </div>
      <div class="row gutter-xs">
        <div class="col-xs-12">
          <div class="card">           
            <div class="card-body">
              <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable checkbox-table" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>User Name</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($rateing as $key=>$rateing)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{@$rateing->getUserName->user_name}}</td>
                    <td>{{@$rateing->created_at->format('d/m/y')}}</td>
                    <td>
                      <button  onclick="getRateing({{@$rateing->id}})" class="btn btn-primary btn-sm delete_user" type="button" data-toggle="modal" data-target="#view">
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
              <div class="form-group">
                <label>Description</label>
                <p id="rateing_des">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, obcaecati!</p>
              </div>
              <div class="form-group">
                <label>Ratings</label>
                <div class="rating-hm d-flex align-items-center">
                  <div class="star-rating" >
                      <span id="view_rating" ></span>
                  </div>              
                </div>
              </div>
             <!--  <div class="form-group">
                <label>Date</label>
                <p>29/03/2022</p>
                <span></span>
              </div> -->
              
            </div>
            <!-- <div class="modal-footer"></div> -->
        </div>
    </div>      
</div>

<script type="text/javascript">
  function getRateing(id){
    $.ajax({
      type:"GET",
      datatype:"json",
      url:"{{url('admin/view-rateing')}}"+"/"+id,
      success:function(resp){
        $('#rateing_des').text(resp.data.description);
        var value=resp.total*100/5;
        document.getElementById('view_rating').style.width=value+"px";
      }
    });
  }
</script>
