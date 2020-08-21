<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Stok Barang</h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class=" form-row col-ld-9">
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <div>
                                    <button onclick="window.print()" class="btn btn-warning ml-3">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">

                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama barang</th>
                                    <th scope="col">Kode barang</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jumlah Stok</th>
                                    <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $i=0;
                        $jumlahstok = 0;
                        $harga=[];
                        $totalharga=0;
                        foreach ($stok_barang->result_array() as $key) {        
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $key['tanggal'] ?></td>
                                    <td><?= $key['nama_barang'] ?></td>
                                    <td><?= $key['kode_barang'] ?></td>
                                    <td><?= $key['harga_satuan'] ?></td>
                                    <td><?= $key['jumlah_stok'] ?></td>
                                    <td>
                                        <?php if ($this->session->userdata('role')=='admin') {
                                    ?>
                                        <a href="edit_stok?id=<?= $key['id'] ?>">
                                            <button type="button" class="btn btn-danger">Edit</button>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    </td>

                                </tr>
                                <?php
                                $harga[$i] = intval($key['harga_satuan']) * intval($key['jumlah_stok']);
                                $totalharga += $harga[$i];
                                $jumlahstok += $key['jumlah_stok'];
                                $i++;
                        }
                        ?>
                                <tr class="table-secondary">
                                    <td colspan="4"><b>Jumlah Stok</b></td>
                                    <td colspan="3"><?= $totalharga ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
    </main>