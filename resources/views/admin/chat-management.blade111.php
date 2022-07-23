@include('admin.header')

<style>
    .chat-m-heading h1{
        display: inline-block;
    }
    
    .chat-m-heading .dataTables_filter {
    text-align: right;
    display: inline-block;
    float: right;
}
    .chat-d-heading h3{
        display: inline-block;
        font-size: 18px;
    }   
    .chat-d-heading a{
        float: right;
       color: #777;
        text-decoration: none;
        margin-top: 20px;
    }
    .chat-d-heading a i{
         font-size: 20px;
        color: rgb(42, 120, 228);
    }
    .chat-m-option ul{
        padding-left: 0px;
    }
    .chat-m-option ul li{
        float: left;
        list-style: none;
        background-color: #dddddd;
    padding: 11px 10px;
    margin-right: 10px;
        margin-top: 15px;
    }
    .chat-m-option ul li span{
        display: inline-block;
        margin-right: 10px;
    }

    .chat-m-option ul li input{
        width: 120px;
    } 
    .chat-m-option ul li button i:hover{
        color: #e74c3c;
    }
    .chat-d-heading{
        border-top: 1px solid #ddd;
    }
    .chat-m-option .btn.btn-success{
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
               <a href="#" data-toggle="modal" data-target="#add-cht-optn"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add</a>   
                <div class="chat-m-option">
                    <ul>
                        <li><span>Days</span><input type="number"><button class="btn btn-sm" type="button" data-toggle="modal" data-target="#dlt-popup">
                        <i class="icon icon-trash icon-lg icon-fw"></i>
                        </button>
                       </li>
                       <li><span>Weeks</span><input type="number"><button class="btn btn-sm" type="button" data-toggle="modal" data-target="#dlt-popup">
                        <i class="icon icon-trash icon-lg icon-fw"></i>
                      </button>
                       </li>
                       <li><span>Years</span><input type="number"><button class="btn btn-sm" type="button" data-toggle="modal" data-target="#dlt-popup">
                        <i class="icon icon-trash icon-lg icon-fw"></i>
                        </button>
                        </li>
                        
                    </ul>
                    
                    
                    
                    <button class="btn btn-success pull-right" type="button">Save</button>
                    
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
                 <input type="radio" name="radio1" value="Days"><label>Days</label><br>
                 <input type="radio" name="radio1"><label>Weeks</label><br>
                 <input type="radio" name="radio1"><label>Months</label><br>
                 <input type="radio" name="radio1"><label>Yearss</label><br>
            </div>
          <div class="m-t-lg">
            <button class="btn btn-danger" data-dismiss="modal" type="button">Select</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

  $('#select-all').click(function(){
    if($(this).is(':checked')){
      $('#demo-datatables-5 input[type=checkbox]').prop('checked', true);
    }else{
      $('#demo-datatables-5 input[type=checkbox]').prop('checked', false);
    }
  });
</script>

