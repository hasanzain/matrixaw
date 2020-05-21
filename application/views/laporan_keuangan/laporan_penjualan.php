<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Laporan Penjualan</h3>

            <div class="row">
                <div class="col-lg-12">

                    <form action="<?= base_url("laporan_penjualan") ?>" method="post">
                        <div class="form-row">
                            <div class="input-group mb-3 col-lg-4">
                                <input type="text" class="form-control" name="search">
                                <div class="input-group-append">
                                    <input class="btn btn-outline-primary" type="submit" value="Cari">
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card mb-4">

                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama barang</th>
                                    <th scope="col">Jumlah Beli</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        
                        if ($laporan_penjualan != null) {
                            $i=1;
                            
                            
                            foreach ($laporan_penjualan->result_array() as $key) {
                                
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $key['nama_barang'] ?></td>
                                    <td><?= $key['jumlah_beli'] ?></td>
                                    <td><?= $key['harga_satuan'] ?></td>
                                    <td><?= $key['total'] ?></td>

                                </tr>
                                <?php
                        $i++;
                        
                            }
                        }
                        ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>