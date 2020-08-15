<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Penjualan Harian</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row col-lg-10 py-4">
                <div class="card border-primary col-lg-10">
                    <div class="card-body">
                        <form action="<?= base_url("penjualan_harian") ?>" method="post">
                            <div class="form-row" id='EditForm'>
                                <label>Pencarian</label>
                                <input type="text" class="form-control" name="cari" id="cari" onchange="hitung();">
                                <?= form_error('jumlah_beli','<small class="text-danger pl-3">','</small>'); ?>
                                <input type="submit" class="btn btn-primary" value="Cari">
                            </div>
                        </form>
                        <form action="<?= base_url("penjualan") ?>" method="post">
                            <div class="form-group" id='EditForm'>
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                    value="<?= $tanggal ?>">
                                <?= form_error('total','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <!-- <input type="text" class="form-control" name="nama_barang" id="nama_barang"> -->
                                <select class="form-control" name="nama_barang" id="nama_barang" onchange="getdata2()">
                                    <?php
                                    foreach ($barang -> result_array() as $key) {
                                        ?>
                                    <option value="<?= $key['nama_barang'] ?>"><?= $key['nama_barang'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>


                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang">
                                <?= form_error('kode_barang','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Jumlah Beli</label>
                                <input type="text" class="form-control" name="jumlah_beli" id="jumlah_beli"
                                    onchange="hitung();">
                                <?= form_error('jumlah_beli','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Harga Satuan</label>
                                <input type="text" class="form-control" name="harga_satuan" id="harga_satuan"
                                    onchange="hitung();">
                                <?= form_error('harga_satuan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Total</label>
                                <input type="text" class="form-control" name="total" id="total">
                                <?= form_error('total','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" rows="3"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Tambahkan">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>