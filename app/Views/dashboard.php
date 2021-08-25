<?= $this->extend('main') ?>
    
<?= $this->section('content') ?>
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
          <div class="col-12 d-flex justify-content-center">
            <div class="text-center my-5">
              <h1>DR. ALFRED ADRIAN O. LOPEZ (EENT)</h1>
              <h6>Peralta St, Cor. Quezon St., Polvorista, Sorsogon City</h6>
              <h6>CP # - 0982122487</h6>
              <br>
              <p class="mb-0 pb-0">CLINIC HOURS</p>
              <h6>MF: 9:00AM - 12:00NN, 2:00PM - 5:00PM</h6>
              <h6>TTHS: 9:00AM - 12:00NN</h6>
            </div>
          </div>
        </div>

        <h5 class="mb-2">Statistics</h5>
        <div class="row">
          <div class="col-md-4 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-light"><i class="fas fa-house-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Patients</span>
                <span class="info-box-number"><?= $data['total_patients'] ?></span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-light"><i class="fas  fa-clipboard-list"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Medical Records</span>
                <span class="info-box-number"><?= $data['total_medical_records'] ?></span>
              </div>
            </div>
          </div>  
          <div class="col-md-4 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-light"><i class="fas  fa-file-prescription"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Medical Prescriptions</span>
                <span class="info-box-number"><?= $data['total_medical_prescriptions'] ?></span>
              </div>
            </div>
          </div>
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->

    </div>
    <!-- /.content -->
    
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script type="text/javascript">
  function app() {
    return {

    }
  }
</script>


<?= $this->endSection() ?>