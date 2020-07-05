<div class="col">
            
            <h1>
                Edit Data Project Manager
            </h1>
            <br>
           <?php echo form_open_multipart('admin/do_uploadpm2'); ?>
		<table>
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $p['id']?>"></td>
			</tr>
			<tr>
				<td>Nama Project Manager</td>
				<td><input type="text" name="nama" value="<?php echo $p['nama']?>"></td>
			</tr>
            <tr>
				<td>File Foto</td>
				<td> <input type="file" name="gambar"></td>
            </tr>
            <tr>
				<td>Email Project Manager</td>
				<td><input type="text" name="email_pm" value="<?php echo $p['email_pm']?>"></td>
            </tr>
            <tr>
				<td>Alamat</td>
				<td><textarea name="alamat"><?php echo $p['alamat']?></textarea></td>
            </tr>
            <tr>
				<td>Jenis Kelamin</td>
				<td><select name="jenis_kelamin">
                    <option value="P" <?php if ( $p['jenis_kelamin'] === 'P') { 
                            echo 'selected'; } ?>>Perempuan</option>
                    <option value="L" <?php if ( $p['jenis_kelamin'] === 'L') { 
                            echo 'selected'; } ?>>Laki-laki</option>
</select></td>
            </tr>
            <tr>
				<td>No. Telepon</td>
				<td><input type="text" name="no_telp_pm" value="<?php echo $p['no_telp_pm']?>"></td>
            </tr>
            <tr>
				<td>Fax Project Manager</td>
				<td><input type="text" name="fax_pm" value="<?php echo $p['fax_pm']?>"></td>
            </tr>
            <tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $user['username']?>"></td>
            </tr>
            <tr>
				<td>Password</td>
				<td><input type="text" name="password" value="<?php echo $user['password']?>"></td>
            </tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Edit Data"></td>
			</tr>
		</table>
        <?php echo form_close(); ?>
        </div>
