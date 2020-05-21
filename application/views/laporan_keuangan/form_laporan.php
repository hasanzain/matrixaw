<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Form laporan</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row">

                <div class="card col-lg-10">

                    <div class="card-body">
                        <form action="<?= base_url("form_laporan") ?>" method="post">
                            <div class="form-group">
                                <label>Nama Laporan </label>
                                <input type="text" class="form-control" name="nama_laporan">
                                <?= form_error('nama_laporan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label>Dari </label>
                                    <input type="date" class="form-control" name="dari">
                                    <?= form_error('dari','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Sampai</label>
                                    <input type="date" class="form-control" name="sampai">
                                    <?= form_error('sampai','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Buat Laporan">
                            </form>
                    </div>
                </div>
            </div>

        </div>
    </main>