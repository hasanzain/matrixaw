<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">User</h1>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card mb-4">
                        <?= $this->session->flashdata('message')?>

                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Toko</th>
                                    <th scope="col">#</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($user != null) {
                                    $i=1;
                                    foreach ($user->result_array() as $key) {
                                        ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $key['email'] ?></td>
                                    <td><?= $key['role'] ?></td>
                                    <td><?= $key['toko'] ?></td>
                                    <td>

                                        <a href="<?= base_url('delete_user?id=').$key['id'] ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>