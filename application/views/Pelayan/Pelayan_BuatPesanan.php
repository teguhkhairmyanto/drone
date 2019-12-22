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
        <h3>Form Pesanan</h3>
          <div class="row">
          <br>
          <br>
          <br>
          <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/Pelayan/simpan_pesanan">
          <div class="control-group">
                            <label class="control-label" for="basicinput">ID Pesanan</label>
                            <div class="controls">
                            <input value="<?php echo $iddiinputkan; ?>" type="text" name="IDPesanan" placeholder="" class="span8" style="width: 600px;" >
                            <span class="help-inline"></span>
                        </div>
                        </div>
                        <br>
          <div class="control-group">
                            <label class="control-label" for="basicinput">Nomor Meja</label>
                            <div class="controls">
                            <input type="text" name="NomorMeja" placeholder="" class="span8" style="width: 100px;" >
                            <span class="help-inline"></span>
                        </div>
                        </div>
                        <br>
                         <div class="control-group">
                                <div class="controls">
                                <button type="reset" class="btn btn-danger"><i class="icon-trash"></i>&nbsp;&nbsp;Reset</button>
                                <button name="simpanpesanan" type="submit" class="btn btn-primary"><i class="icon-save"></i>&nbsp;&nbsp;Simpan Data Pemesan</button>
                                </div>
          </div>
          <br>
          </form>
          <br>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>