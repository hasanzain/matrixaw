<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Pengeluaran</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row col-lg-10 py-4">
                <div class="card border-primary col-lg-10">
                    <div class="card-body">
                        <form action="<?= base_url("pengeluaran") ?>" method="post">
                            <div class="form-group" id='EditForm'>
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                    value="<?= $tanggal ?>">
                                <?= form_error('total','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Pengeluaran</label>
                                <input type="text" class="form-control" name="nama_pengeluaran">
                                <?= form_error('nama_pengeluaran','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Total Pengeluaran</label>
                                <input type="text" class="form-control" name="total_pengeluaran">
                                <?= form_error('total_pengeluaran','<small class="text-danger pl-3">','</small>'); ?>
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