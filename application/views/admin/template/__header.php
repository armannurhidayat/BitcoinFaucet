<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bitcoin Faucet</title>

  <!-- Custom fonts for this template -->
  <link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-btc"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Bitcoin Faucet</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('coin_list') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Coin List</span></a>
      </li>

      <!-- Faucet Site -->
      <hr class="sidebar-divider">
      <!-- <div class="sidebar-heading">
        Faucet Site
      </div> -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#faucetsite" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Faucet Site</span>
        </a>
        <div id="faucetsite" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('faucet-list/direct') ?>">Direct</a>
            <a class="collapse-item" href="<?= base_url('faucet-list/coinpot') ?>">Coinpot</a>
            <a class="collapse-item" href="<?= base_url('faucet-list/faucethub') ?>">FaucetHub</a>
          </div>
        </div>
      </li>
      <!-- ./Faucet Site -->

      <!-- PTC Site -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        PTC Site
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ptc" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Coin List</span>
        </a>
        <div id="ptc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('coin-list/bitcoin') ?>">Bitcoin</a>
            <a class="collapse-item" href="<?= base_url('coin-list/bitcoin_cash') ?>">Bitcoin Cash</a>
            <a class="collapse-item" href="<?= base_url('coin-list/litecoin') ?>">Litecoin</a>
            <a class="collapse-item" href="<?= base_url('coin-list/dogecoin') ?>">Dogecoin</a>
            <a class="collapse-item" href="<?= base_url('coin-list/blackcoin') ?>">Blackcoin</a>
          </div>
        </div>
      </li>
      <!-- ./PTC Site -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">