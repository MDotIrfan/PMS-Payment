<div class="col">
<h1><?php echo $pekerjaan['nama_pekerjaan'] ?></h1>
<hr>
<p>
    Projek Manager  : <?php echo $pekerjaan['id_pm'] ?> <br>
    Total Kata      : <?php echo $pekerjaan['total_kata'] ?> <br>
    Status          : <?php echo $pekerjaan['status'] ?> <br>
    File Pekerjaan : <?php echo $pekerjaan['file_selesai'] ?> <br>
    Submit Pekerjaan : <br>
    <?php
        echo form_open_multipart('upload/do_upload');
        ?>
        <input type="hidden" name="id" value="<?php echo $pekerjaan['id_pekerjaan'] ?>">
        <input type="file" name="gambar">
        <button type="submit">Upload Gambar</button>
        <?php echo form_close(); ?>
</p>
</div>