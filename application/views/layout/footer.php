<!-- Main content -->
<section class="content">

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
  <?php
  if ($this->session->flashdata('status') == "sukses") {
    //notif simpan buku
    echo 'Swal.fire("Alhamdulillah","Simpan data berhasil","success")';
  } elseif ($this->session->flashdata('status') == "gagal") {
    echo 'Swal.fire("Nooo","Simpan data Gagal","error")';
  }
  //notif update buku
  elseif ($this->session->flashdata('update') == "sukses") {
    echo 'Swal.fire("Alhamdulillah","Update data berhasil","success")';
  } elseif ($this->session->flashdata('update') == "gagal") {
    echo 'Swal.fire("Nooo","Update data Gagal","error")';
  }
  //notif delete buku
  elseif ($this->session->flashdata('delete') == "sukses") {
    echo 'Swal.fire("Sukses","Data Berhasil dihapus","error")';
  } elseif ($this->session->flashdata('delete') == "gagal") {
    echo 'Swal.fire("Nooo","Data Gagal dihapus","error")';
  }

  ?>
</script>
</body>

</html>