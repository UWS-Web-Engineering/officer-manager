<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Company/Manager Registration Page</title>
  <link rel="stylesheet" href="css/adminlte.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Logo</b>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new company/manager</p>

      <form action="login.html" method="post">
        <div class="mb-3">
          <input type="text" class="form-control" name="company_name" placeholder="Company Name">
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" name="company_address" placeholder="Company Address">
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" name="manager_first_name" placeholder="Manager First Name">
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" name="manager_last_name" placeholder="Manager Last Name">
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" name="contact_number" placeholder="Contact Number">
        </div>
        
        <div class=" mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <a href="login.html" class="text-center">Login</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div>
</div>
<!-- /.register-box -->

</body>
</html>
