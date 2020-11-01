  <?php 
    include('koneksi.php');
  ?>
  <html>
  <head>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script>
              $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                  });
                });
              });
              </script>
              <style>
              table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
              }

            td, th {
              border: 1px solid #dddddd;
              text-align: left;
              padding: 8px;
            }

            tr:nth-child(even) {
              background-color: #FFFFFF;
            }
              </style>
              </head>
              <body>

              <h2></h2>
              <a href="cetak_barangmasuk.php"  target="_blank" class="btn btn-default pull-right">Print Pdf</a>
              <input id="myInput" type="text" placeholder="Search..">
              <br><br>
              <?php
                 $sqlSelect ="select log.kd_masuk, log.kd_barang, tbl_barang.nama_barang, log.brand_report, tbl_supplier.nama_supplier, tbl_kategori.nama_kategori,  stok_report, harga_report, tgl_report
                    from log inner join tbl_kategori on tbl_kategori.kd_kategori = log.kd_kategori
                    inner join tbl_supplier on tbl_supplier.kd_supplier = log.kd_supplier
                    inner join tbl_barang on tbl_barang.kd_barang = log.kd_barang";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                      
              ?>
              <table>
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Brand</th>
                  <th>Supplier</th>
                  <th>Category</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody id="myTable">
                  <?php
                    $no=1;
                      while ($row = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                   <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['nama_barang'];?></td>
                    <td><?php echo $row['brand_report'];?></td>
                    <td><?php echo $row['nama_supplier'];?></td>
                    <td><?php echo $row['nama_kategori'];?></td>
                    <td><?php echo $row['stok_report'];?></td>
                    <td><?php echo "Rp. ".number_format($row['harga_report'])."";?></td>
               <!--      var_dump($total); -->
                   

                    <td> <?php 
                    $a=$row['stok_report'];
                    $b=$row['harga_report'];
                    $c=$a*$b;
                    echo "Rp. ".number_format($c)."";

                    ?> </td>
                    <td><?php echo $row['tgl_report'];?></td>
                </tr>
                  <?php 
                  }
                } 
                  ?> 
                </tbody>
              </table>
              

              </body>
              </html>
