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
				<td><input type="text" name="nama_pekerjaan"></td>
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
				<td><input type="submit" value="Tambah Data"></td>
			</tr>
		</table>
        <?php echo form_close(); ?>
        </div>
