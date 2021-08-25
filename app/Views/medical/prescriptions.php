<?= $this->extend('/main') ?>
    
<?= $this->section('css') ?>
  <link rel="stylesheet" href="<?= base_url();?>/public/assets/dist/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url();?>/public/assets/dist/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url();?>/public/assets/dist/css/responsive.bootstrap4.min.css">


<?= $this->endSection() ?>

<?= $this->section('content') ?>
            <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 order-sm-2 ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Prescriptions</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6 order-sm-1">
            <h1 class="m-0 mb-1">Prescriptions</h1>
            <p>Manage medical prescriptions' information</p>
            <a href="<?= base_url() ?>/medical/records" class="btn btn-primary  my-1 mr-1">Go Back</a>
            <button class="btn btn-secondary  my-1" data-toggle="modal" data-target="#add-prescription-modal" data-backdrop="static">Add Prescription</button>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="room-type-table" class="table table-striped table-bordered table-hover rounded w-100">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Prescription</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- ADD MEDICAL PRESCRIPTION INFORMATION -->
    <div class="modal fade" id="add-prescription-modal" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h4 class="modal-title">Add Prescription Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="close()">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="add-prescription-form" method="post">
              <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
              <input type="hidden" name="medical_record_id" value="<?=$data['medical_record_id'];?>">
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="prescription">Prescription <span class="text-xs text-danger">*</span></label>
                      <textarea type="text" class="form-control" name="prescription" x-on:keydown="deleteError('prescription')" rows="4"></textarea>
                      <template x-if="hasError('prescription')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.address"></span>
                      </template>
                  </div>
                </div>
            </form>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal" @click.prevent="close()">Cancel</button>
            <button type="button" class="btn btn-primary" @click.prevent="addPrescription()">Add Prescription</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
              <!-- /.modal-dialog -->
    </div>

    <!-- UPDATE MEDICAL PRESCRIPTION INFORMATION ================================================================ -->
    <div class="modal fade" id="update-medical-prescription-modal" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h4 class="modal-title">Prescription ID [MP-0<span x-text="data.prescription.medical_prescription_id"></span>]</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="close()">
              <span aria-hidden="true">×</span>
            </button>
          </div> 
          <div class="modal-body">
            <form id="update-medical-prescription-form" method="post" enctype="multipart/form-data">
              <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
              <input type="hidden" name="_method" value="PUT" />
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="prescription">Prescription <span class="text-xs text-danger">*</span></label>
                      <textarea type="text" class="form-control"  x-model="data.prescription.prescription" name="prescription" x-on:keydown="deleteError('prescription')" rows="4"></textarea>
                      <template x-if="hasError('prescription')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.prescription"></span>
                      </template>
                  </div>
                </div>
            </form>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal" @click.prevent="deletePrescription()">Delete</button>
            <div>
            <button type="button" class="btn btn-default mr-1" data-dismiss="modal" @click.prevent="close()">Cancel</button>
            <button type="button" class="btn btn-primary" @click.prevent="updatePrescription()">Save Prescription Information</button>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
              <!-- /.modal-dialog -->
    </div>

    
<?= $this->endSection() ?>

<?= $this->section('script') ?>
  <script type="text/javascript">

    function app() {
      return {
        data: {
          errors: {},
          prescription: {},
        },
        getPrescriptionInformation(medical_prescription_id, callback) {
          this.data.prescription = {};
          axios.get('<?= base_url(); ?>/api/medical/prescription/' + medical_prescription_id)
          .then(res => {
            this.data.prescription = res.data.data;
            if(callback instanceof Function) {
              callback();
            }
          })
          .catch(err => alert(err))
        },
        addPrescription() {
          Swal.fire({
            background: 'transparent',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
          });
          const data = new FormData(document.querySelector('#add-prescription-form'));
          axios.post('<?= base_url(); ?>/api/medical/prescription', data)
          .then(res => {
            console.log(res.data);
            table.ajax.reload();
            Swal.fire({
              title: 'Successfully Added New Prescription Information',
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
            this.close('add-prescription-modal');
            })
          .catch(err => {
              Swal.fire({
                title: 'Data Insertion Failed',
                html: 'Please check <span class="text-danger"><b>errors</b></span> and try again.',
                icon: 'error',
                confirmButtonText: 'Okay'
              });
            this.data.errors = err.response.data.messages.errors;
            console.log(this.data);
          })
        },
        initUpdatePrescription(medical_prescription_id) {
          this.getPrescriptionInformation(medical_prescription_id, () => {
            $('#update-medical-prescription-modal').modal('show');
          });
        },
        updatePrescription() {
          Swal.fire({
            background: 'transparent',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
          });
          const data = new FormData(document.querySelector('#update-medical-prescription-form'));
          axios.post('<?= base_url(); ?>/api/medical/prescription/' + this.data.prescription.medical_prescription_id, data)
          .then(res => {
            console.log(res.data);
            table.ajax.reload();
            Swal.fire({
              title: 'Successfully Updated Prescription Information',
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
            this.close('update-medical-prescription-modal');
            })
          .catch(err => {
              Swal.fire({
                title: 'Data Update Failed',
                html: 'Please check <span class="text-danger"><b>errors</b></span> and try again.',
                icon: 'error',
                confirmButtonText: 'Okay'
              });
            this.data.errors = err.response.data.messages.errors;
            console.log(this.data);
          })
        },
        deletePrescription() {
          Swal.fire({
            title: 'Delete this prescription?',
            html: "Deleting this registered patient will permanently remove its records! <br>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                background: 'transparent',
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
              });
              axios.delete('<?= base_url(); ?>/api/medical/prescription/' + this.data.prescription.medical_prescription_id)
              .then(res => {
                table.ajax.reload();
                Swal.fire(
                  'Deleted!',
                  `Prescription has been deleted`,
                  'success'
                )
              })
              .catch(err => alert(err)); 
            }
          })
        },
        hasError(field) {
          return (field in this.data.errors) ? true : false;
        },
        deleteError(field) {
          delete this.data.errors[field];
        },
        clearFields() {
          this.data.errors = {};
        },
        close(modal) {
          $(`#${modal}`).modal('hide');
          document.querySelector('#add-prescription-form').reset();
          this.data.errors = {};
        }


      }
    }

    const patient_status = {
      1: '<span class="badge badge-primary text-xs">CONSULTING</span>',
      2: '<span class="badge badge-dark text-xs">REGISTERED</span>',
    };

    let medical_record_id = <?= $data['medical_record_id'] ?>;

    let table = $('#room-type-table').DataTable({
                              ajax: {
                                url: `<?= base_url(); ?>/api/medical/record/${medical_record_id}/prescriptions`,
                                dataSrc: 'data'
                              },
                              responsive: true,
                              order: [[0, 'desc']],
                              columns: [
                                {data: "medical_prescription_id", render: function(data, type, row, meta) {
                                  return type === 'display' ? `MP-0${data}` : data;
                                }},
                                {data: "prescription"},
                                {data: "created_at"},
                                {data: "updated_at"},
                                {data: "medical_prescription_id", render: function(data, type, row, meta) {
                                  return type === 'display' ? `<div class="dropdown">
                                  <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                                  <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                    <button data-toggle="modal" class="dropdown-item" @click.prevent="initUpdatePrescription(${data})">Update
                                    </button>
                                  </div>
                                </div>` : data;
                                }}
                              ],
                              columnDefs: [
                                {targets: [-1], orderable: false},
                              ]

                            });

</script>


<?= $this->endSection() ?>