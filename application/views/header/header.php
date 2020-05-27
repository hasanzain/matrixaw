<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Toko matrix aw</title>
    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-primary">
        <a class="navbar-brand  text-white">
            <h3>Matrix AW</h3>
        </a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu ">
                    <div class="nav text-white">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link collapsed" href="<?= base_url('dashboard') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Features</div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Laporan Keuangan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('penjualan_harian') ?>">Penjualan Harian</a>
                                <a class="nav-link" href="<?= base_url('form_laporan') ?>">Form laporan</a>
                                <a class="nav-link" href="<?= base_url('laporan_penjualan') ?>">Laporan Penjualan</a>
                                <a class="nav-link" href="<?= base_url('data_penjualan') ?>">Data Penjualan</a>
                                <a class="nav-link" href="<?= base_url('pengeluaran') ?>">Pengeluaran</a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseLayouts1"
                            aria-expanded="false" aria-controls="collapseLayouts1">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Barang
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('barang_masuk') ?>">Barang Masuk</a>
                                <a class="nav-link" href="<?= base_url('retur_barang') ?>">Retur barang</a>
                                <a class="nav-link" href="<?= base_url('stok_barang') ?>">Stok Barang</a>
                                <a class="nav-link" href="<?= base_url('mutasi_barang') ?>">Mutasi Barang</a>
                                <a class="nav-link" href="<?= base_url('daftar_barang_masuk') ?>">Daftar Barang
                                    Masuk</a>

                            </nav>


                        </div>
                        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseLayoutsx"
                            aria-expanded="false" aria-controls="collapseLayoutsx">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Mixing
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayoutsx" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('pengambilan_cat') ?>">Pengambilan</a>
                                <a class="nav-link" href="<?= base_url('penjualan_mixing') ?>">Penjualan</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseLayouts2"
                            aria-expanded="false" aria-controls="collapseLayouts2">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Hutang Customer
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('hutang_customer') ?>">Hutang</a>
                                <a class="nav-link" href="<?= base_url('pembayaran_customer') ?>">Pembayaran</a>
                                <a class="nav-link" href="<?= base_url('daftar_hutang_customer') ?>">Daftar Hutang</a>

                            </nav>
                        </div>


                        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseLayouts3"
                            aria-expanded="false" aria-controls="collapseLayouts3">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Hutang Toko
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('hutang_toko') ?>">Hutang</a>
                                <a class="nav-link" href="<?= base_url('pembayaran_toko') ?>">Pembayaran</a>
                                <a class="nav-link" href="<?= base_url('daftar_hutang_toko') ?>">Daftar Hutang</a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseLayouts5"
                            aria-expanded="false" aria-controls="collapseLayouts5">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Inventory
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('tambah_inventory') ?>">Tambah inventory</a>
                                <a class="nav-link" href="<?= base_url('daftar_inventory') ?>">Daftar Inventory</a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseLayouts4"
                            aria-expanded="false" aria-controls="collapseLayouts4">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Cek
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('tambah_alarm') ?>">Tambah Alarm</a>
                                <a class="nav-link" href="<?= base_url('daftar_alarm') ?>">Daftar Alarm</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseLayoutsz"
                            aria-expanded="false" aria-controls="collapseLayoutsz">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Report
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayoutsz" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('report') ?>">Export Excel</a>
                            </nav>
                        </div>



                    </div>

                </div>

            </nav>
        </div>