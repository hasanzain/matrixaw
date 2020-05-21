<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Daftar Inventory</h3>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card mb-4">

                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama barang</th>
                                    <th scope="col">Kode barang</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $i=1;
                      foreach ($barang->result_array() as $key) {        
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $key['nama_barang'] ?></td>
                                    <td><?= $key['kode_barang'] ?></td>
                                    <td><?= $key['harga_satuan'] ?></td>
                                    <td>
                                        <a href="<?= base_url('update_inventory?id=').$key['id'] ?>">
                                            <button type="button" class="btn btn-info">Edit</button>
                                        </a>
                                        <a href="<?= base_url('delete_inventory?id=').$key['id'] ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
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

        </div>
    </main>