<div class="col">
<h1><?php echo $pekerjaan['nama_pekerjaan'] ?></h1>
<hr>
<p>
    Dikerjakan Oleh  : <?php echo $fl['nama'] ?> <br>
    Bahasa Awal     : <?php echo $fl['bahasa_awal'] ?> <br>
    Bahasa Tujuan    : <?php echo $fl['bahasa_akhir'] ?> <br>
    Currency   : <?php echo $pekerjaan['currency'] ?> <br>
    Detail Pekerjaan : <?php echo $pekerjaan['detail'] ?> <br>
    Status          : <?php echo $pekerjaan['status'] ?> <br>
    File Pekerjaan Awal : <a href="<?php echo base_url(); ?>uploads/<?php echo $pekerjaan['file_asal'] ?>">Download</a> <br>
    File Pekerjaan Selesai : <a href="<?php echo base_url(); ?>uploads/<?php echo $pekerjaan['file_selesai'] ?>">Download</a> <br>
</p>
<?php echo form_open(base_url().'pm/inputpo'); ?>
<table>
            <tr>
				<td>Word Count xtranslated</td>
				<td><input type="text" name="wc_xtranslated" value="0"></td>
            </tr>
            <tr>
				<td>Word Count repetition</td>
				<td><input type="text" name="wc_repetition" value="0"></td>
            </tr>
            <tr>
				<td>Word Count fuzzy 100%</td>
				<td><input type="text" name="wc_fuzzy100" value="0"></td>
            </tr>
            <tr>
				<td>Word Count 95 - 99%</td>
				<td><input type="text" name="wc_fuzzy95" value="0"></td>
            </tr>
            <tr>
				<td>Word Count 85 - 94%</td>
				<td><input type="text" name="wc_fuzzy85" value="0"></td>
            </tr>
            <tr>
				<td>Word Count 75 - 84%</td>
				<td><input type="text" name="wc_fuzzy75" value="0"></td>
            </tr>
            <tr>
				<td>Word Count 50 - 74%</td>
				<td><input type="text" name="wc_fuzzy50" value="0"></td>
            </tr>
            <tr>
				<td>Word Count No Match</td>
				<td><input type="text" name="wc_nomatch" value="0"></td>
            </tr>
		</table>
  <input type="hidden" name="id_po" value="PO-<?php echo $pekerjaan['id_pekerjaan'] ?>">
  <input type="hidden" name="tgl" value="<?php $this->load->helper('date');

$format = "%Y-%m-%d";
echo @mdate($format); ?>">
  <input type="hidden" name="id_pekerjaan" value="<?php echo $pekerjaan['id_pekerjaan'] ?>">
  <input type="hidden" name="id_pm" value="<?php echo $pekerjaan['id_pm'] ?>">
  <input type="hidden" name="id_fl" value="<?php echo $pekerjaan['id_fl'] ?>">
  <input type="submit" name="submit" value="Buat Purchase Order">
  <?php echo form_close(); ?>
</div>