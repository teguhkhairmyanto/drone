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

        <h3>Daftar Menu</h3>
          <div class="row">
          <br>
          <a href="<?php echo base_url();?>index.php/Kasir/tambah_menu"><button class="btn btn-primary">Tambah Menu</button></a>
          <br>
          <br>
          <br>
          <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
            <thead>
                <th>IDMenu</th>
                <th>Nama Menu</th>
                <th>Harga Menu</th>
                <th>Gambar Menu</th>
                <th>Status</th>
            </thead>
            <tbody>
            <?php
            foreach ($daftarmenu as $daftarmenus){
            ?>
            <tr>
            <td><?php echo $daftarmenus->idmenu;?></td>
            <td><?php echo $daftarmenus->namamenu;?></td>
            <td>Rp. <?php echo number_format($daftarmenus->hargamenu);?></td>
            <td><img style="width: 330px;" src="<?php echo base_url();?>gambarmenu/<?php echo $daftarmenus->gambarmenu;?>"></td>
            <td><?php if ($daftarmenus->statusmenu=='1') {
              echo "<button class='btn btn-success' disabled>Ready</button>";
            }?></td>
            <?php } ?> 
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
    <script src="<?php echo base_url();?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>