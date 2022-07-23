     @include('admin.header')
      <div class="profilePage"></div>
      <div class="layout-content">
       <div class="row gutter-xs">
          <div class="profile-box">
              <div class="card text-center">
                <div class="card-image">
                  <div class="overlay">
                    <div class="overlay-gradient">
                      <img class="card-img-top img-responsive" src="{{asset('/Admin/img/7808910503.jpg')}}" alt="Instagram App">
                    </div>
                  </div>
                </div>
                <div class="card-avatar">
                  <a class="card-thumbnail rounded sq-100" href="#">
                    <img class="img-responsive" src="{{asset('/uploads/images/')}}/{{$adminData->image}}" >
                  </a>
                </div>
                <div class="card-body">
                  <h3 class="card-title">{{$adminData->name}}</h3>
                  <p class="card-text">
                    <span class="app-users">
                     <span class="icon icon-map-marker"></span>
                     <strong>City</strong>:{{$adminData->city}}
                    </span>
                  </p>
                  <p class="card-text">
                    <span class="app-users">
                     <span class="icon icon-map-marker"></span>
                     <strong>Email</strong>: {{$adminData->email}}
                    </span>
                  </p>
                  <p class="card-text">
                    <span class="app-users">
                     <span class="icon icon-phone"></span>
                     <strong>Phone</strong>: {{$adminData->mobile}}
                    </span>
                  </p>
                  <p class="card-text">{{$adminData->description}}</p>
                  <div class="col-md-12 text-center">
                     <a href="{{url('/admin/edit-profile')}}" class="">       
                      <button class="btn btn-primary btn-sm" type="button">Edit profile</button> 
                     </a>
                     <a href="{{url('/admin/change-password')}}">       
                        <button class="btn btn-primary btn-sm" type="button">Change Password</button> 
                      </a>
                 </div>
                </div>
              </div>
            </div>
       </div>
      </div>
      
    </div>
     @include('admin.footer')