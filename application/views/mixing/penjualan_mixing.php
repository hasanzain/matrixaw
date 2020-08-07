<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Penjualan Mixing</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row col-lg-10 py-4">
                <div class="card border-primary col-lg-10">
                    <div class="card-body">
                        <form action="<?= base_url("penjualan_mixing") ?>" method="post">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>">
                            </div>
                            <div class="form-group">
                                <label>Warna</label>
                                <input type="text" class="form-control" name="warna">
                                <?= form_error('warna','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Jumlah Pesanan</label>
                                <input type="text" class="form-control" name="jumlah_pesanan">
                                <?= form_error('jumlah_pesanan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Harga</label>
                                <input type="text" class="form-control" name="harga">
                                <?= form_error('harga','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Keterangan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="keterangan"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Tambahkan">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>