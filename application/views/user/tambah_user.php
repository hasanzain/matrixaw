<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h3 class="mt-4">Tambah User</h3>
            <?= $this->session->flashdata('message')?>
            <div class="row">
                <div class="card col-lg-10">

                    <div class="card-body">
                        <form action="<?=base_url('tambah_user')?>" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email">
                                <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                                <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <select class="custom-select" id="inputGroupSelect04" name="role">
                                    <option name="user">User</option>
                                    <option name="admin">admin</option>
                                </select>
                                <?= form_error('role','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Toko</label>
                                <select class="custom-select" id="inputGroupSelect04" name="toko">
                                    <option name="surabaya">Surabaya</option>
                                    <option name="mojokerto">Mojokerto</option>
                                </select>
                                <?= form_error('toko','<small class="text-danger pl-3">','</small>'); ?>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Tambahkan">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>