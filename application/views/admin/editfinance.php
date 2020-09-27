<div class="col">
            
            <h1>
                Edit Data Finance
            </h1>
            <br>
           <?php echo form_open_multipart('admin/do_uploadfinance2/'.$p['id']); ?>
		<table>
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $p['id']?>"></td>
			</tr>
			<tr>
				<td>Nama Finance</td>
				<td><input type="text" name="nama" value="<?php echo $p['nama']?>"><?php echo form_error('nama');?></td>
			</tr>
            <tr>
				<td>File Foto</td>
				<td> <input type="file" name="gambar"></td>
            </tr>
            <tr>
				<td>Email Finance</td>
				<td><input type="text" name="email_finance" value="<?php echo $p['email_finance']?>"><?php echo form_error('email_finance');?></td>
            </tr>
            <tr>
				<td>Alamat</td>
				<td><textarea name="alamat"><?php echo $p['alamat']?></textarea><?php echo form_error('alamat');?></td>
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
				<td>No. HP</td>
				<td><input type="text" name="no_hp" value="<?php echo $p['no_hp']?>"><?php echo form_error('no_hp');?></td>
            </tr>
            <tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $user['username']?>"><?php echo form_error('username');?></td>
            </tr>
            <tr>
				<td>Password</td>
				<td><input type="password" name="password" value="<?php echo $user['password']?>"><?php echo form_error('password');?></td>
            </tr>
			<tr>
				<td></td>
				<td><button type="button" class="btnmodal" data-toggle="modal" data-target="#exampleModal">
  Edit Data
</button></td>
			</tr>
                </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesan Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Ingin Mengubah Data Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" style="padding: 10px; margin-bottom: 6px;" value="Ubah Data">
      </div>
    </div>
  </div>
</div>
		</table>
        <?php echo form_close(); ?>
        </div>
