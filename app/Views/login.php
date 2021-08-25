<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url();?>/public/assets/plugins/fontawesome-free/css/all.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>/public/assets/dist/css/adminlte.min.css">
  
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <p class="mb-0 pb-0">Dr. Alfred Adrian O. Lopez</p>
      <a href="#" class="h2"><b>EENT Clinic</b></a>
    </div>
    <div x-data="app()" class="card-body">
      <p class="login-box-msg" >Log in to start your session</p>
        <template x-if="hasError('missing')">
          <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.missing"></span>
        </template>
      <form method="post" id="login-form">
                  <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
        <template x-if="hasError('username')">
          <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.username"></span>
        </template>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" x-on:keydown="deleteError('username')" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <template x-if="hasError('password')">
          <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.password"></span>
        </template>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" x-on:keydown="deleteError('password')" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="offset-8 col-4">
            <button type="button" class="btn btn-primary btn-block" @click.prevent="login()">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="<?= base_url();?>/public/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url();?>/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>/public/assets/dist/js/adminlte.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script type="text/javascript">


  function app() {
    return {
      data: {
        errors: {},
      },
      login() {
        const data = new FormData(document.querySelector('#login-form'));
        axios.post('login', data)
        .then(res => {
          window.location.reload();
          })
        .catch(err =>{
          this.data.errors = err.response.data.messages;
        })
      },
      hasError(field) {
        return (field in this.data.errors) ? true : false;
      },
      deleteError(field) {
        delete this.data.errors[field];
      },
    }
  }

</script>

</body>
</html>
