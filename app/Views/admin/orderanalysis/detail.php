<!-- /.col-->
<div class="c-wrapper c-fixed-components">
      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
      
        
        <div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            <!-- Breadcrumb Menu-->
          </ol>
        </div>
      </header>
      <div class="c-body">
        <main class="c-main">
          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">

              
                <div class="col-md-12 mb-4">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#total_sales" role="tab" aria-controls="home">
                        <svg class="c-icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
                        </svg> Total sales <span class="badge badge-success">New</span></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#total_order" role="tab" aria-controls="profile">
                        <svg class="c-icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-basket"></use>
                        </svg> Total Number of orders<span class="badge badge-pill badge-danger">29</span></a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rate" role="tab" aria-controls="messages">
                        <svg class="c-icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                        </svg> 24 Hours Rate</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="total_sales" role="tabpanel">
                        <div class="card">
        
                            <div class="card-header">Total Sales
                                <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted"></small></a></div>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date From</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_from_sales" name="dateFrom" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date To</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_to_sales" name="dateTo" value="">
                                </div>
                            
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Submit</label>
                                    <br>
                                    <button id="btn_get_total_sales" class="form-control filter btn-primary btn" name="dateTo" >Submit</button>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="total_sales_chart">
                            </div>
                        </div>
                        </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="total_order" role="tabpanel">
                        <div class="card">
                            
                            <div class="card-header">Total Sales
                                <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted"></small></a></div>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date From</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_from_sales" name="dateFrom" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date To</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_to_sales" name="dateTo" value="">
                                </div>
                            
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Submit</label>
                                    <br>
                                    <button id="btn_get_total_sales" class="form-control filter btn-primary btn" name="dateTo" >Submit</button>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="total_sales_chart">
                            </div>
                        </div>
                        </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="rate" role="tabpanel">
                    <div class="card">
                        <div class="card-header">Line Chart
                            <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->
              <!-- /.row-->
              
              <!-- /.row-->
            </div>
          

          <script>
           $('#btn_get_total_sales').on('click', function () {
                let date_from = $('#date_from_sales').val();    
                let date_to = $('#date_to_sales').val();    
                get_total_sales(date_from,date_to);
        });

          function get_total_sales(date_from,date_to){
              let postParam = {
                  date_from : date_from , 
                  date_to : date_to,
              }
                $.post("<?=base_url('OrderAnalysis/get_total_sales') ?>", postParam, function(html){
                    $('.total_sales_chart').html(html);
                });
            }

          </script>
