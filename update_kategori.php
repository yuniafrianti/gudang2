<?php 
      include 'koneksi.php';
      $kd_kategori=$_POST['kd_kategori'];
      $nama_kategori=$_POST['nama_kategori'];

      if(isset($_POST["simpan"])){
      $a="update tbl_kategori set nama_kategori='$nama_kategori' where kd_kategori='$kd_kategori'";
      var_dump($a);
      $query=mysqli_query($kon,$a);
        if($query) {
          echo ("<script LANGUAGE='JavaScript'>
           window.alert('Succesfully Updated');
            window.location.href='index.php?id=9.php';
            </script>");
    }else{
      echo ("<script LANGUAGE='JavaScript'>
           window.alert('Failed');
            window.location.href='index.php?id=9.php';
            </script>");

        }
        }
      
 ?>

 <?php 
include("koneksi.php");

  $id = $_GET['kd_kategori'];
  // var_dump($id);
  $data = mysqli_query($kon,"select * from tbl_kategori where kd_kategori='$id'");
  while($d = mysqli_fetch_array($data)){
  
  ?> 
    <div class="box box-primary">
     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="index.php?id=10.php">
                <div class="card-body">
                  <div class="form-group row">
   
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="kd_kategori" value="<?php echo $d['kd_kategori']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_kategori" value="<?php echo $d['nama_kategori']; ?>">
                    </div>
                  </div>
                      </div>
                <!-- /.card-body -->
                 <div class="box-footer">
                  <button type="submit" name="simpan" class="btn btn-info pull-right">Update</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  <br>
                </div>
                <!-- /.card-footer -->

                <?php

                }

                ?>
    
              </form>
            </div>
            </div>

                    