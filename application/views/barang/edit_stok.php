<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Edit Stok</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row col-lg-10 py-4">
                <div class="card border-primary col-lg-10">
                    <div class="card-body">
                        <form action="<?= base_url("edit_stok") ?>" method="post">
                            <?php
                            foreach ($stok_barang->result_array() as $key) {
                                ?>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                    value="<?= $key['nama_barang'] ?>" disabled>
                                <input type="text" class="form-control" name="id" id="id" value="<?= $key['id'] ?>"
                                    hidden>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Jumlah Stok</label>
                                <input type="text" class="form-control" name="jumlah_stok" id="jumlah_stok"
                                    value="<?= $key['jumlah_stok'] ?>">
                                <?= form_error('jumlah_stok', '<small class="text-danger pl-3">', '</small>'); ?>
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