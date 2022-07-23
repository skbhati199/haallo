<!DOCTYPE html>
<html lang="en">
  
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Haallo</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#2c3e50">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{asset('/Admin/css/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/elephant.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/application.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/profile.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/product.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/shopping-cart.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/demo.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/iEdit.css')}}">
    <link rel="stylesheet" href="{{asset('/Admin/css/style.css')}}">
    <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">

  </head>
  <body class="layout layout-header-fixed">
    <div class="layout-header">
      <div class="navbar navbar-default">
        <div class="navbar-header">
          <a class="navbar-brand navbar-brand-center" href="{{url('/admin/index')}}">
            <img class="navbar-brand-logo" src="{{asset('/Admin/img/logo.png')}}" alt="Elephant">
          </a>
          <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
            <span class="sr-only">Toggle navigation</span>
            <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
            <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
          </button>
          <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="arrow-up"></span>
            <span class="ellipsis ellipsis-vertical">
              <img class="ellipsis-object" width="32" height="32" src="img/0180441436.jpg" alt="Teddy Wilson">
            </span>
          </button>
        </div>
        <div class="navbar-toggleable">
          <nav id="navbar" class="navbar-collapse collapse">
            <button class="sidenav-toggler hidden-xs" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
            </button>
            <ul class="nav navbar-nav navbar-right">
              
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                  <span class="icon-with-child hidden-xs">
                    <span class="icon icon-bell-o icon-lg"></span>
                    <span class="badge badge-danger badge-above right">7</span>
                  </span>
                  <span class="visible-xs-block">
                    <span class="icon icon-bell icon-lg icon-fw"></span>
                    <span class="badge badge-danger pull-right">7</span>
                    Notifications
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                  <div class="dropdown-header">
                    
                    <h5 class="dropdown-heading">Recent Notifications</h5>
                  </div>
                  <div class="dropdown-body">
                    <div class="list-group list-group-divided custom-scrollbar">
                      <a class="list-group-item" href="#">
                        <div class="notification">
                          <div class="notification-media">
                            <span class="icon icon-exclamation-triangle bg-warning rounded sq-40"></span>
                          </div>
                          <div class="notification-content">
                            <small class="notification-timestamp">35 min</small>
                            <h5 class="notification-heading">Update Status</h5>
                            <p class="notification-text">
                              <small class="truncate">Failed to get available update data. To ensure the proper functioning of your application, update now.</small>
                            </p>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="#">
                        <div class="notification">
                          <div class="notification-media">
                            <span class="icon icon-flag bg-success rounded sq-40"></span>
                          </div>
                          <div class="notification-content">
                            <small class="notification-timestamp">43 min</small>
                            <h5 class="notification-heading">Account Contact Change</h5>
                            <p class="notification-text">
                              <small class="truncate">A contact detail associated with your account teddy.wilson, has recently changed.</small>
                            </p>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="#">
                        <div class="notification">
                          <div class="notification-media">
                            <span class="icon icon-exclamation-triangle bg-warning rounded sq-40"></span>
                          </div>
                          <div class="notification-content">
                            <small class="notification-timestamp">1 hr</small>
                            <h5 class="notification-heading">Failed Login Warning</h5>
                            <p class="notification-text">
                              <small class="truncate">There was a failed login attempt from "192.98.19.164" into the account teddy.wilson.</small>
                            </p>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="#">
                        <div class="notification">
                          <div class="notification-media">
                            <img class="rounded" width="40" height="40" src="img/0310728269.jpg" alt="Daniel Taylor">
                          </div>
                          <div class="notification-content">
                            <small class="notification-timestamp">4 hr</small>
                            <h5 class="notification-heading">Daniel Taylor</h5>
                            <p class="notification-text">
                              <small class="truncate">Like your post: "Everything you know about Bootstrap is wrong".</small>
                            </p>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="#">
                        <div class="notification">
                          <div class="notification-media">
                            <img class="rounded" width="40" height="40" src="img/0872116906.jpg" alt="Emma Lewis">
                          </div>
                          <div class="notification-content">
                            <small class="notification-timestamp">8 hr</small>
                            <h5 class="notification-heading">Emma Lewis</h5>
                            <p class="notification-text">
                              <small class="truncate">Like your post: "Everything you know about Bootstrap is wrong".</small>
                            </p>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="#">
                        <div class="notification">
                          <div class="notification-media">
                            <img class="rounded" width="40" height="40" src="img/0601274412.jpg" alt="Sophia Evans">
                          </div>
                          <div class="notification-content">
                            <small class="notification-timestamp">8 hr</small>
                            <h5 class="notification-heading">Sophia Evans</h5>
                            <p class="notification-text">
                              <small class="truncate">Like your post: "Everything you know about Bootstrap is wrong".</small>
                            </p>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="#">
                        <div class="notification">
                          <div class="notification-media">
                            <img class="rounded" width="40" height="40" src="img/0180441436.jpg" alt="Teddy Wilson">
                          </div>
                          <div class="notification-content">
                            <small class="notification-timestamp">9 hr</small>
                            <h5 class="notification-heading">Teddy Wilson</h5>
                            <p class="notification-text">
                              <small class="truncate">Published a new post: "Everything you know about Bootstrap is wrong".</small>
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="dropdown-footer">
                    <a class="dropdown-btn" href="#">See All</a>
                  </div>
                </div>
              </li>
              <li class="dropdown hidden-xs">
                <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
                  <img class="rounded" width="36" height="36" src="{{asset('/uploads/images/')}}/{{Auth::guard('admin')->user()->image}}" > {{Auth::guard('admin')->user()->name}}
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="{{url('/admin/profile')}}">Profile</a></li>
                  <li><a href="{{url('/admin/logout')}}">Sign out</a></li>
                </ul>
              </li>
              <li class="visible-xs-block">
                <a href="profile.php">
                  <span class="icon icon-user icon-lg icon-fw"></span>
                  Profile
                </a>
              </li>
              <li class="visible-xs-block">
                <a href="login.php">
                  <span class="icon icon-power-off icon-lg icon-fw"></span>
                  Sign out
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="layout-main">
      <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
          <div class="custom-scrollbar">
            <nav id="sidenav" class="sidenav-collapse collapse">
              <ul class="sidenav">
                
                <li class="sidenav-heading">Navigation</li>
                <li class="sidenav-item dashboardPageNav">
                  <a href="{{url('/admin/index')}}" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-home"></span>
                    <span class="sidenav-label">Dashboard</span>
                  </a>
                </li>
                <li class="sidenav-item profilePageNav">
                  <a href="{{url('/admin/profile')}}" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-user"></span>
                    <span class="sidenav-label">Profile</span>
                  </a>
                </li>
                <li class="sidenav-item has-subnav accountNav">
                  <a href="#" aria-haspopup="true" aria-expanded="true">
                    <span class="sidenav-icon icon icon-users"></span>
                    <span class="sidenav-label">Account Management</span>
                  </a>
                  <ul class="sidenav-subnav collapse" aria-expanded="true" style="">
                    <li class="accNav-a"><a href="{{url('admin/user-list')}}">User List</a></li>
                  </ul>
                </li>
                <li class="sidenav-item profilePageNav">
                  <a href="{{url('/admin/chat')}}" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-user"></span>
                    <span class="sidenav-label">Chat Management</span>
                  </a>
                </li>
                <li class="sidenav-item profilePageNav">
                  <a href="{{url('/admin/demo')}}" aria-haspopup="true" >
                    <span class="sidenav-icon icon  icon-tasks icon-tasks "></span>
                    <span class="sidenav-label">Static Contents</span>
                  </a>
                </li>
                <li class="sidenav-item profilePageNav">
                  <a href="{{url('/admin/caller-list')}}" aria-haspopup="true">
                    <span class="sidenav-icon icon  icon-phone icon-phone "></span>
                    <span class="sidenav-label">Call Management</span>
                  </a>
                </li>

                <li class="sidenav-item profilePageNav">
                  <a href="#"><!--{{url('/admin/story')}}--->
                    <span class="sidenav-icon icon  icon-book icon-book"></span>
                    <span class="sidenav-label">Story Management</span>
                  </a>
                </li>

                <li class="sidenav-item profilePageNav">
                  <a href="{{url('admin/support-mgmt')}}"><!--{{url('/admin/story')}}--->
                    <i class="icon-question-sign"></i>
                    <span class="sidenav-icon icon  icon-question icon-question"></span>
                    <span class="sidenav-label">Support Management</span>
                  </a>
                </li>

                <li class="sidenav-item profilePageNav">
                  <a href="{{url('admin/report-management')}}"><!--{{url('/admin/story')}}--->
                    <span class="sidenav-icon icon icon-building icon-building"></span>
                    <span class="sidenav-label">Report Generation</span>
                  </a>
                </li>
                <li class="sidenav-item profilePageNav">
                  <a href="{{url('admin/notification-mgmt')}}">
                    <span class="sidenav-icon icon icon-bell-o icon-lg"></span>
                    <span class="sidenav-label">Notification Mgmt</span>
                  </a>
                </li>
                <li class="sidenav-item profilePageNav">
                  <a href="{{url('admin/friends-mgmt')}}">
                    <span class="sidenav-icon icon icon-users icon-users"></span>
                    <span class="sidenav-label">Friend Mgmt</span>
                  </a>
                </li>
                <li class="sidenav-item profilePageNav">
                  <a href="{{url('admin/Rateing-mgmt')}}">
                    <span class="sidenav-icon icon icon-star icon-star"></span>
                    <span class="sidenav-label">Ratings Mgmt</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>