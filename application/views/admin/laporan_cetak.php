<?php 

// koneksi
$conn = new mysqli('localhost', 'root', '', 'pms');

 if (!empty($bln)&&!empty($thun)) {
  // perintah tampil data berdasarkan periode bulan
  $q = mysqli_query($conn, "SELECT * FROM pekerjaan WHERE MONTH(tgl_dibuat) = '$bln' and year(tgl_dibuat) = '$thun'");
 } else {
  // perintah tampil semua data
  $q = mysqli_query($conn, "SELECT * FROM pekerjaan p");
 }

// hitung jumlah baris data
$s = $q->num_rows;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan pekerjaan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

	<center>

		<h2>LAPORAN PEKERJAAN TRANSLASI</h2>
		<h4>PT.STAR SOFTWARE INDONESIA</h4>

	</center>
	<table border="0">
		<tr>
			<td></td>
			<td>Bulan : <?php echo $bln."-".$thun; ?></td>
		</tr>
	</table>
	<div class="mt-3" style="overflow-y: auto;">
     <table class="table table-bordered">
      <tr>
       <th>#</th>
       <th>Nama Pekerjaan</th>
       <th>ID Pekerjaan</th>
       <th>Status</th>
       <th>Tgl. Dibuat</th>
      </tr>

	  <?php
      $no = 1;
      while ($r = $q->fetch_assoc()) {
      ?>

      <tr>
       <td><?= $no++ ?></td>
       <td><?= ucwords($r['nama_pekerjaan']) ?></td>
       <td><?= $r['id_pekerjaan'] ?></td>
       <td><?= $r['status'] ?></td>
       <td><?= date('d-M-Y', strtotime($r['tgl_dibuat'])) ?></td>
      </tr>
  
      <?php   
      }
      ?>

     </table>
    </div>

	<script>
		window.print();
	</script>

</body>
</html>