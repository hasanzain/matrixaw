<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Mutasi Barang</h3>
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?= base_url("mutasi_barang") ?>" method="post">

                        <div class=" form-row col-ld-9">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <select class="form-control" name="nama_barang">
                                        <option value="">Nama Barang</option>
                                        <?php
                                    foreach ($barang->result_array() as $key) {
                                        ?>
                                        <option value="<?= $key['nama_barang'] ?>"><?= $key['nama_barang'] ?></option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                    <input class="form-control" type="date" name="tanggal">
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

                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama barang</th>
                                    <th scope="col">Kode barang</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Barang Masuk</th>
                                    <th scope="col">Barang Keluar</th>
                                    <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $i=1;
                      foreach ($stok_barang->result_array() as $key) {        
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $key['tanggal'] ?></td>
                                    <td><?= $key['nama_barang'] ?></td>
                                    <td><?= $key['kode_barang'] ?></td>
                                    <td><?= $key['harga_satuan'] ?></td>
                                    <td><?= $key['jumlah_masuk'] ?></td>
                                    <td><?= $key['jumlah_keluar'] ?></td>
                                    <td>
                                        <?php if ($this->session->userdata('role')=='admin') {
                                    ?>
                                        <a href="delete_mutasi?id=<?= $key['id'] ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    </td>

                                </tr>
                                <?php
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
    </main>