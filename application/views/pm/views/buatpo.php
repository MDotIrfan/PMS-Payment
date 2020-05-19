<div class="col">
<h1><?php echo $pekerjaan['nama_pekerjaan'] ?></h1>
<hr>
<p>
    Dikerjakan Oleh  : <?php echo $fl['nama'] ?> <br>
    Bahasa Awal     : <?php echo $pekerjaan['bahasa_asal'] ?> <br>
    Bahasa Tujuan    : <?php echo $pekerjaan['bahasa_target'] ?> <br>
    Currency   : <?php echo $pekerjaan['currency'] ?> <br>
    Detail Pekerjaan : <br>
    <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Match</th>
                        <th scope="col">Word Count</th>
                        <th scope="col">Weighting</th>
                        <th scope="col">Weighted word count</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>XTranslated</th>
                        <td><?php echo $pekerjaan['wc_xtranslated'] ?></td>
                        <td><?php echo $pekerjaan['w_xtranslated'], '%'?></td>
                        <td><?php echo $pekerjaan['wc_xtranslated'] * $pekerjaan['w_xtranslated'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Repetition</th>
                        <td><?php echo $pekerjaan['wc_repetition'] ?></td>
                        <td><?php echo $pekerjaan['w_repetition'], '%'?></td>
                        <td><?php echo $pekerjaan['wc_repetition'] * $pekerjaan['w_repetition'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 100%</th>
                        <td><?php echo $pekerjaan['wc_fuzzy100'] ?></td>
                        <td><?php echo $pekerjaan['w_fuzzy100'], '%'?></td>
                        <td><?php echo $pekerjaan['wc_fuzzy100'] * $pekerjaan['w_fuzzy100'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 95 - 99%</th>
                        <td><?php echo $pekerjaan['wc_fuzzy95'] ?></td>
                        <td><?php echo $pekerjaan['w_fuzzy95'], '%'?></td>
                        <td><?php echo $pekerjaan['wc_fuzzy95'] * $pekerjaan['w_fuzzy95'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 85 - 94%</th>
                        <td><?php echo $pekerjaan['wc_fuzzy85'] ?></td>
                        <td><?php echo $pekerjaan['w_fuzzy85'], '%'?></td>
                        <td><?php echo $pekerjaan['wc_fuzzy85'] * $pekerjaan['w_fuzzy85'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 75 - 84%</th>
                        <td><?php echo $pekerjaan['wc_fuzzy75'] ?></td>
                        <td><?php echo $pekerjaan['w_fuzzy75'], '%'?></td>
                        <td><?php echo $pekerjaan['wc_fuzzy75'] * $pekerjaan['w_fuzzy75'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 50 - 74%</th>
                        <td><?php echo $pekerjaan['wc_fuzzy50'] ?></td>
                        <td><?php echo $pekerjaan['w_fuzzy50'], '%'?></td>
                        <td><?php echo $pekerjaan['wc_fuzzy50'] * $pekerjaan['w_fuzzy50'] / 100?></td>
                    </tr>
                    <tr>
                        <th>No Match</th>
                        <td><?php echo $pekerjaan['wc_nomatch'] ?></td>
                        <td><?php echo $pekerjaan['w_nomatch'], '%'?></td>
                        <td><?php echo $pekerjaan['wc_nomatch'] * $pekerjaan['w_nomatch'] / 100?></td>
                    </tr>
                    <?php $totalw = 0; 
                    $totalw = ($pekerjaan['wc_xtranslated'] * $pekerjaan['w_xtranslated']/ 100) + ( $pekerjaan['wc_repetition'] * $pekerjaan['w_repetition']/ 100) + ($pekerjaan['wc_fuzzy100'] * $pekerjaan['w_fuzzy100']/ 100) 
                        + ($pekerjaan['wc_fuzzy95'] * $pekerjaan['w_fuzzy95']/ 100) + ($pekerjaan['wc_fuzzy85'] * $pekerjaan['w_fuzzy85']/ 100) 
                        + ($pekerjaan['wc_fuzzy75'] * $pekerjaan['w_fuzzy75']/ 100) + ($pekerjaan['wc_fuzzy50'] * $pekerjaan['w_fuzzy50']/ 100) + ($pekerjaan['wc_nomatch'] * $pekerjaan['w_nomatch']/ 100); ?>
                    <tr>
                        <th>Total</th>
                        <td><?php echo $pekerjaan['wc_xtranslated'] + $pekerjaan['wc_repetition'] + $pekerjaan['wc_fuzzy100'] + $pekerjaan['wc_fuzzy95'] + $pekerjaan['wc_fuzzy85'] + $pekerjaan['wc_fuzzy75'] + $pekerjaan['wc_fuzzy50'] + $pekerjaan['wc_nomatch']?></td>
                        <td></td>
                        <td><?php echo $totalw ?></td>
                    </tr>
                </tbody>
            </table>
    Status          : <?php echo $pekerjaan['status'] ?> <br>
    File Pekerjaan Awal : <a href="<?php echo base_url(); ?>uploads/<?php echo $pekerjaan['file_asal'] ?>.pdf">Download</a> <br>
    File Pekerjaan Selesai : <a href="<?php echo base_url(); ?>uploads/<?php echo $pekerjaan['file_selesai'] ?>.pdf">Download</a> <br>
</p>
<?php echo form_open(base_url().'pm/inputpo'); ?>
  <input type="hidden" name="id_po" value="PO-<?php echo $pekerjaan['id_pekerjaan'] ?>">
  <input type="hidden" name="tgl" value="<?php $this->load->helper('date');

$format = "%Y-%m-%d";
echo @mdate($format); ?>">
  <input type="hidden" name="id_pekerjaan" value="<?php echo $pekerjaan['id_pekerjaan'] ?>">
  <input type="hidden" name="total_bayar" value="<?php echo $totalw * $fl['rate'] ?>">
  <input type="hidden" name="id_pm" value="<?php echo $pekerjaan['id_pm'] ?>">
  <input type="hidden" name="id_fl" value="<?php echo $pekerjaan['id_fl'] ?>">
  <input type="submit" name="submit" value="Buat Purchase Order">
  <?php echo form_close(); ?>
</div>