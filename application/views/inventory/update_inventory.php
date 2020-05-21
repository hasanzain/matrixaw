<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Update Inventory</h3>

            <div class="row">
                <div class="card col-lg-10">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Inventory</h6>

                    </div>
                    <?= $this->session->flashdata('message');
            foreach ($update->result_array() as $key) {
                ?>
                    <div class="card-body">
                        <form action="<?= base_url("update_inventory") ?>" method="post">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                    value="<?= $key['nama_barang'] ?>">
                                <input type=" text" class="form-control" name="id" id="id" value="<?= $key['id'] ?>"
                                    hidden>
                                <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang"
                                    value="<?= $key['kode_barang'] ?>">
                                <?= form_error('kode_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <label>Harga Satuan</label>
                                <input type="number" class="form-control" name="harga_satuan"
                                    value="<?= $key['harga_satuan'] ?>">
                                <?= form_error('harga_satuan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                    <?php
            }
            ?>
                </div>
            </div>

        </div>
    </main>