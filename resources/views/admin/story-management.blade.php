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
                   <h4 align="left"> <span style="color:green">{{Session::get('success-message')}}</span></h4>
          <h4 align="left"><span style="color:red">{{Session::get('fail-message')}}</span></h4>
                    <h1 class="title-bar-title">
                      <span class="d-ib">Story Management</span>
                    </h1>

                    <a data-target="#add-story" data-toggle="modal" class="margin-top-15 btn btn-default btn-sm btn-labeled" type="button" >
                        <span class="add-btn">
                          Add story
                        </span>
                    </a>
                </div>
              
                <div class="row gutter-xs margin-top-15">
                  @foreach($data as $value)
                   
                   <div class="col-md-3">
                      <a href="{{url('admin/story-management-details')}}/{{$value['user_id']}}">
                        <div class="card">
                           <div class="card-body">
                              <div class="media text-center">
                                <div class="media-middle">
                                    <img src="{{$value['image']}}" alt="" class="circle" width="50px" height="50px">
                                </div>
                                <div class="media-middle media-body">
                                  <h4 class="media-heading margin-top-15">{{$value['user_name']}} </h4>
                                </div>
                              </div>
                            </div>
                        </div>
                      </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('admin.footer')  
     <div id="add-story" tabindex="-1" role="dialog" class="modal fade">
     <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Add Story</h4>
          </div>
          <div class="modal-body provider-detail">
           <div class="row">
            <div class="col-xs-12">
             <form method="post" onsubmit="return doit()" action="{{url('/admin/submit-story')}}"  enctype="multipart/form-data">
                {{csrf_field()}}
                 <h4> <span id="msg" name="msg"></span></h4>
                  <div class="form-group">
                    <div class="col-md-6">
                        <div class="img-box w-auto">
                        
                            <label>Uplaod Image</label>
                            <label class="fileInput">
                                <input type="file" name="photo" id="photo" class="form-control" onchange="singleFiles(event)">
                            </label>
                             <div class="img margin-top-10">
                                <img class="imagefile" src="img/3002121059.jpg" width="130px" height="130px">
                            </div>
                        </div>
                    </div>
                  </div>
                 <div class="form-group">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label>Upload video</label>
                            <input type="file" value="" name="v_dio" id="v_dio" class="form-control news-video">
                             <div class="video-view margin-top-10" style="width: 100%; height: 180px; overflow: hidden;">
                            <a href="#" style="position: absolute;border: solid;  right: 8px;z-index: 99;" class="close">X</a>
                               <video width="290" height="" class="video-box" controls="">
                                  <source src="" type="assets/img/video.png">
                                </video> 
                            </div>
                         </div>
                     </div>
                  </div>   
                  <div class="form-group">
                      <div class="col-md-12">
                          <label for="" class="control-label">Discription</label>
                         <textarea class="form-control" id="status" name="status" rows="3"></textarea>
                      </div>
                  </div>    
                  <div class="form-group">
                      <div class="col-sm-8 col-md-8 margin-top-10">
                          <input class="btn btn-primary" type="submit" value="Upload">
                      </div>
                  </div>
              </form>  
             </div> 
           </div>
          </div>
          <div class="modal-footer"></div>
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

  function doit(){
   var photo  =document.getElementById('photo').value; 
   var v_dio  =document.getElementById('v_dio').value;
   var status =document.getElementById('status').value;
   $("#msg").empty();
   if((photo=="")&&(v_dio=="")&&(status=="")){
      $("#msg").text("Please set a story").css('color','red');
      return false; 
   }
  }
</script>