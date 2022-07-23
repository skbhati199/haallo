<?php include 'header.php';?>
<div class="dashboardPage"></div>
<div class="layout-content">
  <div class="layout-content-body">
    <div class="title-bar">
      <h1 class="title-bar-title">
        <span class="d-ib">Dashboard</span>
      </h1>
    </div>
    <div class="row">
      <div class="orderTable col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="nav nav-tabs">
          <li class="actives"><a href="index.php">Active <span>2</span></a></li>
          <li class="cancelled active"><a href="index-cancelled.php">Cancelled <span>2</span></a></li>
          <li class="complete"><a href="index-complete.php">Complete <span>2</span></a></li>
        </ul>
        <div class="ordersDetails">
          <div id="Cancelled" class="tab-pane">
            <div class="card">
              <div class="card-header">
                <div class="card-actions">
                  <!--button type="button" class="card-action card-toggler" title="Collapse"></button-->
                  <button type="button" class="card-action card-reload" title="Reload"></button>
                </div>
                <strong>Cancelled list</strong>
              </div>
              <div class="card-body">
                <table id="demo-datatables-8" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th width="50">Image</th>
                      <th>Order Id</th>
                      <th>Restaurant</th>
                      <th>User Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><img src="img/Recipe1.jpg" width="50"/></td>
                      <td>#010anHrDdYF</td>
                      <td>Paan Paan Platter</td>
                      <td>Mr.Asif</td>
                      <td>
                        <button class="btn btn-primary btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#fullDetails">
                          <span class="btn-label">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                          </span>
                          Full Details
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td><img src="img/Recipe.jpg" width="50"/></td>
                      <td>#010anHrDdYF</td>
                      <td>Paan Paan Platter</td>
                      <td>Mr.Ahamed</td>
                      <td>
                        <button class="btn btn-primary btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#fullDetails">
                          <span class="btn-label">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                          </span>
                          Full Details
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td><img src="img/Recipe1.jpg" width="50"/></td>
                      <td>#010anHrDdYF</td>
                      <td>Paan Paan Platter</td>
                      <td>Mr.Ahamed</td>
                      <td>
                        <button class="btn btn-primary btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#fullDetails">
                          <span class="btn-label">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                          </span>
                          Full Details
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

<!-- Start: full details modal -->
<div id="fullDetails" class="modal fade" role="dialog">
  <div class="modal-md modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3><i class="fa fa-user-o"></i> Customer Full Details</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="fullDetails">
          <label class="customerId"><span>#009_L9r5253a</span> Order <em>[5741698]</em></label>
          <div class="clear"></div>
          <label>Isuru Dangedara</label>
          <div class="clear"></div>
          <label><i class="fa fa-map-marker"></i> 1/59 1st Flore Liberty Plaza R. A. De Mel Mawatha, Colombo 00700, Sri Lanka</label>
          <label>
            <span>Time :</span> 11:28 PM
            <br>
            <span>Dtae :</span> 11/28/2018
          </label>
          <label><i class="fa fa-phone"></i> +94753300155</label>
          <label>
            <span>Payment :</span> Cash
            <br>
            <span>Paid :</span> <i class="fa fa-close"></i>
          </label>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End: full details modal -->
