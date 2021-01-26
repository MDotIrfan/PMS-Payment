<?php 

// koneksi
$conn = new mysqli('localhost', 'root', '', 'pms');
$bln=null;
$thun=null;

if (isset($_POST['submit'])) {
 $bln = date($_POST['bulan']);
 $thun = date($_POST['tahun']);

 if (!empty($bln)&&!empty($thun)) {
  // perintah tampil data berdasarkan periode bulan
  $q = mysqli_query($conn, "SELECT * FROM pekerjaan WHERE MONTH(tgl_dibuat) = '$bln' and year(tgl_dibuat) = '$thun' and id_fl ='".$user['id']."'");
 } else {
  // perintah tampil semua data
  $q = mysqli_query($conn, "SELECT * FROM pekerjaan p where id_fl ='".$user['id']."'");
 }
} else {
 // perintah tampil semua data
 $q = mysqli_query($conn, "SELECT * FROM pekerjaan where id_fl ='".$user['id']."'");
}

// hitung jumlah baris data
$s = $q->num_rows;

?>
<div class="col">
            
            <h1>
                Laporan Pekerjaan
            </h1>
   <div class="card-body">
    <div class="row">
     <div class="col-md-4 pt-2">
      <span>Jumlah data: <b><?= $s ?></b></span>
     </div>
     <div class="col-md-8">
      <form method="POST" action="" class="form-inline">
       <label for="date1">Tampilkan transaksi bulan </label>
       <select class="form-control mr-2" name="bulan">
        <option value="">-</option>
        <option value="1" <?php if($bln=='01'){echo 'selected';}?>>Januari</option>
        <option value="2" <?php if($bln=='02'){echo 'selected';}?>>Februari</option>
        <option value="3" <?php if($bln=='03'){echo 'selected';}?>>Maret</option>
        <option value="4" <?php if($bln=='04'){echo 'selected';}?>>April</option>
        <option value="5" <?php if($bln=='05'){echo 'selected';}?>>Mei</option>
        <option value="6" <?php if($bln=='06'){echo 'selected';}?>>Juni</option>
        <option value="7" <?php if($bln=='07'){echo 'selected';}?>>Juli</option>
        <option value="8" <?php if($bln=='08'){echo 'selected';}?>>Agustus</option>
        <option value="9" <?php if($bln=='09'){echo 'selected';}?>>September</option>
        <option value="10" <?php if($bln=='10'){echo 'selected';}?>>Oktober</option>
        <option value="11" <?php if($bln=='11'){echo 'selected';}?>>November</option>
        <option value="12" <?php if($bln=='12'){echo 'selected';}?>>Desember</option>
       </select>
       tahun
       <select class="form-control mr-2" name="tahun">
                    <?php foreach($tahun as $tahun) : ?>
                        <option value=<?php echo $tahun['tahun']?>><?php echo $tahun['tahun']?></option>
                    <?php endforeach; ?>
        </select>
       <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
     </div>
    </div>

    <div class="mt-3" style="max-height: 340px; overflow-y: auto;">
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
    <a href="<?php echo site_url('fl/generatelaporan/'.$bln.'/'.$thun)?>"><button type="button" name="submit" class="btn btn-success">Cetak</button></a>
   </div>
   
</div>