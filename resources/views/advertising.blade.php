@extends('app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advertising Crops</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advertising Crops</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 15%">
                          Officer
                      </th>
                      <th style="width: 15%">
                          Product
                      </th>
                      <th style="width: 15%">
                          Price
                      </th>
                      <th style="width: 15%">
                          Quantity
                      </th>
                      <th style="width: 15%">
                          Progress
                      </th>
                      <th>
                          End Date
                      </th>
                      
                  </tr>
              </thead>
              <tbody id="Advertising-tbody">
                  <tr>
                    <td colspan="6" align="center">Loading...</td>
                  </tr>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('scripts')
<script type="text/javascript">
  $(function(){
      // Get Officers Listing
      $.ajax({
        url: 'api/advertisingcrops',
        type: "GET",
        success: function(data) {
                $('#Advertising-tbody').html('');
                let Status = '';
                let complete = 10;
                $.each(data, function(key, value) {
                  complete += 10;
                  $('#Advertising-tbody').append(`
                      <tr>
                        <td>`+value.officername+`</td>
                        <td>`+value.cropname+`</td>
                        <td>$`+value.cropprice+`</td>
                        <td>`+value.cropqty+`kg</td>
                        <td class="project_progress">
                          <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="`+complete+`" aria-valuemin="0" aria-valuemax="100" style="width: `+complete+`%">
                            </div>
                          </div>
                          <small>
                          `+complete+`% Complete
                          </small>
                        </td>
                        <td>`+value.expecteddate+`</td>
                      </tr>
                  `);
                });  
              }
          });
  })
</script>
@stop
