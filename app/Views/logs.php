<?= $this->extend('/main') ?>

<?= $this->section('css') ?>
  <link rel="stylesheet" href="<?= base_url();?>/public/assets/dist/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url();?>/public/assets/dist/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url();?>/public/assets/dist/css/responsive.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 order-sm-2 ">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">User Logs</li>
            </ol>
          </div><!-- /.col -->
          <div class="col-sm-6 order-sm-1">
            <h1 class="m-0 mb-1">User Logs</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <form class="card-header d-flex justify-content-between align-items-center" id="generate-history-form">
                <div class="d-flex justify-content-end align-items-center">
                  <p class="m-0 mr-3">Module</p>
                  <select class="form-control" name="module" id="module">
                    <option value="all">All</option>
                    <option value="TENANT">TENANT</option>
                    <option value="APARTMENT">APARTMENT</option>
                    <option value="CONTRACT">CONTRACT</option>
                    <option value="PAYMENT">PAYMENT</option>
                    <option value="BILL">BILL</option>
                    <option value="USER">USER</option>
                    <option value="DATABASE">DATABASE</option>
                  </select>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                  <p class="m-0 mr-3">Action</p>
                  <select class="form-control" name="action" id="action">
                    <option value="all">All</option>
                    <option value="INSERT">INSERT</option>
                    <option value="UPDATE">UPDATE</option>
                    <option value="DELETE">DELETE</option>
                    <option value="EXPORT">EXPORT</option>
                  </select>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                  <p class="m-0 mr-3">From</p>
                  <input type="date" name="from_date" class="form-control" id="from-date">
                </div>
                <div class="d-flex justify-content-end align-items-center">
                  <p class="m-0 mr-3">To</p>
                  <input type="date" name="to_date" class="form-control" id="to-date">
                </div>
                <button type="button" onclick="loadTable()" class="btn btn-primary text-xs ">Go</button>
              </form>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="logs-table" class="table table-striped table-bordered table-hover rounded w-100">
                    <thead>
                      <tr>
                        <th>Entry #</th>
                        <th>User</th>
                        <th>Module</th>
                        <th>Description</th>
                        <th>Action</th>
                        <th>Datetime</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

<?= $this->endSection() ?>

<?= $this->section('script') ?>
  <script type="text/javascript">
    function app() {
      return {}
    }

    let table =  $('#logs-table').DataTable({
          ajax: {
            url: '<?= base_url(); ?>/api/logs',
            type: 'GET',
            data: function (d) {
              return $('#generate-history-form').serialize();
            }, 
            dataSrc: 'data'
          },
          responsive: true,
          order: [[0, 'desc']],
          columns: [
            {data: "log_id"},
            {data: "full_name"},
            {data: "module"},
            {data: "description"},
            {data: "action"},
            {data: "created_at"},
          ],
          columnDefs: [
            {targets: [-3], orderable: false},
          ]

        });

    function loadTable() {
      table.ajax.reload();
    }

  </script>

<?= $this->endSection() ?>