@extends('app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Farmers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Farmers</li>
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
                          Farmer
                      </th>
                      <th style="width: 15%">
                          Email
                      </th>
                      <th style="width: 15%">
                          Phone
                      </th>
                      <th style="width: 15%">
                          Address
                      </th>
                      <th>
                          Crop
                      </th>
                      
                  </tr>
              </thead>
              <tbody id="farmers-tbody">
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
        headers: {"Authorization": localStorage.getItem('token')},
        url: 'https://gateway.include.ninja/api/officer-manager/myfarmers',
        type: "GET",
        success: function(data) {
                $('#farmers-tbody').html('');
                
                $.each(data, function(key, value) {

                  $('#farmers-tbody').append(`
                      <tr>
                        <td>`+value.officername+`</td>
                        <td>`+value.farmername+`</td>
                        <td>`+value.farmeremail+`</td>
                        <td>`+value.farmerphone+`</td>
                        <td>`+value.farmerAddress+`</td>
                        <td>`+value.cropname+`</td>
                      </tr>
                  `);
                });  
              }
          });
  })
</script>
@stop
