<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Edit Penjualan</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row col-lg-10 py-4">
                <div class="card border-primary col-lg-10">
                    <div class="card-body">
                        <form action="<?= base_url("edit_penjualan") ?>" method="post">
                            <?php
                            foreach ($penjualan->result_array() as $key) {
                                ?>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                    value="<?= $key['nama_barang'] ?>" disabled>
                                <input type="text" class="form-control" name="id" id="id" value="<?= $key['id'] ?>"
                                    hidden>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Jumlah Beli</label>
                                <input type="text" class="form-control" name="jumlah_beli" id="jumlah_beli"
                                    value="<?= $key['jumlah_beli'] ?>" onchange="hitung()">
                                <?= form_error('jumlah_beli', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Harga Satuan</label>
                                <input type="text" class="form-control" name="harga_satuan" id="harga_satuan"
                                    value="<?= $key['harga_satuan'] ?>" onchange="hitung()">
                                <?= form_error('harga_satuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Total</label>
                                <input type="text" class="form-control" name="total" id="total"
                                    value="<?= $key['total'] ?>">
                                <?= form_error('total', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Tambahkan">
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>