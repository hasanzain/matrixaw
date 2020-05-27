<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Data Penjualan</h3>

            <div class="row">
                <div class="col-lg-12">

                    <form action="<?= base_url("data_penjualan") ?>" method="post">

                        <div class=" form-row col-ld-9">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_barang"
                                        placeholder="nama barang">
                                    <input class="form-control" type="date" name="tanggal">
                                    <div class="input-group-append">
                                        <input class="btn btn-outline-primary col-lg-10" type="submit" value="cari">
                                        <button onclick="window.print()" class="btn btn-warning">Print</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>

                    <div class="card mb-4">
                        <?= $this->session->flashdata('message')?>

                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-primary">
                                    <th scope="col">#</th>
                                    <th scope="col">Nama barang</th>
                                    <th scope="col">Jumlah Beli</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col"></th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        
                        if ($data_penjualan != null) {
                            $i=1;
                            $jumlah = 0;
                            
                            
                            foreach ($data_penjualan->result_array() as $key) {
                                
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $key['nama_barang'] ?></td>
                                    <td><?= $key['jumlah_beli'] ?></td>
                                    <td><?= $key['harga_satuan'] ?></td>
                                    <td class="text-right">Rp.</td>
                                    <td class="text-right"><?= $key['total'] ?></td>

                                </tr>
                                <?php
                        $i++;
                        $jumlah += $key['total'];
                        
                            }
                            echo
                                    "<tr class='table-info'>
                                        <td colspan=4>Jumlah Total</td>
                                        <td class='text-right'>Rp.</td>
                                        <td class='text-right'>$jumlah</td>
                                    </tr>";
                        }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>