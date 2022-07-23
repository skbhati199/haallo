<style type="text/css">
  .margin-top-15{
    margin-top:15px;
  }
  .margin-top-10{
    margin-top:10px;
  }
  .circle{
    border-radius: 50px;
  }
</style>

@include('admin.header')
    <div class="reportgenPage">
        <div class="layout-content">
            <div class="layout-content-body">
                <div class="title-bar">
                    <h1 class="title-bar-title">
                      <span class="d-ib">Story Management Details</span>
                    </h1>
                  
                </div>
                <div class="row gutter-xs margin-top-15">
                   <div class="col-md-8">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12"> 
                                <div class="form-group">
                                    <label>{{$data['user_name']}}</label>
                                    <div class="img margin-top-10">
                                      <img class="imagefile" src="{{$data['image']}}" width="90px" height="90px">
                                    </div>
                                </div>  
                               </div> 
                               
                                <div class="col-md-12"> 
                                  <div class="form-group">
                                      <label>Content Type</label>
                                       <p>Image/Video</p>
                                  </div>  
                               </div> 
                               <div class="col-md-12"> 
                                  <div class="form-group">
                                      <label>Uploaded By</label>
                                       <p>{{$data['user_name']}}</p>
                                  </div>  
                               </div> 
                               <div class="col-md-12"> 
                                  <div class="form-group">
                                      <a data-target="#view-users" data-toggle="modal" class="btn btn-default btn-labeled" type="button">
                                        <span class="add-btn">
                                          View User
                                        </span>
                                     </a>
                                      <a data-target="#deleteUser" data-toggle="modal" class="btn btn-danger btn-labeled" type="button">
                                        <span class="add-btn">
                                          Delete
                                        </span>
                                     </a>
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
                <button class="btn btn-danger" data-dismiss="modal" type="button">Continue</button>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>      
    </div>
  <div id="view-users" tabindex="-1" role="dialog" class="modal fade">
     <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">View Users</h4>
          </div>
          <div class="modal-body provider-detail">
           <div class="row">
               <div class="col-md-12"> 
                  <div class="form-group">
                      <label>Jonh Snow</label>
                      <div class="img margin-top-10">
                        <img class="imagefile" src="img/3002121059.jpg" width="90px" height="90px">
                      </div>
                  </div>  
               </div> 
               <div class="col-md-12"> 
                  <div class="form-group">
                      <label>Discription</label>
                      <p>Mobile No.: &nbsp;<span>134567898</span></p>
                      <p>Account Status: &nbsp;<span class="text-success">Active</span></p>
                      <p>Account Created On: &nbsp;<span>10 july 2018</span></p>
                       <p>Group: &nbsp;<span>Group1</span></p>
                  </div>  
               </div> 
           </div>
          </div>
        </div>
      </div>      
    </div>
<script type="text/javascript">
  $(document).on("change", ".news-video", function(evt) {
  var $source = $('.video-box');
  $source[0].src = URL.createObjectURL(this.files[0]);
  $source.parent()[0].load();
});
  $(".video-view .close").on('click',function(){
    $(".video-box").attr("src", "");      
  });
  single = new Array();
  function singleFiles(event) {
    this.single = [];
    var singleFiles = event.target.files;
    if (singleFiles) {
      for (var file of singleFiles) {
        var singleReader = new FileReader();
        singleReader.onload = (e) => {
          this.single.push(e.target.result);
          $(event.target).closest('.img-box').find('.imagefile').attr('src', e.target.result)          
        }
        singleReader.readAsDataURL(file);
      }
    }
  }
</script>