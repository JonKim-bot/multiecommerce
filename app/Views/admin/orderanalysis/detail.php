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
                        </svg> Total sales</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#total_order" role="tab" aria-controls="profile">
                        <svg class="c-icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-basket"></use>
                        </svg> Total Number of orders</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#rate" role="tab" aria-controls="messages">
                        <svg class="c-icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                        </svg> 24 Hours Rate</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#new_registered_member" role="tab" aria-controls="messages">
                        <svg class="c-icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                        </svg> New registered member</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#top_product" role="tab" aria-controls="messages">
                        <svg class="c-icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                        </svg> Top Product</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#top_product_cat" role="tab" aria-controls="messages">
                        <svg class="c-icon">
                          <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                        </svg> Top Category</a></li>
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
                            
                            <div class="card-header">Total Orders
                                <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted"></small></a></div>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date From</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_from_order" name="dateFrom" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date To</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_to_order" name="dateTo" value="">
                                </div>
                            
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Submit</label>
                                    <br>
                                    <button id="btn_get_total_order" class="form-control filter btn-primary btn" name="dateTo" >Submit</button>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="total_order_chart">
                            </div>
                        </div>
                        </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="rate" role="tabpanel">
                    <div class="card">
                            
                            <div class="card-header">24 Hours Orders
                                <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted"></small></a></div>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date From</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_from_rate" name="dateFrom" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date To</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_to_rate" name="dateTo" value="">
                                </div>
                            
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Submit</label>
                                    <br>
                                    <button id="btn_get_total_rate" class="form-control filter btn-primary btn" name="dateTo" >Submit</button>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="total_rate_chart">
                                </div>
                        </div>
                        </div>
                        </div>

                    </div>
                  <div class="tab-pane" id="new_registered_member" role="tabpanel">
                    <div class="card">
                            
                            <div class="card-header">New registered member
                                <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted"></small></a></div>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date From</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_from_new_register" name="dateFrom" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date To</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_to_new_register" name="dateTo" value="">
                                </div>
                            
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Submit</label>
                                    <br>
                                    <button id="btn_get_total_new_register" class="form-control filter btn-primary btn" name="dateTo" >Submit</button>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="total_new_register_chart">
                                </div>
                        </div>
                        </div>
                        </div>

                    </div>
                  <div class="tab-pane" id="top_product" role="tabpanel">
                    <div class="card">
                            
                            <div class="card-header">Top Product
                                <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted"></small></a></div>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date From</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_from_top_product" name="dateFrom" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date To</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_to_top_product" name="dateTo" value="">
                                </div>
                            
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Submit</label>
                                    <br>
                                    <button id="btn_top_product" class="form-control filter btn-primary btn" name="dateTo" >Submit</button>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="total_top_product_table">
                                </div>
                        </div>
                        </div>
                        </div>

                    </div>
                  <div class="tab-pane" id="top_product_cat" role="tabpanel">
                    <div class="card">
                            
                            <div class="card-header">Top product category
                                <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted"></small></a></div>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date From</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_from_top_product_cat" name="dateFrom" value="">
                                </div>
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Date To</label>
                                    <br>
                                    <input type="date" class="form-control filter" id="date_to_top_product_cat" name="dateTo" value="">
                                </div>
                            
                                <div class="form-group col-sm-12 col-md-3">
                                    <label for="" class="c-label">Submit</label>
                                    <br>
                                    <button id="btn_top_product_cat" class="form-control filter btn-primary btn" name="dateTo" >Submit</button>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                <div class="total_top_product_cat_table">
                            </div>
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
          
          $('#btn_get_total_new_register').on('click', function () {
                let date_from = $('#date_from_new_register').val();    
                let date_to = $('#date_to_new_register').val();    
                get_new_registered(date_from,date_to);
        });

        $('#btn_top_product').on('click', function () {
                let date_from = $('#date_from_top_product').val();    
                let date_to = $('#date_to_top_product').val();    
                get_top_product(date_from,date_to);
        });

        $('#btn_top_product_cat').on('click', function () {
                let date_from = $('#date_from_top_product_cat').val();    
                let date_to = $('#date_to_top_product_cat').val();    
                get_top_product_cat(date_from,date_to);
        });

           $('#btn_get_total_sales').on('click', function () {
                let date_from = $('#date_from_sales').val();    
                let date_to = $('#date_to_sales').val();    
                get_total_sales(date_from,date_to);
        });

        $('#btn_get_total_order').on('click', function () {
                let date_from = $('#date_from_order').val();    
                let date_to = $('#date_to_order').val();    
                get_total_order(date_from,date_to);
        });

        $('#btn_get_total_rate').on('click', function () {
                let date_from = $('#date_from_rate').val();    
                let date_to = $('#date_to_rate').val();    
                get_total_rate(date_from,date_to);
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

            function get_total_order(date_from,date_to){
              let postParam = {
                  date_from : date_from , 
                  date_to : date_to,
              }
                $.post("<?=base_url('OrderAnalysis/get_total_order') ?>", postParam, function(html){
                    $('.total_order_chart').html(html);
                });
            }

            function get_total_rate(date_from,date_to){
              let postParam = {
                  date_from : date_from , 
                  date_to : date_to,
              }
                $.post("<?=base_url('OrderAnalysis/get_total_rate') ?>", postParam, function(html){
                    $('.total_rate_chart').html(html);
                });
            }

            function get_top_product_cat(date_from,date_to){
              let postParam = {
                  date_from : date_from , 
                  date_to : date_to,
              }
                $.post("<?=base_url('OrderAnalysis/get_top_product_cat') ?>", postParam, function(html){
                    $('.total_top_product_cat_table').html(html);
                });
            }
            function get_new_registered(date_from,date_to){
              let postParam = {
                  date_from : date_from , 
                  date_to : date_to,
              }
                $.post("<?=base_url('OrderAnalysis/get_new_register') ?>", postParam, function(html){
                    $('.total_new_register_chart').html(html);
                });

            }

            function get_top_product(date_from,date_to){
              let postParam = {
                  date_from : date_from , 
                  date_to : date_to,
              }
                $.post("<?=base_url('OrderAnalysis/get_top_product') ?>", postParam, function(html){
                    $('.total_top_product_table').html(html);
                });
            }
          </script>
