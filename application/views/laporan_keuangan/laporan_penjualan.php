<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Laporan Penjualan</h3>

            <div class="row">
                <div class="col-lg-12">

                    <form action="<?= base_url("laporan_penjualan") ?>" method="post">

                        <div class=" form-row col-ld-9">
                            <div class="form-group col-md-3">
                                <select class="custom-select" id="inputGroupSelect04" name="bulan">
                                    <option value="1">Januari</option>
                                    <option value="2">February</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
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
                                    <th scope="col"></th>
                                    <th scope="col">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        
                        if ($laporan_penjualan != null) {
                            $i=1;
                            $debit = 0;
                            $kredit = 0;
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
                                    <td class="text-right">Rp.</td>
                                    <td class="text-right"><?= $key['kredit'] ?></td>

                                </tr>
                                <?php
                        $i++;
                        $debit += $key['total'];
                        $kredit += $key['kredit'];
                        
                            }
                            $jumlah = $debit - $kredit;
                            echo
                                    "<tr class='table-info'>
                                        <td colspan=6>Jumlah Total</td>
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