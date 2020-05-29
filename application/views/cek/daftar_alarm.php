<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Tagihan Cek</h1>

            <div class="row">
                <div class="col-lg-12">
                    <form action="<?= base_url("daftar_alarm") ?>" method="post">

                        <div class=" form-row col-ld-9">
                            <div class="form-group col-md-6">
                                <div class="input-group">
                                    <select class="form-control" name="nama_supplier">
                                        <option value="">Nama Supplier</option>
                                        <?php
                                    foreach ($supplier->result_array() as $key) {
                                        ?>
                                        <option value="<?= $key['nama_supplier'] ?>"><?= $key['nama_supplier'] ?>
                                        </option>
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
                        <?= $this->session->flashdata('message')?>

                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">Jumlah Bayar</th>
                                    <th scope="col">Tanggal Bayar</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($cek != null) {
                                    $i=1;
                                    foreach ($cek->result_array() as $key) {
                                        ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $key['nama_supplier'] ?></td>
                                    <td><?= $key['jumlah_bayar'] ?></td>
                                    <td><?= $key['tanggal_bayar'] ?></td>
                                    <td><?= $key['keterangan'] ?></td>
                                    <td>

                                        <a href="<?= base_url('delete_inventory?id=').$key['id'] ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>