<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Form laporan</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row">

                <div class="card col-lg-10">

                    <div class="card-body">
                        <form action="<?= base_url("form_laporan") ?>" method="post">
                            <div class=" form-row">
                                <div class="form-group col-md-6">
                                    <label>Bulan </label>
                                    <select class="form-control" name="bulan">
                                        <option value="1">Januari</option>
                                        <option value="2">February</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <?= form_error('nama_laporan','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama Laporan </label>
                                    <select class="form-control" name="tahun">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                    <?= form_error('nama_laporan','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Buat Laporan">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>