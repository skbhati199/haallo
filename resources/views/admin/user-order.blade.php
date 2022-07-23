<?php include 'header.php';?>
    <div class="userListPage ExplorerListPage">
        <div class="layout-content">
            <div class="layout-content-body">
                <div class="title-bar">
                    <h1 class="title-bar-title">
                      <span class="d-ib">User Order list /
                      <a href="user-list.php">back to list</a>
                      </span>
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
                                <strong>Order list</strong>
                            </div>
                            <div class="card-body">
                                <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
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
    