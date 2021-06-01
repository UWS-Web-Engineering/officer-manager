@extends('app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Queries</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Queries</li>
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
                    <th>Farmer</th>
                    <th>Officer</th>
                    <th>Query</th>
                    <th>Response</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody id="queries-tbody">
                  <tr>
                    <td colspan="5" align="center">Loading...</td>
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
                        `+value.officerquery+`
                      </td>
                      <td>
                        `+value.farmerquery+`
                      </td>
                      <td>
                        `+value.date+`
                      </td>
                    </tr>
                `);
              });  
            }
        });
  })
</script>
@stop
