<!-- DataTales Example -->
<div class="container">
  <div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
      <span class="m-0 font-weight-bold text-primary h3"><?= $judul ?></span>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Status</th>
              <th>Faucet Name</th>
              <th>Coin Name</th>
              <th>Payment</th>
              <th>Timer</th>
              <th>Withdrawal</th>
              <th>Link</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($coinpot as $value) : ?>
            <tr>
              <td><?= ucfirst($value['status']) ?></td>
              <td><?= ucfirst($value['nama']) ?></td>
              <td><?= strtoupper($value['code_coin']) ?></td>
              <td><?= ucfirst($value['payment']) ?></td>
              <td><?= $value['timer'] . ' Minutes' ?></td>
              <td><?= $value['withdrawal'] . ' BTC' ?></td>
              <td align="center">
                <a href="<?= $value['link'] ?>" target="_blank">
                  <button class="btn btn-success btn-sm">Claim</button>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
