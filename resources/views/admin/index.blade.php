@include('admin.header')

		<div class="dashboardPage"></div>		
    <div class="dashboardPage"></div>
    <div class="layout-content">
         <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Dashboard</span>
            </h1>
          </div>
          <div class="row gutter-xs">
            <div class="col-md-6 col-lg-3 col-lg-push-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-primary circle sq-48">
                        <span class="icon icon-user"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Total Users</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">{{ $users->count() }}</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-lg-push-3">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-success circle sq-48">
                        <span class="icon icon-user"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Total Online User</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">{{ $online_users->count() }}</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-lg-pull-3">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-danger circle sq-48">
                        <span class="icon icon-user"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Total Blocked Users</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">{{ $block_users->count() }}</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-info circle sq-48">
                        <span class="icon icon-user"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Total Register</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">{{ $users_registerd->count() }}</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row gutter-xs">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-gray sq-64 circle">
                        <span class="icon icon-flag"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h3 class="media-heading">
                        <span class="fw-l">{{ $today_users->count() }}</span>
                        <span class="fw-b fz-sm text-danger">
                          
                      </h3>
                      <span class="fw-l">Today Register</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <div class="media-chart">
                        <canvas data-chart="doughnut" data-animation="false" data-labels='["Resolved", "Unresolved"]' data-values='[{"backgroundColor": ["#2c3e50", "#6185a8"], "data": [879, 377]}]' data-hide='["legend", "scalesX", "scalesY", "tooltips"]' height="64" width="64"></canvas>
                      </div>
                    </div>
                    <div class="media-middle media-body">
                      <h2 class="media-heading">
                        <span class="fw-l">{{count($totalfriendCount)}}</span>
                        <!-- <small>Resolved</small> -->
                      </h2>
                      <small>Total Friends</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <div class="media-chart">
                        <canvas data-chart="doughnut" data-animation="false" data-labels='["Resolved", "Unresolved"]' data-values='[{"backgroundColor": ["#6185a8", "#2c3e50"], "data": [879, 377]}]' data-hide='["legend", "scalesX", "scalesY", "tooltips"]' height="64" width="64"></canvas>
                      </div>
                    </div>
                    <div class="media-middle media-body">
                      <h2 class="media-heading">
                        <span class="fw-l">{{count($totalGroup)}}</span>
                        <!-- <small>Unresolved</small> -->
                      </h2>
                      <small>Total Groups</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          
        </div>
    </div>
		@include('admin.footer')