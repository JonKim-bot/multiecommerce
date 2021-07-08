

                    
    <div class="c-wrapper c-fixed-components">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
      
        
        <div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">Store Perfomance</li>
            <!-- Breadcrumb Menu-->
          </ol>
        </div>
      </header>
      <div class="c-body">
        <main class="c-main">
          <div class="container-fluid">
            <div class="fade-in">
              <div class="col-sm-6">
                       
                    </div>
                    <form method="GET" id="filter_form" style="padding-bottom:50px">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-3">
                                <label for="" class="c-label">Date From</label>
                                <br>
                                <input type="date" class="form-control filter" name="dateFrom" 
                                value="<?=  ($_GET and
                            isset($_GET['dateFrom']))
                                ? $_GET['dateFrom']

                                : date('Y-m-d') ?>"
                                >
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                <label for="" class="c-label">Date To</label>
                                <br>
                                <input type="date" class="form-control filter" name="dateTo" value="<?=  ($_GET and
                            isset($_GET['dateTo']))
                                ? $_GET['dateTo']

                                : date('Y-m-d') ?>"
                                >
                            </div>
                          
                            <select name="shop_id" id="" class="form-control selection">
                              <?php foreach($shop as $row){ ?>

                                  <?php if( isset($_GET['shop_id']) && $row['shop_id'] == $_GET['shop_id']){ ?>
                                      <option selected value="<?= $row['shop_id'] ?>"><?= $row['shop_name'] ?></option>

                                  <?php  }else{ ?>

                                  <option value="<?= $row['shop_id'] ?>"><?= $row['shop_name'] ?></option>
                                  <?php } ?>
                              <?php } ?>
                           </select>
                          
                        </div>
                        
                    </form>
              <div class="row">
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-primary">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg">RM <?= $total_today_orders  ?></div>
                        <div>Today Sales</div>
                      </div>
                      <div class="btn-group">
                        <!-- <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                          <svg class="c-icon">
                                <i class="fa fa-credit-card fa-3x"></i>
                          </svg>
                        <!-- </button> -->
                        <!-- <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div> -->
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart1" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-info">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                      <div class="text-value-lg"><?= $total_number_orders  ?></div>
                        <div>Today Orders</div>
                      </div>
                      <div class="btn-group">
                        <!-- <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                          <svg class="c-icon">
                          <i class="fa fa-shopping-cart fa-3x"></i>
                          </svg>
                        <!-- </button> -->
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart2" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-warning">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                      <div class="text-value-lg"><?= $new_registered_member  ?></div>
                        <div>Today registered member</div>
                      </div>
                      <div class="btn-group">
                        <!-- <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                          <svg class="c-icon">
                          <i class="fa fa-users fa-3x"></i>
                          </svg>
                        <!-- </button> -->
                        <!-- <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div> -->
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3" style="height:70px;">
                      <canvas class="chart" id="card-chart3" height="70"></canvas>
                    </div>
                  </div>
                </div>


                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-primary">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg">RM <?= $payment_gateway  ?></div>
                        <div>Payment Gateway</div>
                      </div>
                      <div class="btn-group">
                        <!-- <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                          <svg class="c-icon">
                                <i class="fa fa-credit-card fa-3x"></i>
                          </svg>
                        <!-- </button> -->
                        <!-- <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div> -->
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart1" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-info">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                      <div class="text-value-lg">RM <?= $online_banking  ?></div>
                        <div>Online Banking</div>
                      </div>
                      <div class="btn-group">
                        <!-- <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                          <svg class="c-icon">
                          <i class="fa fa-shopping-cart fa-3x"></i>
                          </svg>
                        <!-- </button> -->
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart2" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-warning">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                      <div class="text-value-lg">RM <?= $cod  ?></div>
                        <div>Cod</div>
                      </div>
                      <div class="btn-group">
                        <!-- <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                          <svg class="c-icon">
                          <i class="fa fa-users fa-3x"></i>
                          </svg>
                        <!-- </button> -->
                        <!-- <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div> -->
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3" style="height:70px;">
                      <canvas class="chart" id="card-chart3" height="70"></canvas>
                    </div>
                  </div>
                </div>

                

                
                <!-- /.col-->
                <!-- <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-danger">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg">9.823</div>
                        <div>Members online</div>
                      </div>
                      <div class="btn-group">
                        <!-- <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                          <svg class="c-icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                          </svg>
                        <!-- </button> -->
                        <!-- <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div> -->
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart4" height="70"></canvas>
                    </div>

                    <script>

$(document).on("change", ".filter", function (e) {

$('#filter_form').submit();
});
$(document).ready(function(){

            function submit_category(){
                alert("asd");
            }

            $('.selection').on('change', function(e) {
        e.preventDefault();
        var value = $(this).val();
        // alert(value);
        $('#filter_form').submit();

        // window.location.href = ("<?= base_url() ?>/orderanalysis?shop_id=" + value);
    })
        });
        </script>