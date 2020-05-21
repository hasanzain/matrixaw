<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <?php
                    foreach ($alarm->result_array() as $key) {
                ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <?= $key['nama_supplier'] ?>
                            <br>
                            <?= $key['jumlah_bayar'] ?>
                            <br>
                            <?= $key['keterangan'] ?>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link"
                                href="<?= base_url('bayar_cek?id=').$key['id'] ?>">
                                <?= $key['tanggal_bayar'] ?>
                                <br>
                                Bayar
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <?php
                }
                    ?>
            </div>

        </div>
    </main>