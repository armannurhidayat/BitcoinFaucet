    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Alert -->
      <?php if ($this->session->flashdata('add')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>PTC Sites</strong> Added successfully.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif ?>

      <?php if ($this->session->flashdata('update')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>PTC Sites</strong> Update successfully.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif ?>

      <?php if ($this->session->flashdata('delete')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>PTC Sites</strong> Delete successfully.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif ?>
      <!-- /.Alert -->

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <span class="m-0 font-weight-bold text-primary h3">PTC Sites</span>
            <a href="<?= base_url('administrator/other-list/ptc/add') ?>" class="btn btn-success btn-icon-split btn-sm float-right">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Add Data</span>
            </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Status</th>
                  <th>Name</th>
                  <th>Coin</th>
                  <th>Payment</th>
                  <th>Type</th>
                  <th>Withdrawal</th>
                  <th>Link</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                  <?php
                  $no = 1; foreach ($ptc as $value) { ?>
                  <tr>
                    <td align="center"><?= $no++.'.' ?></td>
                    <td><?= ucfirst($value['status']) ?></td>
                    <td><?= ucfirst($value['nama']) ?></td>
                    <td><?= strtoupper($value['code_coin']) ?></td>
                    <td><?= ucfirst($value['payment']) ?></td>
                    <td><?= $value['type'] ?></td>
                    <td><?= $value['withdrawal'] . ' BTC' ?></td>
                    <td align="center">
                      <a href="<?= $value['link'] ?>" target="_blank">
                        <button class="btn btn-success btn-sm">Claim</button>
                      </a>
                    </td>
                    <td align="center">
                      <a href="<?= base_url('administrator/other-list/ptc/update/' . $value['id_ptc']) ?>">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-cogs"></i></button>
                      </a>
                      <a href="<?= base_url('administrator/other-list/ptc/delete/' . $value['id_ptc']) ?>">
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this data?')"><i class="fa fa-trash"></i></button>
                      </a>
                    </td>
                  </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->