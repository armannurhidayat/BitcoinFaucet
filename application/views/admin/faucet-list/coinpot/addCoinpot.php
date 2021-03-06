<div class="container-fluid">
  <div class="card shadow">
    <div class="card-header">
      <a href="<?= base_url('administrator/faucet-list/coinpot') ?>">
        <button class="btn btn-warning btn-sm float-left"><i class="fa fa-chevron-left"></i> Back</button>
      </a>
      <h6 class="m-0 mt-2 font-weight-bold text-primary text-right">Add Faucet</h6>
    </div>
    
    <div class="card-body">
      <form method="POST" action="<?= base_url('administrator/faucet-list/coinpot/add') ?>">
        <div class="row">
          <div class="col-md-5 ml-5">
            <div class="form-group">
              <label for="nama">Faucet Name *</label>
              <input type="hidden" id="id_coinpot" name="id_coinpot" value="<?= $uuid ?>">
              <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>" autofocus="">
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
            <div class="form-group">
              <label for="coin">Coin Name *</label>
              <select name="id_coin" id="id_coin" class="form-control">
                <option value="">- Select -</option>
                <?php foreach ($coins as $coin): ?>
                  <option value="<?= $coin['id'] ?>" <?= set_select('id_coin', $coin['id']) ?> ><?= strtoupper($coin['code_coin']) ?></option>
                <?php endforeach; ?>
              </select>
              <small class="text-danger"><?= form_error('id_coin') ?></small>
            </div>
            <div class="form-group">
              <label for="timer">Timer Minutes *</label>
              <input type="number" class="form-control" id="timer" name="timer" max="99" placeholder="1 minutes" value="<?= set_value('timer') ?>">
              <small class="text-danger"><?= form_error('timer') ?></small>
            </div>
            <div class="form-group">
              <label for="link">Link *</label>
              <textarea class="form-control" name="link" id="link" style="min-height: 100px;" placeholder="https://link-faucet.com"><?= set_value('link') ?></textarea>
              <small class="text-danger"><?= form_error('link') ?></small>
            </div>
          </div>

          <div class="col-md-5">
            <div class="form-group">
              <label for="payment">Payment *</label>
              <input type="text" class="form-control" id="payment" name="payment" value="CoinPot" readonly="">
            </div>
            <div class="form-group">
              <label for="status">Status *</label>
              <select name="status" id="status" class="form-control">
                <option value="">- Select -</option>
                <option value="legit" <?= set_select('status', 'legit') ?> >Legit</option>
                <option value="testing" <?= set_select('status', 'testing') ?> >Testing</option>
              </select>
              <small class="text-danger"><?= form_error('status') ?></small>
            </div>
            <div class="form-group">
              <label for="withdrawal">Withdrawal *</label>
              <input type="number" class="form-control" id="withdrawal" name="withdrawal" placeholder="0.00025000 BTC" value="<?= set_value('withdrawal') ?>">
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