<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $judul; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css">
</head>

<body>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          <h3 class="mb-5">Sign in</h3>
        <p>Masuk ke Dashboard</p>

        <?php if ($this->session->flashdata('message_login_error')) : ?>
            <div class="invalid-feedback">
                <?= $this->session->flashdata('message_login_error') ?>
            </div>
        <?php endif ?>

        <form class="form-outline mb-4" method="post" style="max-width: 600px;">
            <div class="form-outline mb-4">
                <label for="name" class="form-label float-left">Email/Username*</label>
                <input type="text" name="username" class="form-control form-control-lg <?= form_error('username') ? 'invalid' : '' ?>" placeholder="Your username or email" value="<?= set_value('username') ?>" required />
                <div class="invalid-feedback">
                    <?= form_error('username') ?>
                </div>
            </div>
            <div class="form-outline mb-4">
                <label for="password" class="form-label float-left">Password*</label>
                <input type="password" name="password" class="form-control form-control-lg <?= form_error('password') ? 'invalid' : '' ?>" placeholder="Enter your password" value="<?= set_value('password') ?>" required />
                <div class="invalid-feedback">
                    <?= form_error('password') ?>
                </div>
            </div>

            <div>
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login">
            </div>
        </form>
    </div>
</body>

</html>