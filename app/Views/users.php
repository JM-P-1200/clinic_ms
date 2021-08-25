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
              <li class="breadcrumb-item active">Registered Users</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6 order-sm-1">
            <h1 class="m-0 mb-1">Registered Users</h1>
            <p>Manage registered users' role and information</p>
            <button class="btn btn-secondary  my-1" data-toggle="modal" data-target="#add-user-modal" data-backdrop="static">Add User</button>
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
                        <th>Admin ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
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

    <!-- ADD USER INFORMATION -->
    <div class="modal fade" id="add-user-modal" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h4 class="modal-title">Add User Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="close()">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="add-user-form" method="post" enctype="multipart/form-data">
              <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
              <div class="form-group row">
                <label for="full_name" class="col-form-label col-sm-3">Full Name</label>
                <div class="col-sm-9">
                  <input type="text" name="full_name" class="form-control" placeholder="Enter User's Full Name" x-on:keydown="deleteError('full_name')">
                  <template x-if="hasError('full_name')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.full_name"></span>
                  </template>
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-form-label col-sm-3">Username</label>
                <div class="col-sm-9">
                  <input type="text" name="username" class="form-control" placeholder="Enter Username" x-on:keydown="deleteError('username')">
                  <template x-if="hasError('username')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.username"></span>
                  </template>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-form-label col-sm-3">Email</label>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" placeholder="Enter User's Full Name" x-on:keydown="deleteError('email')">
                  <template x-if="hasError('email')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.email"></span>
                  </template>
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-form-label col-sm-3">Password</label>
                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" placeholder="Enter Password" x-on:keydown="deleteError('password')">
                  <template x-if="hasError('password')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.password"></span>
                  </template>
                </div>
              </div>
              <div class="form-group row">
                <label for="confirm_password" class="col-form-label col-sm-3">Confirm Password</label>
                <div class="col-sm-9">
                  <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" x-on:keydown="deleteError('confirm_password')">
                  <template x-if="hasError('confirm_password')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.confirm_password"></span>
                  </template>
                </div>
              </div>
              <div class="form-group row">
                <label for="role" class="col-form-label col-sm-3">User Role</label>
                <div class="col-sm-9">
                  <select class="form-control" name="role" x-on:change="deleteError('role')">
                    <option value="" selected>Select a role</option>
                    <option value="1">ADMIN</option>
                    <option value="2">SUPERADMIN</option>
                  </select>
                  <template x-if="hasError('role')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.role"></span>
                  </template>
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal" @click.prevent="close()">Cancel</button>
            <button type="button" class="btn btn-primary" @click.prevent="addUser()">Add User</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
              <!-- /.modal-dialog -->
    </div>

    <!-- UPDATE USER INFORMATION ================================================================ -->
    <div class="modal fade" id="update-user-modal" aria-modal="true" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h4 class="modal-title">User ID <span x-text="data.user.admin_id"></span></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="close()">
              <span aria-hidden="true">×</span>
            </button>
          </div> 
          <div class="modal-body">
            <form id="update-user-form" method="post" enctype="multipart/form-data">
              <input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
              <input type="hidden" name="_method" value="PUT" />
              <input type="hidden" name="admin_id" x-model="data.user.admin_id" />
              <div class="form-group row">
                <label for="full_name" class="col-form-label col-sm-3">Full Name</label>
                <div class="col-sm-9">
                  <input type="text" name="full_name" class="form-control" placeholder="Enter User's Full Name" x-on:keydown="deleteError('full_name')" x-model="data.user.full_name">
                  <template x-if="hasError('full_name')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.full_name"></span>
                  </template>
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-form-label col-sm-3">Username</label>
                <div class="col-sm-9">
                  <input type="text" name="username" class="form-control" placeholder="Enter Username" x-on:keydown="deleteError('username')" x-model="data.user.username">
                  <template x-if="hasError('username')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.username"></span>
                  </template>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-form-label col-sm-3">Email</label>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" placeholder="Enter User's Full Name" x-on:keydown="deleteError('email')" x-model="data.user.email">
                  <template x-if="hasError('email')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.email"></span>
                  </template>
                </div>
              </div>
              <div class="form-group row">
                <label for="role" class="col-form-label col-sm-3">User Role</label>
                <div class="col-sm-9">
                  <select class="form-control" name="role" x-on:change="deleteError('role')" x-model="data.user.role">
                    <option value="" selected>Select a role</option>
                    <option value="1">ADMIN</option>
                    <option value="2">SUPERADMIN</option>
                  </select>
                  <template x-if="hasError('role')">
                    <span class="text-xs text-danger font-italic font-weight-bold"  x-text="data.errors.role"></span>
                  </template>
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal" @click.prevent="deleteUser()">Delete User</button>
            <div>
            <button type="button" class="btn btn-default mr-1" data-dismiss="modal" @click.prevent="close()">Cancel</button>
            <button type="button" class="btn btn-primary" @click.prevent="updateUser()">Save User Information</button>
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
          user: {},
        },
        getUserInformation(user_ID, callback) {
          this.data.user = {};
          axios.get('<?= base_url(); ?>/api/users/registered/' + user_ID)
          .then(res => {
            this.data.user = res.data.data;
            if(callback instanceof Function) {
              callback();
            }
          })
          .catch(err => alert(err))
        },
        viewRoomType(user_ID) {
          this.getUserInformation(user_ID, () => $('#view-room-type-modal').modal('show'));
          this.data.user.name += " Room";
        },
        addUser() {
          Swal.fire({
            background: 'transparent',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
          });
          const data = new FormData(document.querySelector('#add-user-form'));
          axios.post('<?= base_url(); ?>/api/users/registered', data)
          .then(res => {
            table.ajax.reload();
            Swal.fire({
              title: 'Successfully Added New User Information',
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
            this.close('add-user-modal');
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
        initUpdateUser(user_ID) {
          this.getUserInformation(user_ID, () => {
            $('#update-user-modal').modal('show');
          });
        },
        updateUser() {
          Swal.fire({
            background: 'transparent',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
          });
          const data = new FormData(document.querySelector('#update-user-form'));
          axios.post('<?= base_url(); ?>/api/users/registered/' + this.data.user.admin_id, data)
          .then(res => {
            console.log(res.data);
            table.ajax.reload();
            Swal.fire({
              title: 'Successfully Updated User Information',
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
            this.close('update-user-modal');
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
        deleteUser() {
          Swal.fire({
            title: 'Delete ' + this.data.user.full_name  + '?',
            html: "Deleting this registered user will permanently remove its own and associated data! <br>",
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
              axios.delete('<?= base_url(); ?>/api/users/registered/' + this.data.user.admin_id)
              .then(res => {
                table.ajax.reload();
                Swal.fire(
                  'Deleted!',
                  `${this.data.user.full_name}'s data has been deleted and its associated data has been removed.`,
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
          document.querySelector('#add-user-form').reset();
          this.data.errors = {};
        }


      }
    }

    const user_status = [
      '<span class="badge badge-success text-xs">ADMIN</span>',
      '<span class="badge badge-dark text-xs">SUPERADMIN</span>',
    ];

    let table = $('#room-type-table').DataTable({
                              ajax: {
                                url: '<?= base_url(); ?>/api/users/registered',
                                dataSrc: 'data'
                              },
                              responsive: true,
                              order: [[6, 'desc']],
                              columns: [
                                {data: "admin_id"},
                                {data: "full_name"},
                                {data: "username"},
                                {data: "email"},
                                {data: "role", render: function(data, type, row, meta) {
                                  return type === 'display' ? user_status[data - 1] : data;
                                }},
                                {data: "created_at"},
                                {data: "updated_at"},
                                {data: "admin_id", render: function(data, type, row, meta) {
                                  return type === 'display' ? `<div class="dropdown">
                                  <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i></button>
                                  <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                    <button data-toggle="modal" class="dropdown-item" @click.prevent="initUpdateUser(${data})">Update
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