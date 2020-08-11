<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Barang Masuk</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row col-lg-10">
                <div class="card border-primary col-lg-10">
                    <div class="card-body">
                        <form action="<?= base_url("barang_masuk") ?>" method="post">
                            <div class="form-group" id='EditForm'>
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                    value="<?= $tanggal ?>">
                                <?= form_error('total','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Supplier</label>
                                    <select class="form-control" name="supplier">
                                        <?php
                            foreach ($supplier->result_array() as $key) {
                                ?>
                                        <option value="<?= $key['nama_supplier'] ?>"><?= $key['nama_supplier'] ?>
                                        </option>
                                        <?php
                            }
                            ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label>Nama Barang</label>
                                    <select class="form-control" name="nama_barang" id="nama_barang"
                                        onchange="getdata2()"></select>
                                    <script>
                                    function getData() {
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php echo base_url()."autocomplate/getdatabarang" ?>',
                                            dataType: 'JSON',
                                            success: function(data) {
                                                var baris = '';

                                                for (var i = 0; i < data.length; i++) {
                                                    baris += '<option value="' + data[i].nama_barang +
                                                        '">' + data[i]
                                                        .nama_barang + '</option>';

                                                }
                                                $('#nama_barang').html(baris);
                                            }
                                        });
                                    }
                                    </script>
                                </div>

                                <div class="form-group col-md-4" id='EditForm'>
                                    <label>Kode barang</label>
                                    <input type="text" class="form-control" name="kode_barang" id="kode_barang">
                                    <?= form_error('kode_barang','<small class="text-danger pl-3">','</small>'); ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Price list</label>
                                <input type="text" class="form-control" name="price_list" value="0" id="price_list"
                                    onchange="hitungnet()">
                                <?= form_error('price_list','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class=" form-row">
                                <div class="form-group col-md-3" id='EditForm'>
                                    <label>Diskon1</label>
                                    <input type="text" class="form-control" name="diskon1" value="0" id="diskon1"
                                        onchange="hitungnet()">
                                </div>
                                <div class="form-group col-md-3" id='EditForm'>
                                    <label>Diskon2</label>
                                    <input type="text" class="form-control" name="diskon2" value="0" id="diskon2"
                                        onchange="hitungnet()">
                                </div>
                                <div class="form-group col-md-3" id='EditForm'>
                                    <label>Diskon3</label>
                                    <input type="text" class="form-control" name="diskon3" value="0" id="diskon3"
                                        onchange="hitungnet()">
                                </div>
                                <div class="form-group col-md-3" id='EditForm'>
                                    <label>Diskon4</label>
                                    <input type="text" class="form-control" name="diskon4" value="0" id="diskon4"
                                        onchange="hitungnet()">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6" id='EditForm'>
                                    <label>PPN</label>
                                    <input type="text" class="form-control" name="ppn" value="0" id="ppn"
                                        onchange="hitungnet()">
                                </div>
                                <div class="form-group col-md-6" id='EditForm'>
                                    <label>Net</label>
                                    <input type="text" class="form-control" name="net" id="harga_satuan">
                                    <?= form_error('net','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Jumlah Beli</label>
                                <input type="text" class="form-control" name="jumlah_beli" id="jumlah_beli"
                                    onchange="hitung()">
                                <?= form_error('jumlah_beli','<small class="text-danger pl-3">','</small>'); ?>
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