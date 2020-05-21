<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar barang masuk</h1>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card mb-4">

                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">Nama barang</th>
                                    <th scope="col">Kode barang</th>
                                    <th scope="col">Price List</th>
                                    <th scope="col">Diskon 1</th>
                                    <th scope="col">Diskon 2</th>
                                    <th scope="col">Diskon 3</th>
                                    <th scope="col">Diskon 4</th>
                                    <th scope="col">PPN</th>
                                    <th scope="col">Net</th>
                                    <th scope="col">Jumlah Beli</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">ket</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $i=1;
                      foreach ($barang_masuk->result_array() as $key) {        
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $key['tanggal'] ?></td>
                                    <td><?= $key['supplier'] ?></td>
                                    <td><?= $key['nama_barang'] ?></td>
                                    <td><?= $key['kode_barang'] ?></td>
                                    <td><?= $key['price_list'] ?></td>
                                    <td><?= $key['diskon1'] ?></td>
                                    <td><?= $key['diskon2'] ?></td>
                                    <td><?= $key['diskon3'] ?></td>
                                    <td><?= $key['diskon4'] ?></td>
                                    <td><?= $key['ppn'] ?></td>
                                    <td><?= $key['net'] ?></td>
                                    <td><?= $key['jumlah_beli'] ?></td>
                                    <td><?= $key['total'] ?></td>
                                    <td><?= $key['keterangan'] ?></td>

                                </tr>
                                <?php
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>