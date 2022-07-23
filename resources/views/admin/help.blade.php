@include('admin.header')

<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<style>
  .panel{
    border: 1px solid #e2e2e2;
    padding: 5px 10px;
    box-shadow: 0px 0px 5px 0px #ccc;

  }
  .icon.icon-pencil{
    background: #4da3f9;
    padding: 0px;
    height: 20px;
    width: 20px;
    text-align: center;
    border-radius: 2px;
    line-height: 20px;
    color: #fff;
    cursor: pointer;
  }
  .icon.icon-trash{
    background: #f94d4d;
    padding: 0px;
    height: 20px;
    width: 20px;
    text-align: center;
    border-radius: 2px;
    line-height: 20px;
    color: #fff;
    cursor: pointer;
  }
</style>
<div class="user4Page ExplorerListPage">
  <div class="layout-content">
    <div class="layout-content-body">
      <div class="title-bar">
        <h1 class="title-bar-title">
          <span class="d-ib">Help</span>
        </h1>
      </div>
      <div class="row gutter-xs">
        <div class="col-xs-12 ">
          <div class="panel m-b-lg">
            <div class="tab-content">
              <div class="tab-pane fade active in" id="profile-12">

            <form method="post">
               {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="text" class="form-control">{{$text}}</textarea>
                    <script>
                         CKEDITOR.replace( 'text' );
                    </script>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-success" value="submit">
                </div>
            </form>
                 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('admin.footer')
<script>
    var data = CKEDITOR.instances.editor1.getData();
    //alert(data);
    // Your code to save "data", usually through Ajax.
</script>
                                        