<div class="container-fluid">
  <div class="card shadow">
    <div class="card-header">
      <a href="<?= base_url('administrator/faucet-list/faucethub') ?>">
        <button class="btn btn-warning btn-sm float-left"><i class="fa fa-chevron-left"></i> Back</button>
      </a>
      <h6 class="m-0 mt-2 font-weight-bold text-primary text-right">Update Faucet</h6>
    </div>
    
    <div class="card-body">
      <form method="POST" action="<?= base_url('administrator/faucet-list/faucethub/update/' . $faucethub['id_faucethub']) ?>">
        <div class="row">
          <div class="col-md-5 ml-5">
            <input type="hidden" name="id_faucethub" id="id_faucethub" value="<?= $faucethub['id_faucethub']?>">
            <div class="form-group">
              <label for="nama">Faucet Name *</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $faucethub['nama'] ?>">
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
            <div class="form-group">
              <label for="id_coin">Coin Name *</label>
              <select name="id_coin" id="id_coin" class="form-control">
                <?php foreach ($coins as $coin): ?>
                  <option value="<?= $coin['id'] ?>" <?= $coin['id'] == $faucethub['id_coin'] ? 'selected' : null ?> ><?= strtoupper($coin['code_coin']) ?></option>
                <?php endforeach; ?>
              </select>
              <small class="text-danger"><?= form_error('id_coin') ?></small>
            </div>
            <div class="form-group">
              <label for="timer">Timer Minutes *</label>
              <input type="number" class="form-control" id="timer" name="timer" placeholder="1 minutes" value="<?= $faucethub['timer'] ?>">
              <small class="text-danger"><?= form_error('timer') ?></small>
            </div>
            <div class="form-group">
              <label for="link">Link *</label>
              <textarea class="form-control" name="link" id="link" style="min-height: 100px;" placeholder="https://link-faucet.com"><?= $faucethub['link'] ?></textarea>
              <small class="text-danger"><?= form_error('link') ?></small>
            </div>
          </div>

          <div class="col-md-5">
            <div class="form-group">
              <label for="payment">Payment *</label>
              <input type="text" class="form-control" id="payment" name="payment" value="FaucetHub" readonly="">
              <small class="text-danger"><?= form_error('payment') ?></small>
            </div>
            <div class="form-group">
              <label for="status">Status *</label>
              <select name="status" id="status" class="form-control">
                <?php foreach ($status as $sts): ?>
                  <option value="<?= $sts ?>" <?= $sts == $faucethub['status'] ? 'selected' : null ?> ><?= ucfirst($sts) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="withdrawal">Withdrawal *</label>
              <input type="number" class="form-control" id="withdrawal" name="withdrawal" placeholder="0.00025000 BTC" value="<?= $faucethub['withdrawal'] ?>">
              <small class="text-danger"><?= form_error('withdrawal') ?></small>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-center">
        <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
        <button type="submit" class="btn btn-success ml-2" name="simpan"><i class="fa fa-check"></i> Save</button>
      </div>
    </div>
  </form>

  </div>
</div>