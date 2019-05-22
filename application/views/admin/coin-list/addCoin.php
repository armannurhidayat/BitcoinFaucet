<div class="container-fluid">
	<div class="card shadow">
    <div class="card-header">
      <a href="<?= base_url('administrator/coin_list') ?>">
	    	<button class="btn btn-warning btn-sm float-left"><i class="fa fa-chevron-left"></i> Back</button>
    	</a>
      <h6 class="m-0 mt-2 font-weight-bold text-primary text-right">Add Coin</h6>
    </div>
    
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data" action="<?= base_url('administrator/coin_list/add') ?>">
      	<div class="row">
      		<div class="col-md-5 ml-5">
          	<div class="form-group">
					    <label for="nama_coin">Coin Name *</label>
					    <input type="text" name="nama_coin" id="nama_coin" class="form-control" autofocus="" placeholder="Bitcoin">
					    <small class="form-text text-danger"><?= form_error('nama_coin'); ?></small>
					  </div>
					  <div class="form-group">
					    <label for="logo_coin">Logo Coin</label>
					    <input type="file" name="logo_coin" id="logo_coin" class="form-control-file">
					    <small class="text-danger">* file type format PNG/JPG/JPEG</small>
					  </div>
				  </div>
				  <div class="col-md-5">
				  	<div class="form-group">
					  <label for="code_coin">Code Coin *</label>
					    <input type="text" class="form-control" id="code_coin" name="code_coin" placeholder="BTC">
					    <small class="form-text text-danger"><?= form_error('code_coin'); ?></small>
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