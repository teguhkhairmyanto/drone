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
    <script src="<?php echo base_url();?>assets/js/jquery.PrintArea.js"></script>
    <script>
       function printDiv() {
        var divToPrint=document.getElementById('printarea');
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">'+printarea.innerHTML+'</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
        }
    </script>
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
        <button class="btn btn-primary" id="print" onclick='printDiv();'>Cetak</button>
        <br>
        <br>
        <div id="printarea">
          <div class="row">
          <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
            <thead>
                <th>IDPesanan</th>
                <th>Nomor Meja</th>
            </thead>
            <tbody>
            <?php
            foreach ($daftarpesananaktif as $daftarpesananaktifs){
            ?>
            <tr>
            <td><?php echo $daftarpesananaktifs->idpesanan; ?></td>
            <td><?php echo $daftarpesananaktifs->nomormeja; ?></td>
            <?php } ?>
            </tbody>
        </table>
          </div>
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