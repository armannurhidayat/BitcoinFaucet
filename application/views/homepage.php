<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Bitcoin Faucet</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
	<div class="container-fluit">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
			  <a class="navbar-brand" href="<?= base_url() ?>">BitcoinFaucet.com</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">Direct Faucets<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Coinpot Faucets</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">FaucetHub Faucets</a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          Other Sites
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          <a class="dropdown-item" href="#">PTC</a>
			          <a class="dropdown-item" href="#">Exchange</a>
			          <a class="dropdown-item" href="#">Lottery</a>
			        </div>
			      </li>
			    </ul>
			  </div>
		  </div>
		</nav>
	</div>

	<!-- Content -->
	<div class="container-fluit">
		<script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
		<coingecko-coin-price-marquee-widget coin-ids="bitcoin,ethereum,litecoin,ripple,dogecoin,bitcoin-cash,blackcoin" currency="idr" background-color="#ffffff" locale="id"></coingecko-coin-price-marquee-widget>
	<h1 class="text-center">Best Faucet Sites</h1>

	</div>
	<!-- /Content -->

	<!-- Footer -->
	<nav class="navbar fixed-bottom navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<small class="navbar-brand">Copyright &copy; 2019 BitcoinFaucet.com</small>
		  <div class="collapse navbar-collapse mb-4" id="navbarNavDropdown">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Facebook</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="mailto:armannurhidayat7@gmail.com">Contant</a>
		      </li>
		    </ul>
		  </div>
	  </div>
	</nav>
	<!-- /Footer -->

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script>

</body>

</html>
