@include('admin.header')
<style type="text/css">
.canvasjs-chart-credit{
  display: none;
}
.report input{  
  margin-right: 5px;
}
</style>
<div class="userListPage ExplorerListPage">
  <div class="layout-content">
    <div class="layout-content-body">
      <div class="title-bar">
        <h1 class="title-bar-title">
          <span class="d-ib">Report Management</span>
        </h1>        
      </div>
      <h2>   
        <span id="success-message" style="color:green" class="pull-left"><strong>{{Session::get('success')}}</strong></span>
      </h2>

      <div class="row gutter-xs">
        <div class="col-xs-12">
          <div class="card">           
            <div class="card-body">
              <div class="row">
                 <form action="{{url('admin/report-management')}}" method="post">
                   {{csrf_field()}}
                  <div class="col-md-4 no-gutter">
                    <label>From</label>
                    <div class="form-group">
                        <input class="form-control" type="date" name="form_date ">
                    </div>                    
                  </div>
                  <div class="col-md-4">
                    <label>To</label>
                    <div class="form-group">
                        <input class="form-control" type="date" name="to_date" >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label></label>
                    <div class="form-group">
                    <!-- <button class="btn btn-danger" style="border-radius: 5px;">Submit</button> -->
                      <!-- <div class="dataTables_filter"><label><input type="search" class="form-control input-sm" placeholder="Search…"></label></div>
                        <input class="form-control" placeholder="Search" type="text"> -->
                    </div>
                  </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
     
      <div class="row gutter-xs">
        <div class="col-sm-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="report">
                <input type="radio" name="same" value="total_user"><span>Total Users</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="report">
                <input type="radio" name="same" value="total_friend"><span>Total Friends</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="report">
                <input type="radio" name="same" value="total_group"><span>Total Group</span>
              </div>
            </div>
          </div>
        </div>
       
        <div class="col-xs-12 col-md-12 text-center">
          <button class="btn btn-danger" style="border-radius: 5px;">Download Report</button>
        </div>
      </form>
        <!-- <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">No. of Users(Registered)</h4>
            </div>
            <div class="card-body">
              <div class="card-chart">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">App Downloads</h4>
            </div>
            <div class="card-body">
              <div class="card-chart">
                <canvas id="demo_visitors"></canvas>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>
 @include('admin.footer')

 <script>
   $(document).ready(function(){
     $("#success-message").show();
        setTimeout(function() { $("#success-message").hide(); }, 5000);
        $("#fail-message").show();
        setTimeout(function() { $("#fail-message").hide(); }, 5000);
    });
</script>

