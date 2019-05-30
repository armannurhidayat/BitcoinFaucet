  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Alert -->
    <?php if ($this->session->flashdata('add')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Coin Faucet</strong> Added successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif ?>

    <?php if ($this->session->flashdata('update')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Coin Faucet</strong> Update successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif ?>

    <?php if ($this->session->flashdata('delete')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Coin Faucet</strong> Delete successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif ?>
    <!-- /.Alert -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <span class="m-0 font-weight-bold text-primary h3">Coin List</span>
          <a href="<?= base_url('administrator/coin_list/update')  ?>" class="btn btn-success btn-icon-split btn-sm float-right">
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
                <th>Name Coin</th>
                <th>Code Coin</th>
                <th>Logo Coin</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($coins as $coin) { ?>
                <tr>
                  <td><?= $no++ . '.' ?></td>
                  <td><?= ucwords($coin['nama_coin']) ?></td>
                  <td><?= strtoupper($coin['code_coin']) ?></td>
                  <td><?= $coin['logo_coin'] ?></td>
                  <td align="center">
                    <a href="<?= base_url('administrator/coin_list/update/' . $coin['id']) ?>">
                      <button class="btn btn-primary btn-sm"><i class="fa fa-cogs"></i></button>
                    </a>
                    <a href="<?= base_url('administrator/coin_list/delete/' . $coin['id']) ?>">
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