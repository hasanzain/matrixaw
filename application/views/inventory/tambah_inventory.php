<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Tambah Inventory</h3>

            <div class="row">
                <div class="card col-lg-10">
                    <?= $this->session->flashdata('message')?>
                    <div class="card-body">
                        <form action="<?= base_url("tambah_inventory") ?>" method="post">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang">
                                <?= form_error('nama_barang','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang">
                                <?= form_error('kode_barang','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Harga Satuan</label>
                                <input type="number" class="form-control" name="harga_satuan">
                                <?= form_error('harga_satuan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Tambahkan">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>