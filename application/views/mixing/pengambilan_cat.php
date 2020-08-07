<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Pengambilan Cat</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row col-lg-10 py-4">
                <div class="card border-primary col-lg-10">
                    <div class="card-body">
                        <form action="<?= base_url("pengambilan_cat") ?>" method="post">
                            <div class="form-group" id='EditForm'>
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                    value="<?= $tanggal ?>">
                                <?= form_error('total','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <!-- <input type="text" class="form-control" name="nama_barang" id="nama_barang"> -->
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
                                                baris += '<option value="' + data[i].nama_barang + '">' +
                                                    data[i]
                                                    .nama_barang + '</option>';

                                            }
                                            $('#nama_barang').html(baris);
                                        }
                                    });
                                }
                                </script>

                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang">
                                <?= form_error('kode_barang','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Harga Satuan</label>
                                <input type="text" class="form-control" name="harga_satuan" id="harga_satuan">
                                <?= form_error('harga_satuan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                            <div class="form-group" id='EditForm'>
                                <label>Jumlah Ambil</label>
                                <input type="text" class="form-control" name="jumlah_beli" id="jumlah_beli">
                                <?= form_error('jumlah_beli','<small class="text-danger pl-3">','</small>'); ?>
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