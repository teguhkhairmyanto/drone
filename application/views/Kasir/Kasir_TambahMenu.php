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
        <style>
            .slidecontainer {
              width: relative;
            }

            .slider {
              -webkit-appearance: none;
              width: 90%;
              height: 15px;
              border-radius: 5px;
              background: #d3d3d3;
              outline: none;
              opacity: 0.7;
              -webkit-transition: .2s;
              transition: opacity .2s;
            }

            .slider:hover {
              opacity: 1;
            }

            .slider::-webkit-slider-thumb {
              -webkit-appearance: none;
              appearance: none;
              width: 25px;
              height: 25px;
              border-radius: 50%;
              background: #24c2cd;
              cursor: pointer;
            }

            .slider::-moz-range-thumb {
              width: 25px;
              height: 25px;
              border-radius: 50%;
              background: #4CAF50;
              cursor: pointer;
            }

            .btn-box-logo:hover {
            box-shadow: 0 0 20px rgba(33,33,33,.4); 
            }

             .btn-file {
           position: relative;
            overflow: hidden;
          }
          .btn-file input[type=file] {
              position: absolute;
              top: 0;
              right: 0;
              min-width: 100%;
              min-height: 100%;
              font-size: 100px;
              text-align: right;
              filter: alpha(opacity=0);
              opacity: 0;
              outline: none;   
              cursor: inherit;
              display: block;
          }

          img{
          max-width:400px;
          }

          input[type=file]{
          padding:10px;
          background:#2d2d2d;}


        </style>
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
        <h3>Form Menu</h3>
          <div class="row">
          <br>
          <br>
          <br>
          <form method="POST" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/Kasir/simpan_menu">
          <div class="control-group">
                            <label class="control-label" for="basicinput">Nama Menu</label>
                            <div class="controls">
                            <input type="text" name="NamaMenu" placeholder="" class="span8" style="width: 600px;" >
                            <span class="help-inline"></span>
                        </div>
                        </div>
                        <br>
          <div class="control-group">
                            <label class="control-label" for="basicinput">Harga</label>
                            <div class="controls">
                            Rp. <input type="text" name="HargaMenu" placeholder="" class="span8" style="width: 300px;" >
                            <span class="help-inline"></span>
                        </div>
          </div><br>
          <div class="control-group">
                        <label class="control-label" for="basicinput">Foto </label>
                        <div class="controls">
                        <img id="Logo_Preview" src="http://placehold.it/400?text=erporate resto" alt="your image" /><br>
                        <label>Preview</label>
                        <label>*Foto berformat .jpeg dengan ukuran maksimal 2 MB</label><br>
                         <span class="btn btn-primary btn-file"><i class="icon-folder-open"></i>  Pilih File<input  onchange="readURL(this);" name="userfile" type="file">
                        </span>
                        </div>
                        <br>
                         <div class="control-group">
                                <div class="controls">
                                <button type="reset" class="btn btn-danger"><i class="icon-trash"></i>&nbsp;&nbsp;Reset</button>
                                <button name="simpanmenu" type="submit" class="btn btn-primary"><i class="icon-save"></i>&nbsp;&nbsp;Simpan Menu</button>
                                </div>
          </div>
                        <br>
          </form>
          <br>
          </div>
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->
     <script type="text/javascript">
               function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Logo_Preview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>