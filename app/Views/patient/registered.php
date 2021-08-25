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
              <li class="breadcrumb-item active">Registered Patients</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6 order-sm-1">
            <h1 class="m-0 mb-1">Registered Patients</h1>
            <p>Manage registered patients' information</p>
            <button class="btn btn-secondary  my-1" data-toggle="modal" data-target="#add-patient-modal" data-backdrop="static">Add Patient</button>
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
                        <th>Full Name <br><span class="text-xs text-black-50"><i>LAST, FIRST, MIDDLE</i></span></th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Status</th>
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

    <!-- ADD PATIENT INFORMATION -->
    <div class="modal fade" id="add-patient-modal" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h4 class="modal-title">Add Patient Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="close()">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="add-patient-form" method="post">
              <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="first_name">First Name <span class="text-xs text-danger">*</span></label>
                    <input type="text" name="first_name" class="form-control" x-on:keydown="deleteError('first_name')">
                    <template x-if="hasError('first_name')">
                      <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.first_name"></span>
                    </template>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="last_name">Last Name <span class="text-xs text-danger">*</span></label>
                    <input type="text" name="last_name" class="form-control" x-on:keydown="deleteError('last_name')">
                    <template x-if="hasError('last_name')">
                      <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.last_name"></span>
                    </template>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="middle_name" >Middle Name</label>
                    <input type="text" name="middle_name" class="form-control">
                  </div>
                  <div class="form-group col-md-1">
                    <label for="suffix" >Suffix</label>
                    <input type="text" name="suffix" class="form-control">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Gender <span class="text-xs text-danger">*</span></label>
                      <select class="form-control" name="gender" x-on:change="deleteError('gender')">
                        <option value="" selected></option>
                        <option value="M">MALE</option>
                        <option value="F">FEMALE</option>
                      </select>
                      <template x-if="hasError('gender')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.gender"></span>
                      </template>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="age">Age <span class="text-xs text-danger">*</span></label>
                      <input type="number" class="form-control" name="age" x-on:keydown="deleteError('age')">
                      <template x-if="hasError('age')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.age"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="contact_number">Contact Number <span class="text-xs text-danger">*</span></label>
                      <input type="text" class="form-control" name="contact_number" x-on:keydown="deleteError('contact_number')">
                      <template x-if="hasError('contact_number')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.contact_number"></span>
                      </template>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="occupation">Occupation</label>
                      <input type="text" class="form-control" name="occupation" x-on:keydown="deleteError('occupation')">
                      <template x-if="hasError('occupation')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.occupation"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="address">Address <span class="text-xs text-danger">*</span></label>
                      <textarea type="text" class="form-control" name="address" x-on:keydown="deleteError('address')" rows="4"></textarea>
                      <template x-if="hasError('address')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.address"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="status">Status <span class="text-xs text-danger">*</span></label>
                      <select class="form-control" name="status" x-on:change="deleteError('status')">
                        <option value="1" selected>CONSULTING</option>
                        <option value="2">REGISTERED</option>
                      </select>
                      <template x-if="hasError('status')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.status"></span>
                      </template>
                  </div>
                </div>
            </form>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal" @click.prevent="close()">Cancel</button>
            <button type="button" class="btn btn-primary" @click.prevent="addPatient()">Add Patient</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
              <!-- /.modal-dialog -->
    </div>

    <!-- UPDATE PATIENT INFORMATION ================================================================ -->
    <div class="modal fade" id="update-patient-modal" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h4 class="modal-title">Patient ID [P-0<span x-text="data.patient.patient_id"></span>]</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="close()">
              <span aria-hidden="true">×</span>
            </button>
          </div> 
          <div class="modal-body">
            <form id="update-patient-form" method="post" enctype="multipart/form-data">
              <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
              <input type="hidden" name="_method" value="PUT" />
              <input type="hidden" name="patient_id" x-model="data.patient.patient_id" />
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="first_name">First Name <span class="text-xs text-danger">*</span></label>
                    <input type="text" name="first_name" class="form-control"  x-model="data.patient.first_name" x-on:keydown="deleteError('first_name')">
                    <template x-if="hasError('first_name')">
                      <span class="text-xs text-danger font-italic font-weight-bold" x-text="data.errors.first_name"></span>
                    </template>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="last_name">Last Name <span class="text-xs text-danger">*</span></label>
                    <input type="text" name="last_name" class="form-control" x-model="data.patient.last_name" x-on:keydown="deleteError('last_name')">
                    <template x-if="hasError('last_name')">
                      <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.last_name"></span>
                    </template>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="middle_name" >Middle Name</label>
                    <input type="text" name="middle_name" x-model="data.patient.middle_name"class="form-control">
                  </div>
                  <div class="form-group col-md-1">
                    <label for="suffix" >Suffix</label>
                    <input type="text" name="suffix" x-model="data.patient.suffix" class="form-control">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Gender <span class="text-xs text-danger">*</span></label>
                      <select class="form-control" name="gender" x-on:change="deleteError('gender')"  x-model="data.patient.gender">
                        <option value="M">MALE</option>
                        <option value="F">FEMALE</option>
                      </select>
                      <template x-if="hasError('gender')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.gender"></span>
                      </template>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="age">Age <span class="text-xs text-danger">*</span></label>
                      <input type="number" class="form-control" name="age"  x-model="data.patient.age" x-on:keydown="deleteError('age')">
                      <template x-if="hasError('age')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.age"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="contact_number">Contact Number <span class="text-xs text-danger">*</span></label>
                      <input type="text" class="form-control" name="contact_number" x-on:keydown="deleteError('contact_number')"  x-model="data.patient.contact_number">
                      <template x-if="hasError('contact_number')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.contact_number"></span>
                      </template>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="occupation">Occupation</label>
                      <input type="text" class="form-control"  x-model="data.patient.occupation" name="occupation" x-on:keydown="deleteError('occupation')">
                      <template x-if="hasError('occupation')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.occupation"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="address">Address <span class="text-xs text-danger">*</span></label>
                      <textarea type="text" class="form-control"  x-model="data.patient.address" name="address" x-on:keydown="deleteError('address')" rows="4"></textarea>
                      <template x-if="hasError('address')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.address"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="status">Status <span class="text-xs text-danger">*</span></label>
                      <select class="form-control" name="status"  x-model="data.patient.status" x-on:change="deleteError('status')">
                        <option value="1">CONSULTING</option>
                        <option value="2">REGISTERED</option>
                      </select>
                      <template x-if="hasError('status')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.status"></span>
                      </template>
                  </div>
                </div>
            </form>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal" @click.prevent="deletePatient()">Delete</button>
            <div>
            <button type="button" class="btn btn-default mr-1" data-dismiss="modal" @click.prevent="close()">Cancel</button>
            <button type="button" class="btn btn-primary" @click.prevent="updatePatient()">Save Patient Information</button>
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
          patient: {},
        },
        getPatientInformation(patient_ID, callback) {
          this.data.patient = {};
          axios.get('<?= base_url(); ?>/api/patients/registered/' + patient_ID)
          .then(res => {
            this.data.patient = res.data.data;
            if(callback instanceof Function) {
              callback();
            }
          })
          .catch(err => alert(err))
        },
        addPatient() {
          Swal.fire({
            background: 'transparent',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
          });
          const data = new FormData(document.querySelector('#add-patient-form'));
          axios.post('<?= base_url(); ?>/api/patients/registered', data)
          .then(res => {
            console.log(res.data);
            table.ajax.reload();
            Swal.fire({
              title: 'Successfully Added New Patient Information',
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
            this.close('add-patient-modal');
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
        initUpdatePatient(patient_ID) {
          this.getPatientInformation(patient_ID, () => {
            $('#update-patient-modal').modal('show');
          });
        },
        updatePatient() {
          Swal.fire({
            background: 'transparent',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
          });
          const data = new FormData(document.querySelector('#update-patient-form'));
          axios.post('<?= base_url(); ?>/api/patients/registered/' + this.data.patient.patient_id, data)
          .then(res => {
            console.log(res.data);
            table.ajax.reload();
            Swal.fire({
              title: 'Successfully Updated Patient Information',
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
            this.close('update-patient-modal');
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
        deletePatient() {
          Swal.fire({
            title: 'Delete ' + this.data.patient.full_name  + '?',
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
              axios.delete('<?= base_url(); ?>/api/patients/registered/' + this.data.patient.patient_id)
              .then(res => {
                table.ajax.reload();
                Swal.fire(
                  'Deleted!',
                  `${this.data.patient.full_name}'s data has been deleted and its associated data has been removed.`,
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
          document.querySelector('#add-patient-form').reset();
          this.data.errors = {};
        }


      }
    }

    const patient_status = {
      1: '<span class="badge badge-primary text-xs">CONSULTING</span>',
      2: '<span class="badge badge-dark text-xs">REGISTERED</span>',
    };

    let table = $('#room-type-table').DataTable({
                              ajax: {
                                url: '<?= base_url(); ?>/api/patients/registered',
                                dataSrc: 'data'
                              },
                              responsive: true,
                              order: [[0, 'desc']],
                              columns: [
                                {data: "patient_id", render: function(data, type, row, meta) {
                                  return type === 'display' ? `P-0${data}` : data;
                                }},
                                {data: "full_name"},
                                {data: "gender"},
                                {data: "age"},
                                {data: "status", render: function(data, type, row, meta) {
                                  return type === 'display' ? patient_status[data] : data;
                                }},
                                {data: "created_at"},
                                {data: "updated_at"},
                                {data: "patient_id", render: function(data, type, row, meta) {
                                  return type === 'display' ? `<div class="dropdown">
                                  <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                                  <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                    <button data-toggle="modal" class="dropdown-item" @click.prevent="initUpdatePatient(${data})">Update
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