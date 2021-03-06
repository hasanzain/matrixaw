<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Tambah Alarm</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row">
                <div class="card col-lg-10">

                    <div class="card-body">
                        <form action="<?= base_url('tambah_alarm') ?>" method="POST">
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <select class="form-control" name="nama_supplier">
                                    <option value="">Nama Supplier</option>
                                    <?php
                                    foreach ($supplier->result_array() as $key) {
                                        ?>
                                    <option value="<?= $key['nama_supplier'] ?>"><?= $key['nama_supplier'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?= form_error('nama_supplier','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Jumlah Bayar</label>
                                <input type="text" class="form-control" name="jumlah_bayar">
                                <?= form_error('jumlah_bayar','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Bayar</label>
                                <input type="date" class="form-control" name="tanggal_bayar">
                                <?= form_error('tanggal_bayar','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Nomor Cek</label>
                                <input type="text" class="form-control" name="no_cek">
                                <?= form_error('no_cek','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Keterangan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="keterangan"></textarea>

                            </div>

                            <input type="submit" class="btn btn-primary" value="Buat Laporan">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>