<div class="col">
            
            <h1>
                Tambah Data Finance
            </h1>
            <br>
           <?php echo form_open_multipart('admin/do_uploadfinance'); ?>
		<table>
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $nota?>"></td>
			</tr>
			<tr>
				<td>Nama Finance</td>
				<td><input type="text" name="nama"></td>
			</tr>
            <tr>
				<td>File Foto</td>
				<td> <input type="file" name="gambar"></td>
            </tr>
            <tr>
				<td>Email Finance</td>
				<td><input type="text" name="email_finance"></td>
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
				<td>No. HP</td>
				<td><input type="text" name="no_hp"></td>
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
