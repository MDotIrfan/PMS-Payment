<div class="col">
            
            <h1>
                Edit Data Pekerjaan
            </h1>
            <br>
           <?php echo form_open_multipart('admin/do_upload2'); ?>
		<table>
			<tr>
				<td></td>
				<td><input type="hidden" name="id_pekerjaan" value="<?php echo $p['id_pekerjaan']?>"></td>
			</tr>
			<tr>
				<td>Nama Pekerjaan</td>
				<td><input type="text" name="nama_pekerjaan" value="<?php echo $p['nama_pekerjaan']?>"></td>
			</tr>
			<tr>
				<td>ID PM</td>
				<td><select name="id_pm">
                    <?php 
                    $sa = '';
                    foreach($pm as $pm) : 
                    ?>
                        <option value=<?php echo $pm['id'];?> <?php if ( $p['id_pm'] === $pm['id'] ) { 
                            echo 'selected'; } ?>><?php echo $pm['nama']?></option>
                    <?php endforeach; ?>
</select></td>
            </tr>
            <tr>
				<td>File Pekerjaan</td>
				<td> <input type="file" name="gambar" value="./uploads/<?php echo $p['file_asal']?>.pdf"></td>
            </tr>
            <tr>
				<td>Detail</td>
				<td><textarea name="detail" ><?php echo $p['detail']?></textarea></td>
            </tr>
            <tr>
				<td>ID FL</td>
				<td><select name="id_fl">
                    <?php foreach($fl as $fl) : ?>
                        <option value=<?php echo $fl['id']; ?> <?php if ( $p['id_fl'] === $fl['id'] ) { 
                            echo 'selected'; } ?>><?php echo $fl['nama']?></option>
                    <?php endforeach; ?>
</select></td>
            </tr>
            <tr>
				<td>Deadline:</td>
				<td><input type="date" name="deadline" value="<?php echo $p['deadline']?>"></td>
            </tr>
            <tr>
				<td>status</td>
				<td><select name="status">
                        <option value="Sedang Dikerjakan" ? <?php if ( $p['status'] === "Sedang Dikerjakan") { 
                            echo 'selected'; } ?>>Sedang Dikerjakan</option>
                        <option value="Menunggu PO" ? <?php if ( $p['status'] === "Menunggu PO") { 
                            echo 'selected'; } ?>>Menunggu PO</option>
                        <option value="Siap Invoice" ? <?php if ( $p['status'] === "Siap Invoice") { 
                            echo 'selected'; } ?>>Siap Invoice</option>
                        <option value="Sudah Invoice" ? <?php if ( $p['status'] === "Sudah Invoice") { 
                            echo 'selected'; } ?>>Sudah Invoice</option>
                        <option value="Selesai Pembayaran" ? <?php if ( $p['status'] === "Selesai Pembayaran") { 
                            echo 'selected'; } ?>>Selesai Pembayaran</option>
</select></td>
            </tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Ubah Data"></td>
			</tr>
		</table>
        <?php echo form_close(); ?>
        </div>
