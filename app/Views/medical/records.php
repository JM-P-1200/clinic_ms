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
              <li class="breadcrumb-item active">Medical Records</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6 order-sm-1">
            <h1 class="m-0 mb-1">Medical Records</h1>
            <p>Manage different medical records</p>
            <button class="btn btn-secondary  my-1" @click="initAddMedicalRecord()">Add Record</button>
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
                        <th>Patient ID</th>
                        <th>Full Name <br><span class="text-xs text-black-50"><i>LAST, FIRST, MIDDLE</i></span></th>
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

    <!-- ADD MEDICAL RECORD INFORMATION -->
    <div class="modal fade" id="add-medical-record-modal" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h4 class="modal-title">Add Medical Record Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="close()">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="add-medical-record-form" method="post">
              <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
                <div class="form-row">
                  <div class="form-group col-12">
                    <label>Patient <span class="text-xs text-danger">*</span>
                      <span class="text-xs text-black-50">[ID] - FULL NAME (GENDER, AGE) CONTACT #</span>
                    </label>
                      <select class="form-control" name="patient_id" x-on:change="deleteError('patient_id')">
                        <option value="" selected></option>
                        <template x-for="p in data.patients">
                          <option :value="p.patient_id">[P-0<span x-text="p.patient_id"></span>] - <span x-text="p.full_name"></span> (<span x-text="p.gender"></span>, <span x-text="p.age"></span>) <span x-text="p.contact_number"></span></option>
                        </template>
                      </select>
                      <template x-if="hasError('patient_id')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.patient_id"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="complaints">Complaint/s <span class="text-xs text-danger">*</span></label>
                      <textarea type="text" class="form-control" name="complaints" x-on:keydown="deleteError('complaints')" rows="4"></textarea>
                      <template x-if="hasError('complaints')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.complaints"></span>
                      </template>
                    </div>
                  </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <input type="checkbox" name="body_parts[]" value="1">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/1.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="2">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/2.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="3">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/3.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="4">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/4.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="5">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/5.png" width="100"></label>
                    <br>
                    <input type="checkbox" name="body_parts[]" value="6">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/6.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="7">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/7.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="8">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/8.png" width="100"></label>
                    <br>
                    <input type="checkbox" name="body_parts[]" value="9">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/9.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="10">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/10.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="11">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/11.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="12">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/12.png" width="100"></label>  
                    <input type="checkbox" name="body_parts[]" value="13">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/13.png" width="100"></label>                              
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="diagnosis">Diagnosis <span class="text-xs text-danger">*</span></label>
                      <textarea type="text" class="form-control" name="diagnosis" x-on:keydown="deleteError('diagnosis')" rows="4"></textarea>
                      <template x-if="hasError('diagnosis')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.diagnosis"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="recommendations">Recommendation/s <span class="text-xs text-danger">*</span></label>
                      <textarea type="text" class="form-control" name="recommendations" x-on:keydown="deleteError('recommendations')" rows="4"></textarea>
                      <template x-if="hasError('recommendations')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.recommendations"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="status">Status <span class="text-xs text-danger">*</span></label>
                      <select class="form-control" name="status" x-on:change="deleteError('status')">
                        <option value="1" selected>ONGOING</option>
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
            <button type="button" class="btn btn-primary" @click.prevent="addMedicalRecord()">Add Medical Record</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
              <!-- /.modal-dialog -->
    </div>

    <!-- UPDATE MEDICAL RECORD INFORMATION ================================================================ -->
    <div class="modal fade" id="update-medical-record-modal" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h4 class="modal-title">Medical Record ID [M-0<span x-text="data.medical_record.medical_record_id"></span>]</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="close()">
              <span aria-hidden="true">×</span>
            </button>
          </div> 
          <div class="modal-body">
            <form id="update-medical-record-form" method="post">
              <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
              <input type="hidden" name="_method" value="PUT" />
              <input type="hidden" name="patient_id" x-model="data.medical_record.patient_id" />
                <div class="form-row">
                  <div class="form-group col-12">
                    <label>Patient <span class="text-xs text-danger">*</span>
                      <span class="text-xs text-black-50">FULL NAME</span>
                    </label>
                      <h2 x-text="data.medical_record.full_name"></h2>
                      <template x-if="hasError('patient_id')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.patient_id"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="complaints">Complaint/s <span class="text-xs text-danger">*</span></label>
                      <textarea type="text" x-model="data.medical_record.complaints" class="form-control" name="complaints" x-on:keydown="deleteError('complaints')" rows="4"></textarea>
                      <template x-if="hasError('complaints')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.complaints"></span>
                      </template>
                    </div>
                  </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <input type="checkbox" name="body_parts[]" value="1"  class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/1.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="2"  class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/2.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="3" class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/3.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="4"  class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/4.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="5"  class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/5.png" width="100"></label>
                    <br>
                    <input type="checkbox" name="body_parts[]" value="6" class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/6.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="7" class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/7.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="8" class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/8.png" width="100"></label>
                    <br>
                    <input type="checkbox" name="body_parts[]" value="9" class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/9.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="10" class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/10.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="11" class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/11.png" width="100"></label>
                    <input type="checkbox" name="body_parts[]" value="12" class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/12.png" width="100"></label>  
                    <input type="checkbox" name="body_parts[]" value="13" class="update-check">
                    <label><img src="<?= base_url() ?>/public/assets/body_parts/13.png" width="100"></label>                              
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="diagnosis">Diagnosis <span class="text-xs text-danger">*</span></label>
                      <textarea type="text" class="form-control" name="diagnosis" x-on:keydown="deleteError('diagnosis')" rows="4" x-model="data.medical_record.diagnosis"></textarea>
                      <template x-if="hasError('diagnosis')">
                        <span class="text-xs text-danger font-italic font-weight-bold"  x-model="data.medical_record.diagnosis" x-text="data.errors.diagnosis"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="recommendations">Recommendation/s <span class="text-xs text-danger">*</span></label>
                      <textarea type="text" class="form-control" name="recommendations" x-on:keydown="deleteError('recommendations')" rows="4" x-model="data.medical_record.recommendations"></textarea>
                      <template x-if="hasError('recommendations')">
                        <span class="text-xs text-danger font-italic font-weight-bold"   x-text="data.errors.recommendations"></span>
                      </template>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="status">Status <span class="text-xs text-danger">*</span></label>
                      <select class="form-control" name="status" x-model="data.medical_record.status" x-on:change="deleteError('status')">
                        <option value="1" selected>ONGOING</option>
                        <option value="2">DONE</option>
                      </select>
                      <template x-if="hasError('status')">
                        <span class="text-xs text-danger font-italic font-weight-bold"   x-text="data.errors.status"></span>
                      </template>
                  </div>
                </div>
            </form>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal" @click.prevent="deleteMedicalRecord()">Delete</button>
            <div>
            <button type="button" class="btn btn-default mr-1" data-dismiss="modal" @click.prevent="close()">Cancel</button>
            <button type="button" class="btn btn-primary" @click.prevent="updateMedicalRecord()">Save Medical Record</button>
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
          patients: [],
          medical_record: {},
        },
        getMedicalRecord(medical_record_id, callback) {
          this.data.medical_record = {};
          axios.get('<?= base_url(); ?>/api/medical/record/' + medical_record_id)
          .then(res => {
            this.data.medical_record = res.data.data;
            if(callback instanceof Function) {
              callback();
            }
          })
          .catch(err => alert(err))
        },
        getPatients(callback) {
          this.data.patients = [];
          axios.get('<?= base_url(); ?>/api/patients/registered/consulting')
          .then(res => {
            this.data.patients = res.data.data;
            if(callback instanceof Function) {
              callback();
            }
          })
          .catch(err => alert(err))
        },
        initAddMedicalRecord() {
          this.getPatients(() => $('#add-medical-record-modal').modal('show'));
        },
        addMedicalRecord() {
          Swal.fire({
            background: 'transparent',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
          });
          const data = new FormData(document.querySelector('#add-medical-record-form'));
          axios.post('<?= base_url(); ?>/api/medical/record', data)
          .then(res => {
            console.log(res.data);
            table.ajax.reload();
            Swal.fire({
              title: 'Successfully Added New Medical Record',
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
            this.close('add-medical-record-modal');
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
        initUpdateMedicalRecord(medical_record_id) {
          this.getMedicalRecord(medical_record_id, () => {
            let cbs = document.querySelectorAll('.update-check');
            console.log(cbs);
            cbs.forEach(e => {
              if(this.data.medical_record.body_parts.includes(e.value)) {
                e.checked = true;
              } else {
                e.checked = false;
              }
            })
            $('#update-medical-record-modal').modal('show');
          });
        },
        updateMedicalRecord() {
          Swal.fire({
            background: 'transparent',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
          });
          const data = new FormData(document.querySelector('#update-medical-record-form'));
          axios.post('<?= base_url(); ?>/api/medical/record/' + this.data.medical_record.medical_record_id, data)
          .then(res => {
            console.log(res.data);
            table.ajax.reload();
            Swal.fire({
              title: 'Successfully Updated Medical Record Information',
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
            this.close('update-medical-record-modal');
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
        deleteMedicalRecord() {
          Swal.fire({
            title: 'Delete this record?',
            html: "Deleting this medical record will permanently remove all of its data <br>",
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
              axios.delete('<?= base_url(); ?>/api/medical/record/' + this.data.medical_record.medical_record_id)
              .then(res => {
                table.ajax.reload();
                Swal.fire(
                  'Deleted!',
                  `Medical Record deleted`,
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
          document.querySelector('#add-medical-record-form').reset();
          this.data.errors = {};
        }


      }
    }

    const medical_record_status = {
      1: '<span class="badge badge-primary text-xs">ONGOING</span>',
      2: '<span class="badge badge-dark text-xs">DONE</span>',
    };

    let table = $('#room-type-table').DataTable({
                              ajax: {
                                url: '<?= base_url(); ?>/api/medical/record',
                                dataSrc: 'data'
                              },
                              responsive: true,
                              order: [[0, 'desc']],
                              columns: [
                                {data: "medical_record_id", render: function(data, type, row, meta) {
                                  return type === 'display' ? `MR-0${data}` : data;
                                }},
                                {data: "patient_id", render: function(data, type, row, meta) {
                                  return type === 'display' ? `P-0${data}` : data;
                                }},
                                {data: "full_name"},
                                {data: "status", render: function(data, type, row, meta) {
                                  return type === 'display' ? medical_record_status[data] : data;
                                }},
                                {data: "created_at"},
                                {data: "updated_at"},
                                {data: "medical_record_id", render: function(data, type, row, meta) {
                                  return type === 'display' ? `<div class="dropdown">
                                  <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                                  <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                    <button data-toggle="modal" class="dropdown-item" @click.prevent="initUpdateMedicalRecord(${data})">Update
                                    </button>
                                    <a href="<?= base_url() ?>/medical/records/${data}/prescriptions" class="dropdown-item">Prescriptions
                                    </a>
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