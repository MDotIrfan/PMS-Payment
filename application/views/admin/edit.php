<div class="col">
            
            <h1>
                Edit Data Pekerjaan
            </h1>
            <br>
           <?php echo form_open_multipart('admin/do_upload2'); ?>
		<table>
			<tr>
				<td>ID</td>
				<td><input type="text" name="id_pekerjaan" value="<?php echo $p['id_pekerjaan']?>" disabled></td>
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
				<td>Word Count xtranslated</td>
				<td><input type="text" name="wc_xtranslated" value="<?php echo $p['wc_xtranslated']?>"></td>
            </tr>
            <tr>
				<td>Weight xtranslated</td>
				<td><input type="text" name="w_xtranslated" value="<?php echo $p['w_xtranslated']?>">%</td>
            </tr>
            <tr>
				<td>Word Count repetition</td>
				<td><input type="text" name="wc_repetition" value="<?php echo $p['wc_repetition']?>"></td>
            </tr>
            <tr>
				<td>Weight repetition</td>
				<td><input type="text" name="w_repetition" value="<?php echo $p['w_repetition']?>">%</td>
            </tr>
            <tr>
				<td>Word Count fuzzy 100%</td>
				<td><input type="text" name="wc_fuzzy100" value="<?php echo $p['wc_fuzzy100']?>"></td>
            </tr>
            <tr>
				<td>Weight fuzzy 100%</td>
				<td><input type="text" name="w_fuzzy100" value="<?php echo $p['w_fuzzy100']?>">%</td>
            </tr>
            <tr>
				<td>Word Count 95 - 99%</td>
				<td><input type="text" name="wc_fuzzy95" value="<?php echo $p['wc_fuzzy95']?>"></td>
            </tr>
            <tr>
				<td>weight 95 - 99%</td>
				<td><input type="text" name="w_fuzzy95" value="<?php echo $p['w_fuzzy95']?>">%</td>
            </tr>
            <tr>
				<td>Word Count 85 - 94%</td>
				<td><input type="text" name="wc_fuzzy85" value="<?php echo $p['wc_fuzzy85']?>"></td>
            </tr>
            <tr>
				<td>weight 85 - 94%</td>
				<td><input type="text" name="w_fuzzy85" value="<?php echo $p['w_fuzzy85']?>">%</td>
            </tr>
            <tr>
				<td>Word Count 75 - 84%</td>
				<td><input type="text" name="wc_fuzzy75" value="<?php echo $p['wc_fuzzy75']?>"></td>
            </tr>
            <tr>
				<td>weight 75 - 84%</td>
				<td><input type="text" name="w_fuzzy75" value="<?php echo $p['w_fuzzy75']?>">%</td>
            </tr>
            <tr>
				<td>Word Count 50 - 74%</td>
				<td><input type="text" name="wc_fuzzy50" value="<?php echo $p['wc_fuzzy50']?>"></td>
            </tr>
            <tr>
				<td>weight 50 - 74%</td>
				<td><input type="text" name="w_fuzzy50" value="<?php echo $p['w_fuzzy50']?>">%</td>
            </tr>
            <tr>
				<td>Word Count No Match</td>
				<td><input type="text" name="wc_nomatch" value="<?php echo $p['wc_nomatch']?>"></td>
            </tr>
            <tr>
				<td>weight No Match</td>
				<td><input type="text" name="w_nomatch" value="<?php echo $p['w_nomatch']?>">%</td>
            </tr>
            <tr>
				<td>Bahasa Asal</td>
				<td><select name="bahasa_asal">
                    <?php foreach($bawal as $b) : ?>
                        <option value=<?php echo $b['bahasa_awal']; ?> <?php if ( $p['bahasa_asal'] === $b['bahasa_awal'] ) { 
                            echo 'selected'; } ?>><?php echo $b['bahasa_awal']?></option>
                    <?php endforeach; ?>
</select></td>
            </tr>
            <tr>
				<td>Bahasa Akhir</td>
				<td><select name="bahasa_akhir">
                    <?php foreach($bakhir as $b) : ?>
                        <option value=<?php echo $b['bahasa_akhir']?> <?php if ( $p['bahasa_target'] === $b['bahasa_akhir'] ) { 
                            echo 'selected'; } ?>><?php echo $b['bahasa_akhir']?></option>
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
