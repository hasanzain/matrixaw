<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                    <?= $this->session->flashdata('message');
                 ?>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('auth') ?>" method="post">
                                        <div class="form-group"><label class="small mb-1"
                                                for="inputEmailAddress">Email</label><input class="form-control py-4"
                                                id="inputEmailAddress" type="text" placeholder="Enter email address"
                                                name="email" />
                                            <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <div class="form-group"><label class="small mb-1"
                                                for="inputPassword">Password</label><input class="form-control py-4"
                                                id="inputPassword" type="password" placeholder="Enter password"
                                                name="password" />
                                            <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                        </div>
                                        <div
                                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" type="submit" value="Login" />
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="register.html">Need an account? Contact Admin..!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?= base_url() ?>assetsjs/scripts.js"></script>
</body>

</html>