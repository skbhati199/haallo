<?php include 'header.php';?>
    <div class="restaurantPage ExplorerListPage">
        <div class="layout-content">
            <div class="layout-content-body">
                <div class="title-bar">
                    <h1 class="title-bar-title">
                      <span class="d-ib">Restaurant Management</span>
                    </h1>
                </div>
                <div class="row gutter-xs">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-actions">
                                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                                    <button type="button" class="card-action card-reload" title="Reload"></button>

                                </div>
                                <strong>Restaurant list</strong>
                            </div>
                            <div class="card-body">
                                <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Restaurant Name</th>
                                            <th>Location</th>
                                            <th>Mobile</th>
                                            <th>View profile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>mohit</td>
                                            <td>Lorem ipsum is the dummy content</td>
                                            <td>986561234</td>
                                            <td>
                                                <a href="restaurant-profile.php" class="btn btn-primary btn-sm btn-labeled" type="button">
                                                    <span class="btn-label">
                                                     <span class="icon icon-eye icon-lg icon-fw"></span>
                                                    </span>
                                                    View Profile
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#deleteRestro">
                                                    <span class="btn-label">
                                                     <span class="icon icon-bank icon-lg icon-fw"></span>
                                                    </span>
                                                    Block
                                                </button>
                                                <button class="btn btn-success btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#unblockRestro">
                                                    <span class="btn-label">
                                                     <span class="icon icon-check icon-lg icon-fw"></span>
                                                    </span>
                                                    Unblock
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>mohit</td>
                                            <td>Lorem ipsum is the dummy content</td>
                                            <td>986561234</td>
                                            <td>
                                                <a href="restaurant-profile.php" class="btn btn-primary btn-sm btn-labeled" type="button">
                                                    <span class="btn-label">
                                                     <span class="icon icon-eye icon-lg icon-fw"></span>
                                                    </span>
                                                    View Profile
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#deleteRestro">
                                                    <span class="btn-label">
                                                     <span class="icon icon-bank icon-lg icon-fw"></span>
                                                    </span>
                                                    Reject
                                                </button>
                                                <button class="btn btn-success btn-sm btn-labeled" type="button" data-toggle="modal" data-target="#unblockRestro">
                                                    <span class="btn-label">
                                                     <span class="icon icon-check icon-lg icon-fw"></span>
                                                    </span>
                                                    Accept
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

    <?php include 'footer.php';?>
    <div id="unblockRestro" tabindex="-1" role="dialog" class="modal fade">
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
              <span class="text-success icon icon-times-circle icon-5x"></span>
              <h3 class="text-success">Sure</h3>
              <h4>Are you want to unblock this item?</h4>
              <div class="m-t-lg">
                <button class="btn btn-success" data-dismiss="modal" type="button">Continue</button>
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
              </div>
            </div>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>      
    </div>
    <div id="deleteRestro" tabindex="-1" role="dialog" class="modal fade">
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

    