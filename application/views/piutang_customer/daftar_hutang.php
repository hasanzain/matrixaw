<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Hutang</h1>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card mb-4">

                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Hutang</th>
                                    <th scope="col">Pembayaran</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $i=1;
                      foreach ($hutang_customer->result_array() as $key) {        
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $key['nama_perusahaan'] ?></td>
                                    <td><?= $key['nama_pelanggan'] ?></td>
                                    <td><?= $key['nominal_hutang'] ?></td>
                                    <td><?= $key['nominal_pembayaran'] ?></td>
                                    <td><?= $key['keterangan'] ?></td>
                                    <td>

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