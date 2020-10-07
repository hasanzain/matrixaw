<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Data Pengeluaran</h3>

            <div class="row">
                <div class="col-lg-12">

                    <form action="<?= base_url("data_pengeluaran") ?>" method="post">

                        <div class=" form-row col-ld-9">
                            <div class="form-group col-md-6">
                                <div class="input-group">
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
                                    <th scope="col">tanggal</th>
                                    <th scope="col">Nama_Pengeluaran</th>
                                    <th scope="col"></th>
                                    <th scope="col">Biaya</th>
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
                                    <td><?= $key['tanggal'] ?></td>
                                    <td><?= $key['nama_pengeluaran'] ?></td>
                                    <td class="text-right">Rp.</td>
                                    <td class="text-right"><?= $key['total_pengeluaran'] ?></td>
                                    <td><?= $key['keterangan'] ?></td>
                                    <td>
                                        <?php if ($this->session->userdata('role')=='admin') {
                                    ?>
                                        <a href="delete_pengeluaran?id=<?= $key['id'] ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    </td>

                                </tr>
                                <?php
                        $i++;
                        $jumlah += $key['total_pengeluaran'];
                        
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