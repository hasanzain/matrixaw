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
                                    <select class="custom-select" id="inputGroupSelect04" name="bulan">
                                        <option value="">Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">February</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>

                                    <select class="custom-select" id="inputGroupSelect04" name="tahun">
                                        <option value="">Tahun</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
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
                                    <th scope="col">Nomor Cek</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($cek != null) {
                                    $i=1;
                                    $jumlah=0;
                                    foreach ($cek->result_array() as $key) {
                                        ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $key['nama_supplier'] ?></td>
                                    <td><?= $key['jumlah_bayar'] ?></td>
                                    <td><?= $key['tanggal_bayar'] ?></td>
                                    <td><?= $key['no_cek'] ?></td>
                                    <td><?= $key['keterangan'] ?></td>
                                    <td>
                                        <?php if ($this->session->userdata('role')=='admin') {
                                    ?>
                                        <a href="<?= base_url('delete_cek?id=').$key['id'] ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    </td>
                                </tr>
                                <?php
                                $jumlah += $key['jumlah_bayar'];
                                    }
                                    echo
                                    "<tr class='table-info'>
                                        <td colspan=4>Jumlah Total</td>
                                        <td class='text-right'>Rp.</td>
                                        <td class='text-right'>$jumlah</td>
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