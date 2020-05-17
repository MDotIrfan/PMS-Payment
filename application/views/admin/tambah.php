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
				<td>Word Count xtranslated</td>
				<td><input type="text" name="wc_xtranslated" value="0"></td>
            </tr>
            <tr>
				<td>Weight xtranslated</td>
				<td><input type="text" name="w_xtranslated" value="0">%</td>
            </tr>
            <tr>
				<td>Word Count repetition</td>
				<td><input type="text" name="wc_repetition" value="0"></td>
            </tr>
            <tr>
				<td>Weight repetition</td>
				<td><input type="text" name="w_repetition" value="0">%</td>
            </tr>
            <tr>
				<td>Word Count fuzzy 100%</td>
				<td><input type="text" name="wc_fuzzy100" value="0"></td>
            </tr>
            <tr>
				<td>Weight fuzzy 100%</td>
				<td><input type="text" name="w_fuzzy100" value="0">%</td>
            </tr>
            <tr>
				<td>Word Count 95 - 99%</td>
				<td><input type="text" name="wc_fuzzy95" value="0"></td>
            </tr>
            <tr>
				<td>weight 95 - 99%</td>
				<td><input type="text" name="w_fuzzy95" value="0">%</td>
            </tr>
            <tr>
				<td>Word Count 85 - 94%</td>
				<td><input type="text" name="wc_fuzzy85" value="0"></td>
            </tr>
            <tr>
				<td>weight 85 - 94%</td>
				<td><input type="text" name="w_fuzzy85" value="0">%</td>
            </tr>
            <tr>
				<td>Word Count 75 - 84%</td>
				<td><input type="text" name="wc_fuzzy75" value="0"></td>
            </tr>
            <tr>
				<td>weight 75 - 84%</td>
				<td><input type="text" name="w_fuzzy75" value="0">%</td>
            </tr>
            <tr>
				<td>Word Count 50 - 74%</td>
				<td><input type="text" name="wc_fuzzy50" value="0"></td>
            </tr>
            <tr>
				<td>weight 50 - 74%</td>
				<td><input type="text" name="w_fuzzy50" value="0">%</td>
            </tr>
            <tr>
				<td>Word Count No Match</td>
				<td><input type="text" name="wc_nomatch" value="0"></td>
            </tr>
            <tr>
				<td>weight No Match</td>
				<td><input type="text" name="w_nomatch" value="0">%</td>
            </tr>
            <tr>
				<td>Bahasa Asal</td>
				<td><select name="bahasa_asal">
                    <?php foreach($bawal as $b) : ?>
                        <option value=<?php echo $b['bahasa_awal']?>><?php echo $b['bahasa_awal']?></option>
                    <?php endforeach; ?>
</select></td>
            </tr>
            <tr>
				<td>Bahasa Akhir</td>
				<td><select name="bahasa_akhir">
                    <?php foreach($bakhir as $b) : ?>
                        <option value=<?php echo $b['bahasa_akhir']?>><?php echo $b['bahasa_akhir']?></option>
                    <?php endforeach; ?>
</select></td>
            </tr>
            <tr>
				<td>Currency</td>
				<td><select name="currency">
                        <option value="IDR"?>IDR</option>
                </select></td>
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
