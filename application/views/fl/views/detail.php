<div class="col">
<h1><?php echo $pekerjaan['nama_pekerjaan'] ?></h1>
<hr>
<p>
    Projek Manager  : <?php echo $pekerjaan['id_pm'] ?> <br>
    Total Kata      : <?php echo $pekerjaan['total_kata'] ?> <br>
    Status          : <?php echo $pekerjaan['status'] ?> <br>
    File Pekerjaan : <a href="<?php echo base_url(); ?>uploads/<?php echo $pekerjaan['file_asal'] ?>.pdf">Download</a> <br>
</p>
</div>