<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/shop-homepage.css" rel="stylesheet">

  </head>
  <body>
   <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h3 class="my-4"><?php echo $datapenggunausername; ?></h3>
          <div class="list-group">
            <button class="btn btn-primary" disabled><?php echo $datapenggunajenispengguna['namajenispengguna']; ?></button>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
        <br>
        <h3>Daftar Pesanan</h3>
          <div class="row">
          <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
            <thead>
                <th>IDPesanan</th>
                <th>Nomor Meja</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
            <?php
            foreach ($daftarpesananaktif as $daftarpesananaktifs){
              if ($daftarpesananaktifs->statuspesanan=='1'){
            ?>
            <tr>
            <td><?php echo $daftarpesananaktifs->idpesanan; ?></td>
            <td><?php echo $daftarpesananaktifs->nomormeja; ?></td>
            <td><button class="btn btn-success" disabled>aktif</button></td>
            <td><a href="<?php echo base_url();?>index.php/Kasir/nonaktifkan_pesanan/<?php echo $daftarpesananaktifs->idpesanan; ?>"><button class="btn btn-danger">Nonaktifkan Pesanan</button></a>
            <a href="<?php echo base_url();?>index.php/Kasir/lihat_pesanan/<?php echo $daftarpesananaktifs->idpesanan; ?>"><button class="btn btn-primary" >Lihat Pesanan</button></td>
            <?php }} ?>
            </tbody>
        </table>
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>