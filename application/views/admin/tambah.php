<div class="col">
            
            <h1>
                Tambah Data Pekerjaan
            </h1>
            <br>
           <?php echo form_open_multipart('admin/do_upload'); ?>
		<table>
			<tr>
				<td></td>
				<td><input type="hidden" name="id_pekerjaan" value="<?php echo $nota?>"></td>
			</tr>
			<tr>
				<td>Nama Pekerjaan</td>
				<td><input type="text" name="nama_pekerjaan" value="<?php echo set_value('nama_pekerjaan')?>"><?php echo form_error('nama_pekerjaan');?></td>
			</tr>
			<tr>
				<td>ID PM</td>
				<td><select name="id_pm">
                    <?php foreach($pm as $pm) : ?>
                        <option value=<?php echo $pm['id']?>><?php echo $pm['nama']?></option>
                    <?php endforeach; ?>
</select></td>
            </tr>
            <tr>
				<td>File Pekerjaan</td>
				<td> <input type="file" name="gambar"></td>
            </tr>
            <tr>
				<td>Detail</td>
				<td><textarea name="detail"></textarea></td>
            </tr>
            <tr>
				<td>ID FL</td>
				<td><select name="id_fl">
                    <?php foreach($fl as $fl) : ?>
                        <option value=<?php echo $fl['id']?>><?php echo $fl['nama']?></option>
                    <?php endforeach; ?>
</select></td>
            </tr>
            <tr>
				<td>Deadline:</td>
				<td><input type="date" name="deadline" value="<?php $this->load->helper('date');

$format = "%Y-%m-%d";
echo @mdate($format); ?>"></td>
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
