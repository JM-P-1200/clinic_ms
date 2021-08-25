<?= $this->extend('main') ?>
    
<?= $this->section('content') ?>
            <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
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
          <?php if(session('role') == 2) : ?>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Change Apartment Fee</h5>
                <p class="card-text">
                  Updated rental fee will only take effect on new records.
                </p>
                  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#updateFeeModal">
                    Change Fee
                  </button>
              </div>
            </div>
          </div>
          <?php endif ?>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Change User Password</h5>
                <p class="card-text">
                  Change your current password
                </p>
                  <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#updatePasswordModal">
                    Change Password
                  </button>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Export Database</h5>
                <p class="card-text">
                  Backup current state of data. <br> FOLDER: \backups
                </p>
                  <a href="<?= base_url(); ?>/export/database" class="btn btn-secondary">
                    Export
                  </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

  <div class="modal fade" data-backdrop="static" id="updateFeeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Rental Fee</h5>
        <button type="button" class="close" @click.prevent="close('updateFeeModal', 'update-rental-fee-form')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <form id="update-rental-fee-form" method="post" enctype="multipart/form-data">
          <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
          <input type="hidden" name="_method" value="PUT" />
          <p>Current Fee: <b><span x-text="data.fee"></span></b></p>
          <div class="form-group row">
            <div class="col-12">
              <input type="number" name="fee" class="form-control" placeholder="Enter New Rental Fee" x-value="data.fee" x-on:keydown="deleteError('fee')">
              <template x-if="hasError('fee')">
                <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.fee"></span>
              </template>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn" @click.prevent="close('updateFeeModal', 'update-rental-fee-form')">Close</button>
        <button type="button" class="btn btn-primary" @click.prevent="updateRentalFee()">Update Rental Fee</button>
      </div>
    </div>
    </div>
  </div>

  <div class="modal fade" data-backdrop="static" id="updatePasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Password</h5>
        <button type="button" class="close" @click.prevent="close('updatePasswordModal', 'update-password-form')" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="update-password-form" method="post" enctype="multipart/form-data">
              <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
              <input type="hidden" name="_method" value="PUT" />
              <div class="form-group row">
                <div class="col-12">
                  <label>Old Password</label>
                  <input type="password" name="old_password" class="form-control" placeholder="Enter Old Password"  x-on:keydown="deleteError('old_password')">
                  <template x-if="hasError('old_password')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.old_password"></span>
                  </template>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12">
                  <label>New Password</label>
                  <input type="password" name="new_password" class="form-control" placeholder="Enter New Password" x-value="data.new_password" x-on:keydown="deleteError('new_password')">
                  <template x-if="hasError('new_password')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.new_password"></span>
                  </template>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12">
                  <label>Confirm New Password</label>
                  <input type="password" name="confirm_new_password" class="form-control" placeholder="Confirm New Password" x-value="data.confirm_new_password" x-on:keydown="deleteError('confirm_new_password')">
                  <template x-if="hasError('confirm_new_password')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.confirm_new_password"></span>
                  </template>
                </div>
              </div>
            </form>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn" @click.prevent="close('updatePasswordModal', 'update-password-form')">Close</button>
        <button type="button" class="btn btn-primary" @click.prevent="changePassword()">Update Password</button>
      </div>
    </div>
    </div>
  </div>


    
<?= $this->endSection() ?>

<?= $this->section('script') ?>

  <script type="text/javascript">
    function app() {
      return {
        data: {
          errors: {},
          fee: <?= $settings['rental_fee']; ?>,
        },
        updateRentalFee() {
          const form = new FormData(document.querySelector('#update-rental-fee-form'));

          Swal.fire({
            background: 'transparent',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
          });
          axios.post('<?= base_url(); ?>/api/settings/rentalfee', form)
          .then(res => {
          $('#updateFeeModal').modal('hide');
            this.data.fee = form.get('fee');
            Swal.fire({
              title: 'Successfully Updated Rental Fee',
              icon: 'success',
              toast: true,
              timer: 2750,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
              },
              position: 'top-right',
              showConfirmButton: false
              });
          }).catch(err => {
              this.data.errors = err.response.data.messages.errors;
              Swal.fire({
                title: 'Data Update Failed',
                html: 'Please check <span class="text-danger"><b>errors</b></span> and try again.',
                icon: 'error',
                confirmButtonText: 'Okay'
              });
          })
        },
        changePassword() {
          const form = new FormData(document.querySelector('#update-password-form'));

          Swal.fire({
            background: 'transparent',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
          });
          axios.post('<?= base_url(); ?>/api/settings/password', form)
          .then(res => {
          $('#updatePasswordModal').modal('hide');
            Swal.fire({
              title: 'Successfully Changed Password',
              icon: 'success',
              toast: true,
              timer: 2750,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
              },
              position: 'top-right',
              showConfirmButton: false
              });
          }).catch(err => {
              this.data.errors = err.response.data.messages.errors;
              Swal.fire({
                title: 'Data Update Failed',
                html: 'Please check <span class="text-danger"><b>errors</b></span> and try again.',
                icon: 'error',
                confirmButtonText: 'Okay'
              });
          })
        },
        hasError(field) {
          return (field in this.data.errors) ? true : false;
        },
        deleteError(field) {
          delete this.data.errors[field];
        },
        close(modal, form) {
          $(`#${modal}`).modal('hide');
          document.querySelector(`#${form}`).reset();
          this.data.errors = {};
        }


      };
    }
  </script>


<?= $this->endSection() ?>