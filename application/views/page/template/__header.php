<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Arman Nur Hidayat">
  <meta name="description" content="List of best and highest paying <?= $meta ?>">
  <link rel="canonical" href="<?= base_url() ?>">
  <meta property="og:url" content="<?= base_url() ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Bitcoin (BTC) Direct Faucets">
  <meta property="og:site_name" content="<?= base_url() ?>">
  <meta property="og:description" content="List of best and highest paying <?= $meta ?>">
  <meta property="og:image" content="https://bestfaucetsites.com/android-chrome-512x512.png">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@bitcoinfaucet">
  <meta name="twitter:creator" content="@bitcoinfaucet">
  <meta name="twitter:title" content="<?= $meta ?>">
  <meta name="twitter:image" content="https://bestfaucetsites.com/android-chrome-512x512.png">
  <meta name="twitter:description" content="List of best and highest paying <?= $meta ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="https://bestfaucetsites.com/favicon-32x32.png">

  <title> <?= $title ?> </title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">

   <!-- Custom styles for this page -->
  <link href="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('faucet-list/direct') ?>">Direct Faucets<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('faucet-list/coinpot') ?>">Coinpot Faucets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('faucet-list/faucethub') ?>">FaucetHub Faucets</a>
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

  <div class="container-fluit">
    <script src="https://widgets.coingecko.com/coingecko-coin-price-marquee-widget.js"></script>
    <coingecko-coin-price-marquee-widget coin-ids="bitcoin,ethereum,litecoin,ripple,dogecoin,bitcoin-cash,blackcoin" currency="idr" background-color="#ffffff" locale="id"></coingecko-coin-price-marquee-widget>
  </div>