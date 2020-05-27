<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Hutang Toko</h1>

            <div class="row">
                <div class="col-lg-12">
                    <form action="<?= base_url("daftar_hutang_toko") ?>" method="post">

                        <div class=" form-row col-ld-9">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <input class="form-control" type="text" name="nama_perusahaan"
                                        placeholder="Nama Perusahaan">
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
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
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
                                    foreach ($hutang_toko->result_array() as $key) {
                                        ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $key['tanggal'] ?></td>
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