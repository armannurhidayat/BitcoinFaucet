<div class="container-fluid">
	<div class="card shadow">
    <div class="card-header">
      <a href="<?= base_url('faucet-list/direct') ?>">
	    	<button class="btn btn-warning btn-sm float-left"><i class="fa fa-chevron-left"></i> Back</button>
    	</a>
      <h6 class="m-0 mt-2 font-weight-bold text-primary text-right">Update Faucet</h6>
    </div>
    
    <div class="card-body">
      <form method="POST" action="<?= base_url('faucet-list/direct/update') ?>">
      	<div class="row">
      		<div class="col-md-5 ml-5">
      			<input type="hidden" name="id_direct" id="id_direct" value="<?= $direct['id_direct']?>">
      			<div class="form-group">
					    <label for="nama">Faucet Name *</label>
					    <input type="text" class="form-control" id="nama" name="nama" required="" value="<?= $direct['nama'] ?>">
					  </div>
          	<div class="form-group">
					    <label for="id_coin">Coin Name *</label>
					    <select name="id_coin" id="id_coin" class="form-control" required="">
					    	<?php foreach ($coins as $coin): ?>
					    		<?php if ($coin == $direct['id_coin']): ?>
					    			<option value="<?= $coin ?>" selected><?= $coin ?></option>
					    			<?php else: ?>
					    			<option value="<?= $coin['id'] ?>"><?= strtoupper($coin['code_coin']) ?></option>
					    			<?php endif ?>
					    	<?php endforeach ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="timer">Timer Minutes *</label>
					    <input type="number" class="form-control" id="timer" name="timer" max="99" required="" placeholder="1 minutes" value="<?= $direct['timer'] ?>">
					  </div>
					  <div class="form-group">
					  	<label for="link">Link *</label>
					  	<textarea class="form-control" name="link" id="link" style="min-height: 100px;" placeholder="https://link-faucet.com"><?= $direct['link'] ?></textarea>
					  </div>
				  </div>

				  <div class="col-md-5">
				  	<div class="form-group">
					  <label for="payment">Payment *</label>
					    <input type="text" class="form-control" id="payment" name="payment" value="Direct" readonly="">
					  </div>
				  	<div class="form-group">
					    <label for="status">Status *</label>
					    <select name="status" id="status" class="form-control" required="">
					    	<?php foreach ($status as $sts): ?>
					    		<?php if ($sts == $direct['status']): ?>
					    			<option value="<?= $sts ?>" selected><?= ucfirst($sts) ?></option>
					    			<?php else: ?>
					    				<option value="<?= $sts ?>"><?= ucfirst($sts) ?></option>
					    			<?php endif ?>
					    	<?php endforeach ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="withdrawal">Withdrawal *</label>
					    <input type="number" class="form-control" id="withdrawal" name="withdrawal" required="" placeholder="0.00025000 BTC" value="<?= $direct['withdrawal'] ?>">
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