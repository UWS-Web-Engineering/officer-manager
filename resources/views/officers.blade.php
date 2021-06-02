
@extends('app')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Officers Management</h1>  
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Officers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      
                    </tr>
                  </thead>
                  <tbody id="officers-tbody">
                  <tr>
                    <td colspan="2" align="center">Loading...</td>
                  </tr>
                  
                  </tbody>

                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
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
        url: 'https://gateway.include.ninja/api/officer-manager/officers/1',
        type: "GET",
        success: function(data) {
                $('#officers-tbody').html('');
                let Status = '';
                $.each(data, function(key, value) {
                  if(value.Status == 1)
                    Status = 'Active';
                  else
                    Status = 'Inactive';
                  $('#officers-tbody').append(`
                      <tr>
                        <td>
                          `+value.officername+`
                        </td>
                        <td>`+value.email+`</td>
                        
                      </tr>
                  `);
                });  
              }
          });
  })
</script>
@stop
