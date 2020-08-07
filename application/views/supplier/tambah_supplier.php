<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Tambah Supplier</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row">
                <div class="card col-lg-10">

                    <div class="card-body">
                        <form action="<?= base_url('tambah_supplier') ?>" method="POST">

                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="text" class="form-control" name="nama_supplier">
                                <?= form_error('nama_supplier','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Tambahkan">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>