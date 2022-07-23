<?php include 'header.php';?>
<div class="rest-profilePage"></div>
<div class="layout-content">
  <div class="profile">
   <div class="profile-header">
    <div class="profile-cover">
      <div class="profile-container">
        <div class="profile-card">
          <div class="profile-avetar">
            <img class="profile-avetar-img" width="128" height="128" src="img/0180441436.jpg" alt="Teddy Wilson">
          </div>
          <div class="profile-overview">
            <h1 class="profile-name">Restaurant name</h1>
            <h4>Location of restaurent ipsum dolor sit amet, reprehenderit blanditiis.</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quae, quam reprehenderit blanditiis. Necessitatibus et vitae, eligendi explicabo sit voluptatibus dolores dolorem quas, sunt numquam rem, harum accusamus eaque debitis!</p>
          </div>
          <div class="profile-info">
            <ul class="profile-nav">
              <li>
                <a href="#">
                  <h3 class="profile-nav-heading">143</h3>
                  <em>
                    <small>Price</small>
                  </em>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="profile-tabs">
          <ul class="profile-nav">
            <li><a href="restaurant-profile.php">Description</a></li>
            <li><a href="rest-menu.php">Menu</a></li>
            <li class="active"><a href="rest-order.php">Order</a></li>
            <li><a href="rest-images.php">Images</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="layout-content-body">
   <div class="row">
    <div class="col-md-12">
      <div class="panel m-b-lg">
        <ul class="nav nav-tabs nav-justified">
          <li class="active"><a href="#tab-1" data-toggle="tab">Online order</a></li>
          <li><a href="#tab-2" data-toggle="tab">Table booking</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade active in" id="tab-1">
            <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>Sr. No.</th>
                      <th>User Name</th>
                      <th>Location</th>
                      <th>Order ID</th>
                      <th>Discount</th>
                      <th>Date</th>
                      <th>View order</th>
                      <th>Status</th>
                  </tr>
              </thead>

              <tbody>
                  <tr>
                      <td>1</td>
                      <td>mohit</td>
                      <td>Lorem ipsum is the dummy content</td>
                      <td>#012361234</td>
                      <td>20%</td>
                      <td>22-03-2018</td>
                      <td>
                          <button class="btn btn-primary btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#viewOrder">
                              <span class="btn-label">
                               <span class="icon icon-eye icon-lg icon-fw"></span>
                              </span>
                              View Order
                          </button>
                      </td>
                      <td>
                          <button class="btn btn-success btn-sm btn-labeled" type="button">
                              deliver
                          </button>
                      </td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>mohit</td>
                      <td>Lorem ipsum is the dummy content</td>
                      <td>#012361234</td>
                      <td>20%</td>
                      <td>22-03-2018</td>
                      <td>
                          <button class="btn btn-primary btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#viewOrder">
                              <span class="btn-label">
                               <span class="icon icon-eye icon-lg icon-fw"></span>
                              </span>
                              View Order
                          </button>
                      </td>
                      <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                              Canceled
                          </button>
                      </td>
                  </tr>
              </tbody>
          </table>
          </div>
          <div class="tab-pane fade" id="tab-2">
            <table id="demo-datatables-2" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>Sr. No.</th>
                      <th>User Name</th>
                      <th>Location</th>
                      <th>Order ID</th>
                      <th>Discount</th>
                      <th>Date</th>
                      <th>View order</th>
                      <th>Status</th>
                  </tr>
              </thead>

              <tbody>
                  <tr>
                      <td>1</td>
                      <td>mohit</td>
                      <td>Lorem ipsum is the dummy content</td>
                      <td>#012361234</td>
                      <td>20%</td>
                      <td>22-03-2018</td>
                      <td>
                          <button class="btn btn-primary btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#viewTBorder">
                              <span class="btn-label">
                               <span class="icon icon-eye icon-lg icon-fw"></span>
                              </span>
                              View Order
                          </button>
                      </td>
                      <td>
                          <button class="btn btn-success btn-sm btn-labeled" type="button">
                              deliver
                          </button>
                      </td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>mohit</td>
                      <td>Lorem ipsum is the dummy content</td>
                      <td>#012361234</td>
                      <td>20%</td>
                      <td>22-03-2018</td>
                      <td>
                          <button class="btn btn-primary btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#viewTBorder">
                              <span class="btn-label">
                               <span class="icon icon-eye icon-lg icon-fw"></span>
                              </span>
                              View Order
                          </button>
                      </td>
                      <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                              Canceled
                          </button>
                      </td>
                  </tr>
              </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
   </div>
  </div>
 </div>
</div>

<?php include 'footer.php';?>
<div id="viewOrder" tabindex="-1" role="dialog" class="modal fade">
     <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Order view</h4>
          </div>
          <div class="modal-body provider-detail">
           <div class="row">
            <div class="col-xs-12">
             <table class="table table-border">
              <tbody>
                <tr>
                  <td style="width: 50px;">1.</td>
                  <td class="">Dish name 1</td>
                  <td class=""><div class="text-right">Price RS. <span>118</span></div></td>
                </tr>
                <tr>
                  <td style="width: 50px;">2.</td>
                  <td class="">Dish name 1</td>
                  <td class=""><div class="text-right">Price RS. <span>118</span></div></td>
                </tr>
                <tr>
                  <td style="width: 50px;">3.</td>
                  <td class="">Dish name 1</td>
                  <td class=""><div class="text-right">Price RS. <span>118</span></div></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td class=""><div class="text-right">Total. <span>2118</span></div></td>
                </tr>
              </tbody>
            </table> 
            </div> 
           </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>      
    </div>
<div id="viewTBorder" tabindex="-1" role="dialog" class="modal fade">
     <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Table Order view</h4>
          </div>
          <div class="modal-body provider-detail">
           <div class="row">
            <div class="col-xs-12">
             <table class="table table-border">
              <tbody>
                <tr>
                  <td style="width: 50px;">1.</td>
                  <td class="">Table No 12</td>
                  <td class=""><div class="text-right">Price RS. <span>118</span></div></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td class=""><div class="text-right">Total. <span>2118</span></div></td>
                </tr>
              </tbody>
            </table> 
            </div> 
           </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>      
    </div>