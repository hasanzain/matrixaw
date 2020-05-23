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
                                <div class="form-group col-md-3">
                                    <label>Laporan</label>
                                    <select class="form-control" name="laporan">
                                        <option value="minggu_1">Minggu Ke 1</option>
                                        <option value="minggu_2">Minggu Ke 2</option>
                                        <option value="minggu_3">Minggu Ke 3</option>
                                        <option value="minggu_4">Minggu Ke 4</option>
                                        <option value="minggu_5">Minggu Ke 5</option>
                                        <option value="bulan">Bulan</option>
                                    </select>
                                    <?= form_error('nama_laporan','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Bulan </label>
                                    <select class="form-control" name="bulan">
                                        <option value="Januari">Januari</option>
                                        <option value="February">February</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                    <?= form_error('nama_laporan','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Nama Laporan </label>
                                    <select class="form-control" name="Tahun">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                    <?= form_error('nama_laporan','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
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