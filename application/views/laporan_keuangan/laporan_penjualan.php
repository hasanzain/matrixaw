<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Laporan Penjualan</h3>

            <div class="row">
                <div class="col-lg-12">

                    <form action="<?= base_url("laporan_penjualan") ?>" method="post">

                        <div class=" form-row col-ld-9">
                            <div class="form-group col-md-3">
                                <select class="custom-select" id="inputGroupSelect04" name="laporan">
                                    <option value="minggu_1">Minggu Ke 1</option>
                                    <option value="minggu_2">Minggu Ke 2</option>
                                    <option value="minggu_3">Minggu Ke 3</option>
                                    <option value="minggu_4">Minggu Ke 4</option>
                                    <option value="minggu_5">Minggu Ke 5</option>
                                    <option value="bulan">Bulan</option>
                                </select>
                                <?= form_error('nama_laporan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group col-md-3">
                                <select class="custom-select" id="inputGroupSelect04" name="bulan">
                                    <option value="Januari">Januari</option>
                                    <option value="February">February</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                <?= form_error('nama_laporan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="input-group">
                                    <select class="custom-select" id="inputGroupSelect04" name="tahun">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                    <div class="input-group-append">
                                        <input class="btn btn-outline-primary" type="submit" value="cari">
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
                        
                        if ($laporan_penjualan != null) {
                            $i=1;
                            $jumlah = 0;
                            
                            
                            foreach ($laporan_penjualan->result_array() as $key) {
                                
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