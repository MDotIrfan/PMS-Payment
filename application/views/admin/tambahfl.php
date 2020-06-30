<div class="col">
            
            <h1>
                Tambah Data Freelance
            </h1>
            <br>
           <?php echo form_open_multipart('admin/do_uploadfl'); ?>
		<table>
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $nota?>"></td>
			</tr>
			<tr>
				<td>Nama Freelance</td>
				<td><input type="text" name="nama"></td>
			</tr>
            <tr>
				<td>File Foto</td>
				<td> <input type="file" name="gambar"></td>
            </tr>
            <tr>
				<td>Email Freelance</td>
				<td><input type="text" name="email_fl"></td>
            </tr>
            <tr>
				<td>Alamat</td>
				<td><textarea name="alamat"></textarea></td>
            </tr>
            <tr>
				<td>Jenis Kelamin</td>
				<td><select name="jenis_kelamin">
                    <option value="P">Perempuan</option>
                    <option value="L">Laki-laki</option>
</select></td>
            </tr>
            <tr>
				<td>No. Telepon</td>
				<td><input type="text" name="no_telp_fl"></td>
            </tr>
            <tr>
				<td>No. HP</td>
				<td><input type="text" name="no_hp_fl"></td>
            </tr>
            <tr>
				<td>Rate</td>
				<td><input type="number" name="rate"></td>
            </tr>
            <tr>
				<td>Bank</td>
				<td><input type="text" name="bank"></td>
            </tr>
            <tr>
				<td>No. Akun</td>
				<td><input type="text" name="no_akun"></td>
            </tr>
            <tr>
				<td>Bahasa Awal</td>
				<td><input type="text" name="bahasa_awal"></td>
            </tr>
            <tr>
				<td>bahasa Akhir</td>
				<td><input type="text" name="bahasa_akhir"></td>
            </tr>
            <tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
            </tr>
            <tr>
				<td>Password</td>
				<td><input type="text" name="password"></td>
            </tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah Data"></td>
			</tr>
		</table>
        <?php echo form_close(); ?>
        </div>
