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
				<td><input type="text" name="nama" value="<?php echo set_value('nama')?>"><?php echo form_error('nama');?></td>
			</tr>
            <tr>
				<td>File Foto</td>
				<td> <input type="file" name="gambar"></td>
            </tr>
            <tr>
				<td>Email Freelance</td>
				<td><input type="text" name="email_fl" value="<?php echo set_value('email_fl')?>"><?php echo form_error('email_fl');?></td>
            </tr>
            <tr>
				<td>Alamat</td>
				<td><textarea name="alamat"></textarea><?php echo form_error('alamat');?></td>
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
				<td><input type="text" name="no_telp_fl" value="<?php echo set_value('no_telp_fl')?>"><?php echo form_error('no_telp_fl');?></td>
            </tr>
            <tr>
				<td>No. HP</td>
				<td><input type="text" name="no_hp_fl" value="<?php echo set_value('no_hp_fl')?>"><?php echo form_error('no_hp_fl');?></td>
            </tr>
            <tr>
				<td>Rate</td>
				<td><input type="number" name="rate"></td>
            </tr>
            <tr>
				<td>Bank</td>
				<td><input type="text" name="bank" value="<?php echo set_value('bank')?>"><?php echo form_error('bank');?></td>
            </tr>
            <tr>
				<td>No. Akun</td>
				<td><input type="text" name="no_akun" value="<?php echo set_value('no_akun')?>"><?php echo form_error('no_akun');?></td>
            </tr>
            <tr>
				<td>Bahasa Awal</td>
				<td><input type="text" name="bahasa_awal" value="<?php echo set_value('bahasa_awal')?>"><?php echo form_error('bahasa_awal');?></td>
            </tr>
            <tr>
				<td>bahasa Akhir</td>
				<td><input type="text" name="bahasa_akhir" value="<?php echo set_value('bahasa_akhir')?>"><?php echo form_error('bahasa_akhir');?></td>
            </tr>
            <tr>
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo set_value('username')?>"><?php echo form_error('username');?></td>
            </tr>
            <tr>
				<td>Password</td>
				<td><input type="password" name="password" value="<?php echo set_value('password')?>"><?php echo form_error('password');?></td>
            </tr>
			<tr>
				<td></td>
				<td><button type="button" class="btnmodal" data-toggle="modal" data-target="#exampleModal">
  TAMBAH Data
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
        Apakah Anda Yakin Ingin Menambah Data Ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" style="padding: 10px; margin-bottom: 6px;" value="Tambah Data">
      </div>
    </div>
  </div>
</div>
        <?php echo form_close(); ?>
        </div>
