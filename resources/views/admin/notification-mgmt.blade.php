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
.users{
  display: flex;
  align-items: center;
  margin-bottom: 5px;
}
.users input{
  margin: 0px 5px;
}
</style>

<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-database.js"></script>


<div class="userListPage ExplorerListPage">
   <!-- <div class="profilePage"></div> -->
  <div class="layout-content">
    <div class="layout-content-body">
      <div class="title-bar">
        <div class="d-flex" style="justify-content: space-between;">
          <h1 class="title-bar-title">
            <span class="d-ib">Notification Management</span>
          </h1> 
          <h1 class="title-bar-title">
            <button class="btn btn-primary" data-toggle="modal" data-target="#send_notification">Send Notification</button>
          </h1> 
        </div>       
      </div>
      <div class="row gutter-xs">
        <div class="col-xs-12">
          <div class="card">           
            <div class="card-body">
              <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable checkbox-table" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Notification Text</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($notification as $key=>$notification)
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{@$notification->title}}</td>
                    <td>{{@$notification->description}}</td>
                    <td>{{ $notification->created_at->format('d/m/Y') }}</td>
                    <td>
                      <button onclick="delete_url({{@$notification->id}})" class="btn btn-danger btn-sm delete_user" type="button">
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


 <div id="send_notification" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Send Notification</h4>
            </div>
            <div class="modal-body provider-detail">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-8">
                  <div class="form-group">
              
              <form action="{{url('admin/send-notification')}}" method="post">
                {{csrf_field()}}

                    <label>Notificartion Title</label>
                    <input class="form-control" type="text" name="title">
                  </div>
                  <div class="form-group">
                    <label>Notification Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="5"></textarea>
                  </div> 
                </div>
                <div class="col-12 col-sm-12 col-md-4">
                  <h5>User</h5>
                  <div class="user_body">
                    <div class="users">
                      <input type="checkbox" name=""><span>Select All</span>
                    </div>
                    @foreach($user as $user)
                    <div class="users">
                      <input type="checkbox" name="users[]" value="{{@$user->id}}"><span>{{@$user->user_name}}</span>
                    </div>
                    @endforeach 
                  </div>
                </div>
              </div>
              <div class="text-center">
                  <button type="submit" class="btn btn-primary" >Send Notification</button>
              </div> 

              </form>              
                 
            </div>
            <!-- <div class="modal-footer"></div> -->
        </div>
    </div>      
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div id="success" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="border-radius: 5px;">      
      <div class="modal-body">        
        <div class="text-center"> 
          <i class="success_icon icon icon-check icon-check"></i>           
          <h5>Notification Sent Successfully</h5> 
        </div>        
      </div>      
    </div>
  </div>
</div>

<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-analytics.js"></script>
@include('admin.firebase-push')

<script>
    $(document).ready(function() {
      
        // const firebaseConfig = {
        //     apiKey: "",
        //     authDomain: "",
        //     projectId: "",
        //     storageBucket: "",
        //     messagingSenderId: "",
        //     appId: ""x 
        // };

        const firebaseConfig = {
            apiKey: "AIzaSyDUUOVjWG5gIxbH5Y85HmJF4wC4UF_6YXk",
            authDomain: "hallo-de4e5.firebaseapp.com",
            databaseURL: "https://hallo-de4e5-default-rtdb.firebaseio.com",
            projectId: "hallo-de4e5",
            storageBucket: "hallo-de4e5.appspot.com",
            messagingSenderId: "711768112066",
            appId: "1:711768112066:web:d69c9c451c820e6418f45b"
        };

        firebase.initializeApp(firebaseConfig);

        $('.send_notification_btn').on('click', function() {
            var title = $("[name='title']").val();
            var description = $("[name='description']").val();
            $("[name='users[]']:checked").each(function(key, element) {
                var userId = $(element).val();
                let sender_id = 0;
                let receiver_id = userId;
                let is_readed = false;

                if(description == ''){

                }else{
                  var currentdate = new Date();
                  var datetime = + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();

                  firebase.database().ref('hallo/admin_to_user/userId'+sender_id+'_admin'+receiver_id).push({
                    'title' : title,
                    'message' : description,
                    'senderId' : sender_id,
                    'receiverId' : receiver_id,
                    'sendertype' : 'user',
                    'is_readed' : is_readed,
                    'timeStamp' : datetime,
                  });    
                  console.log(sender_id);

                pushNotificationIntoFirebase(sender_id, receiver_id, title, description, is_readed);
                }
            });

            alert('Notification sent successfully to selected user(s).');
            // location.reload();
        });
    });

    function delete_url(id){
      var delete_url="{{url('admin/delete-notification')}}"+"/"+id;
      window.location.href=delete_url;
    }



</script>