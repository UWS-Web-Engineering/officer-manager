
@extends('app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    
    <div class="content">
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="operator_count"></h3>

                <p>Operators</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="operators.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="advertising_count"><sup style="font-size: 20px">%</sup></h3>

                <p>Advertising Crops</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="advertising.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="farmer_count"></h3>
                <p>Farmers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="farmers.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="query_count"></h3>
                <p>Queries</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="quiries.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
        </div>
        
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Region Wise Crops</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="crops-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> No of Crops
                  </span>

                  
                </div>
              </div>
            </div>
            

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Advertising Crops</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>End Date</th>
                  </tr>
                  </thead>
                  <tbody id="product-tbody">
                  <tr>
                    <td colspan="4" align="center">Loading...</td>
                  </tr>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Region Wise Farmers</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="position-relative mb-4">
                  <canvas id="farmer-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> No. of Farmers
                  </span>
                </div>
              </div>
            </div>
            

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Latest Queries</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Farmer</th>
                    <th>Officer</th>
                    <th>Query</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody id="queries-tbody">
                  <tr>
                    <td colspan="4" align="center">Loading...</td>
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
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

@endsection
@section('scripts')

<script src="assets/plugins/chart.js/Chart.min.js"></script>
<script type="text/javascript">
  var keysForLineChart,valuesForLineChart;
  var keysForBarChart,valuesForBarChart;
  var a;
  $.ajax({
      url: 'api/cropsByRegion',
      type: 'GET',
      success: function(response) {
          var obj = JSON.parse(response);
          keysForLineChart = Object.keys(obj);
          valuesForLineChart = Object.values(obj);

          // For Chart
          var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
          }

          var mode = 'index'
          var intersect = true

          var $visitorsChart = $('#crops-chart')
          var visitorsChart = new Chart($visitorsChart, {
            data: {
              labels: keysForLineChart,
              datasets: [{
                type: 'line',
                data: valuesForLineChart,
                backgroundColor: 'transparent',
                borderColor: '#007bff',
                pointBorderColor: '#007bff',
                pointBackgroundColor: '#007bff',
                fill: false
              }]
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                mode: mode,
                intersect: intersect
              },
              hover: {
                mode: mode,
                intersect: intersect
              },
              legend: {
                display: false
              },
              scales: {
                yAxes: [{
                  // display: false,
                  gridLines: {
                    display: true,
                    lineWidth: '4px',
                    color: 'rgba(0, 0, 0, .2)',
                    zeroLineColor: 'transparent'
                  },
                  ticks: $.extend({
                    beginAtZero: true,
                    suggestedMax: 100
                  }, ticksStyle)
                }],
                xAxes: [{
                  display: true,
                  gridLines: {
                    display: false
                  },
                  ticks: ticksStyle
                }]
              }
            }
          })

      }
  });

  // for Bar Chart
  $.ajax({
      url: 'api/farmersByRegion',
      type: 'GET',
      success: function(response) {
          var obj = JSON.parse(response);
          
          keysForBarChart = Object.keys(obj);
          valuesForBarChart = Object.values(obj);

          // For chart
          var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
          }

          var mode = 'index'
          var intersect = true

          var $salesChart = $('#farmer-chart')
          var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
              labels: keysForBarChart,
              datasets: [
                {
                  backgroundColor: '#007bff',
                  borderColor: '#007bff',
                  data: valuesForBarChart
                }
              ]
            },
            options: {
              maintainAspectRatio: false,
              tooltips: {
                mode: mode,
                intersect: intersect
              },
              hover: {
                mode: mode,
                intersect: intersect
              },
              legend: {
                display: false
              },
              scales: {
                yAxes: [{
                  // display: false,
                  gridLines: {
                    display: true,
                    lineWidth: '4px',
                    color: 'rgba(0, 0, 0, .2)',
                    zeroLineColor: 'transparent'
                  },
                  ticks: $.extend({
                    beginAtZero: true,

                    // Include a dollar sign in the ticks
                    callback: function (value) {
                      if (value >= 1000) {
                        value /= 1000
                        value += 'k'
                      }

                      return value
                    }
                  }, ticksStyle)
                }],
                xAxes: [{
                  display: true,
                  gridLines: {
                    display: false
                  },
                  ticks: ticksStyle
                }]
              }
            }
          })
        }
  });

  
</script>
<!-- <script src="assets/js/pages/dashboard3.js"></script> -->
<script type="text/javascript">
  // For Counter
  $.ajax({
            url: 'api/dashboard/1',
            type: 'GET',
            success: function(response) {
              var obj = JSON.parse(response);
              $('#operator_count').text(obj.officers);
              $('#advertising_count').html(obj.products+'<sup style="font-size: 20px">%</sup>');
              $('#farmer_count').text(obj.farmers);
              $('#query_count').text(obj.queries);
              //document.getElementById('operator_count').innerHTML(obj.officers);
                          
            }
        });

// For Product List
  $.ajax({
      url: 'api/advertisingcrops',
      type: "GET",
      success: function(data) {
              $('#product-tbody').html('');
              $.each(data, function(key, value) {
                $('#product-tbody').append(`
                    <tr>
                      <td>
                        `+value.cropname+`
                      </td>
                      <td>$`+value.cropprice+`</td>
                      <td>
                        `+value.cropqty+`kg
                      </td>
                      <td>
                        `+value.expecteddate+`
                      </td>
                    </tr>
                `);
              });  
            }
        });

  // For Query List
  $.ajax({
      url: 'api/queries',
      type: "GET",
      success: function(data) {
              $('#queries-tbody').html('');
              var data = JSON.parse(data);
              $.each(data, function(key, value) {
                $('#queries-tbody').append(`
                    <tr>
                      <td>
                        `+value.farmername+`
                      </td>
                      <td>`+value.officername+`</td>
                      <td>
                        `+value.farmerquery+`kg
                      </td>
                      <td>
                        `+value.date+`
                      </td>
                    </tr>
                `);
              });  
            }
        });
</script>
@stop

