<div class="col">
            
            <h1>
                Edit Data Freelance
            </h1>
            <br>
           <?php echo form_open_multipart('admin/do_uploadfl2'); ?>
		<table>
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $p['id']?>"></td>
			</tr>
			<tr>
				<td>Nama Freelance</td>
				<td><input type="text" name="nama" value="<?php echo $p['nama']?>"></td>
			</tr>
            <tr>
				<td>File Foto</td>
				<td> <input type="file" name="gambar"></td>
            </tr>
            <tr>
				<td>Email Freelance</td>
				<td><input type="text" name="email_fl" value="<?php echo $p['email_fl']?>"></td>
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
				<td><input type="text" name="no_telp_fl" value="<?php echo $p['no_telp_fl']?>"></td>
            </tr>
            <tr>
				<td>No. HP</td>
				<td><input type="text" name="no_hp_fl" value="<?php echo $p['no_hp_fl']?>"></td>
            </tr>
            <tr>
				<td>Rate</td>
				<td><input type="number" name="rate" value="<?php echo $p['rate']?>"></td>
            </tr>
            <tr>
				<td>Bank</td>
				<td><input type="text" name="bank" value="<?php echo $p['bank']?>"></td>
            </tr>
            <tr>
				<td>No. Akun</td>
				<td><input type="text" name="no_akun" value="<?php echo $p['no_akun']?>"></td>
            </tr>
            <tr>
				<td>Bahasa Awal</td>
				<td><input type="text" name="bahasa_awal" value="<?php echo $p['bahasa_awal']?>"></td>
            </tr>
            <tr>
				<td>bahasa Akhir</td>
				<td><input type="text" name="bahasa_akhir" value="<?php echo $p['bahasa_akhir']?>"></td>
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
