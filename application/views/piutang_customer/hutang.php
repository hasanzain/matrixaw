<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Hutang Customer</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row">
                <div class="card col-lg-10">

                    <div class="card-body">
                        <form action="<?=base_url('hutang_customer')?>" method="post">
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan">
                                <?= form_error('nama_perusahaan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Nama pelanggan </label>
                                <input type="text" class="form-control" name="nama_pelanggan">
                                <?= form_error('nama_pelanggan','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="text" class="form-control" name="nominal">
                                <?= form_error('nominal','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Keterangan</label>
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