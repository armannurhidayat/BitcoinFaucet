<div class="container-fluid">
	<div class="card shadow">
    <div class="card-header">
      <a href="<?= base_url('administrator/faucet-list/direct') ?>">
	    	<button class="btn btn-warning btn-sm float-left"><i class="fa fa-chevron-left"></i> Back</button>
    	</a>
      <h6 class="m-0 mt-2 font-weight-bold text-primary text-right">Add Faucet</h6>
    </div>
    
    <div class="card-body">
      <form method="POST" action="<?= base_url('administrator/faucet-list/direct/add') ?>">
      	<div class="row">
      		<div class="col-md-5 ml-5">
      			<div class="form-group">
					    <label for="nama">Faucet Name *</label>
					    <input type="text" class="form-control" id="nama" name="nama" required="" autofocus="">
					  </div>
          	<div class="form-group">
					    <label for="coin">Coin Name *</label>
					    <select name="id_coin" id="id_coin" class="form-control" required="">
					    	<option value="">- Select -</option>
					    	<?php foreach ($coins as $coin): ?>
					    		<option value="<?= $coin['id'] ?>"><?= strtoupper($coin['code_coin']) ?></option>
						    <?php endforeach ?>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="timer">Timer Minutes *</label>
					    <input type="number" class="form-control" id="timer" name="timer" max="99" required="" placeholder="1 minutes">
					  </div>
					  <div class="form-group">
					  	<label for="link">Link *</label>
					  	<textarea class="form-control" name="link" id="link" style="min-height: 100px;" placeholder="https://link-faucet.com"></textarea>
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
					    	<option value="">- Select -</option>
					    	<option value="legit">Legit</option>
					    	<option value="testing">Testing</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="withdrawal">Withdrawal *</label>
					    <input type="number" class="form-control" id="withdrawal" name="withdrawal" required="" placeholder="0.00025000 BTC">
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