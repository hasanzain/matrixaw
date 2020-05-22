<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Export Laporan</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row">

                <div class="card col-lg-10">

                    <div class="card-body">
                        <form action="<?= base_url("export") ?>" method="post">
                            <div class="form-group">
                                <label>Nama Laporan </label>
                                <select class="form-control" name="nama_tabel">
                                    <?php
foreach ($report->result_array() as $key) {
    ?>
                                    <option value="<?= $key['nama_tabel']?>"><?= $key['nama_tabel']?></option>
                                    <?php
}
?>
                                </select>
                                <?= form_error('nama_laporan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <form>
                                <div class=" form-group">
                                    <label>Dari </label>
                                    <input type="date" class="form-control" name="dari">
                                    <?= form_error('dari','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Sampai</label>
                                    <input type="date" class="form-control" name="sampai">
                                    <?= form_error('sampai','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Export Laporan">
                            </form>
                    </div>
                </div>
            </div>

        </div>
    </main>