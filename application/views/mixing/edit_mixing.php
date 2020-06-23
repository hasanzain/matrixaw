<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Edit Penjualan</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row col-lg-10 py-4">
                <div class="card border-primary col-lg-10">
                    <div class="card-body">
                        <form action="<?= base_url("edit_mixing") ?>" method="post">
                            <?php
                            foreach ($penjualan_mixing->result_array() as $key) {
                                ?>
                            <div class="form-group">
                                <label>Warna</label>
                                <input type="text" class="form-control" name="warna" id="warna"
                                    value="<?= $key['warna'] ?>">
                                <input type="text" class="form-control" name="id" id="id" value="<?= $key['id'] ?>"
                                    hidden>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Jumlah Pesanan</label>
                                <input type="text" class="form-control" name="jumlah_pesanan" id="jumlah_beli"
                                    value="<?= $key['jumlah_pesanan'] ?>">
                                <?= form_error('jumlah_pesanan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga"
                                    value="<?= $key['harga'] ?>">
                                <?= form_error('harga_satuan', '<small class="text-danger pl-3">', '</small>'); ?>
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