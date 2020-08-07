<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar Supplier</h1>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card mb-4">
                        <?= $this->session->flashdata('message')?>

                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach ($supplier->result_array() as $key) {
                                        ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $key['nama_supplier'] ?></td>
                                    <td>
                                        <?php if ($this->session->userdata('role')=='admin') {
                                    ?>
                                        <a href="<?= base_url('delete_supplier?id=').$key['id'] ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>