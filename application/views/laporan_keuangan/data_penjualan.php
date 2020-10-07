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
                                    <input class="form-control" type="text" name="filter">
                                    <input placeholder="Dari" class="form-control" type="text"
                                        onfocus="(this.type='date')" name="dari">
                                    <input placeholder="Sampai" class="form-control" type="text"
                                        onfocus="(this.type='date')" name="sampai">
                                    <div class="input-group-append">
                                        <input class="btn btn-outline-primary col-lg-12" type="submit" value="cari">
                                    </div>
                                    <div>
                                        <button onclick="window.print()" class="btn btn-warning ml-3">Print</button>
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
                                    <th scope="col">No</th>
                                    <th scope="col">Nama barang</th>
                                    <th scope="col">Jumlah Beli</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col"></th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">#</th>
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
                                    <td><?= $key['keterangan'] ?></td>
                                    <td class="text-right">
                                        <?php if ($this->session->userdata('role')=='admin') {
                                    ?>
                                        <a href="edit_penjualan?id=<?= $key['id'] ?>">
                                            <button type="button" class="btn btn-warning">Edit</button>
                                        </a>
                                        <a href="delete_penjualan?id=<?= $key['id'] ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    </td>

                                </tr>
                                <?php
                        $i++;
                        $jumlah += $key['total'];
                        
                            }
                            foreach ($mixing->result_array() as $key) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $key['warna'] ?></td>
                                    <td><?= $key['jumlah_pesanan'] ?></td>
                                    <td>&nbsp</td>
                                    <td class="text-right">Rp.</td>
                                    <td class="text-right"><?= $key['harga'] ?></td>
                                    <td><?= $key['keterangan'] ?></td>
                                    <td class="text-right">
                                        <?php if ($this->session->userdata('role')=='admin') {
                                    ?>
                                        <a href="edit_penjualan?id=<?= $key['id'] ?>">
                                            <button type="button" class="btn btn-warning">Edit</button>
                                        </a>
                                        <a href="delete_penjualan?id=<?= $key['id'] ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                $jumlah += $key['harga'];
                            }
                            echo
                                    "<tr class='table-info'>
                                        <td colspan=4>Jumlah Total</td>
                                        <td class='text-right'>Rp.</td>
                                        <td class='text-right'>$jumlah</td>
                                        <td></td>
                                        <td></td>
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