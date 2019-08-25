<div class="container-fluid">
  <div class="card shadow">
    <div class="card-header">
      <a href="<?= base_url('administrator/other-list/ptc') ?>">
        <button class="btn btn-warning btn-sm float-left"><i class="fa fa-chevron-left"></i> Back</button>
      </a>
      <h6 class="m-0 mt-2 font-weight-bold text-primary text-right">Update Site</h6>
    </div>
    
    <div class="card-body">
      <form method="POST" action="<?= base_url('administrator/other-list/ptc/update/' . $ptc['id_ptc']) ?>">
        <div class="row">
          <div class="col-md-5 ml-5">
            <div class="form-group">
              <label for="nama">Site Name *</label>
              <input type="hidden" id="id_ptc" name="id_ptc" value="<?= $ptc['id_ptc'] ?>">
              <input type="text" class="form-control" id="nama" name="nama" autofocus="" value="<?= $ptc['nama'] ?>">
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
            <div class="form-group">
              <label for="id_coin">Coin Name *</label>
              <select name="id_coin" id="id_coin" class="form-control">
                <option value="">- Select -</option>
                <?php foreach ($coins as $coin): ?>
                  <option value="<?= $coin['id'] ?>" <?= $coin['id'] == $ptc['id_coin'] ? 'selected' : null ?> ><?= strtoupper($coin['code_coin']) ?></option>
                <?php endforeach ?>
              </select>
              <small class="text-danger"><?= form_error('id_coin') ?></small>
            </div>
            <div class="form-group">
              <label for="link">Link *</label>
              <textarea class="form-control" name="link" id="link" style="min-height: 100px;" placeholder="https://link-site.com"><?= $ptc['link'] ?></textarea>
              <small class="text-danger"><?= form_error('link') ?></small>
            </div>
          </div>

          <div class="col-md-5">
            <div class="form-group">
            <label for="payment">Payment *</label><br>
              <input type="checkbox" id="payment" class="ml-2" name="payment" value="Direct">Direct
              <input type="checkbox" id="payment" class="ml-2" name="payment" value="Coinpot">Coinpot
              <input type="checkbox" id="payment" class="ml-2" name="payment" value="FaucetHub">FaucetHub
            </div>
            <div class="form-group">
              <label for="type">Type Site *</label>
              <input type="text" class="form-control" id="type" name="type" value="<?= $ptc['payment'] ?>">
              <small class="text-danger"><?= form_error('type') ?></small>
            </div>
            <div class="form-group">
              <label for="status">Status *</label>
              <select name="status" id="status" class="form-control">
                <option value="">- Select -</option>
                <option value="legit" <?= $ptc['status'] == 'legit' ? 'selected' : null ?> >Legit</option>
                <option value="testing" <?= $ptc['status'] == 'testing' ? 'selected' : null ?> >Testing</option>
              </select>
              <small class="text-danger"><?= form_error('status') ?></small>
            </div>
            <div class="form-group">
              <label for="withdrawal">Withdrawal *</label>
              <input type="number" class="form-control" id="withdrawal" name="withdrawal" placeholder="0.00025000 BTC" value="<?= $ptc['withdrawal'] ?>">
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