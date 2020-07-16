<div class="col">
<h1><?php echo $pekerjaan['nama_pekerjaan'] ?></h1>
<hr>
<p>
    Dikerjakan Oleh  : <?php echo $fl['nama'] ?> <br>
    Bahasa Awal     : <?php echo $fl['bahasa_awal'] ?> <br>
    Bahasa Tujuan    : <?php echo $fl['bahasa_akhir'] ?> <br>
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
                        <td><?php echo '0%'?></td>
                        <td><?php echo $pekerjaan['wc_xtranslated'] * 0 / 100?></td>
                    </tr>
                    <tr>
                        <th>Repetition</th>
                        <td><?php echo $pekerjaan['wc_repetition'] ?></td>
                        <td><?php echo '0%'?></td>
                        <td><?php echo $pekerjaan['wc_repetition'] * 0 / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 100%</th>
                        <td><?php echo $pekerjaan['wc_fuzzy100'] ?></td>
                        <td><?php echo '0%'?></td>
                        <td><?php echo $pekerjaan['wc_fuzzy100'] * 0 / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 95 - 99%</th>
                        <td><?php echo $pekerjaan['wc_fuzzy95'] ?></td>
                        <td><?php echo '30%'?></td>
                        <td><?php echo $pekerjaan['wc_fuzzy95'] * 30 / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 85 - 94%</th>
                        <td><?php echo $pekerjaan['wc_fuzzy85'] ?></td>
                        <td><?php echo '50%'?></td>
                        <td><?php echo $pekerjaan['wc_fuzzy85'] * 50 / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 75 - 84%</th>
                        <td><?php echo $pekerjaan['wc_fuzzy75'] ?></td>
                        <td><?php echo '70%'?></td>
                        <td><?php echo $pekerjaan['wc_fuzzy75'] * 70 / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 50 - 74%</th>
                        <td><?php echo $pekerjaan['wc_fuzzy50'] ?></td>
                        <td><?php echo '100%'?></td>
                        <td><?php echo $pekerjaan['wc_fuzzy50'] * 100 / 100?></td>
                    </tr>
                    <tr>
                        <th>No Match</th>
                        <td><?php echo $pekerjaan['wc_nomatch'] ?></td>
                        <td><?php echo '100%'?></td>
                        <td><?php echo $pekerjaan['wc_nomatch'] * 100 / 100?></td>
                    </tr>
                    <?php $totalw = ($pekerjaan['wc_xtranslated'] * 0/ 100) + ( $pekerjaan['wc_repetition'] * 0/ 100) + ($pekerjaan['wc_fuzzy100'] * 0/ 100) 
                        + ($pekerjaan['wc_fuzzy95'] * 30/ 100) + ($pekerjaan['wc_fuzzy85'] * 50/ 100) 
                        + ($pekerjaan['wc_fuzzy75'] * 70/ 100) + ($pekerjaan['wc_fuzzy50'] * 100/ 100) + ($pekerjaan['wc_nomatch'] * 100/ 100)?>
                    <tr>
                        <th>Total</th>
                        <td><?php echo $pekerjaan['wc_xtranslated'] + $pekerjaan['wc_repetition'] + $pekerjaan['wc_fuzzy100'] + $pekerjaan['wc_fuzzy95'] + $pekerjaan['wc_fuzzy85'] + $pekerjaan['wc_fuzzy75'] + $pekerjaan['wc_fuzzy50'] + $pekerjaan['wc_nomatch']?></td>
                        <td></td>
                        <td><?php echo $totalw ?></td>
                    </tr>
                </tbody>
            </table>
    Status          : <?php echo $pekerjaan['status'] ?> <br>
    File Pekerjaan Awal : <a href="<?php echo base_url(); ?>uploads/<?php echo $pekerjaan['file_asal'] ?>">Download</a> <br>
<?php if(!empty($pekerjaan['file_selesai'])){?> File Pekerjaan Selesai : <a href="<?php echo base_url(); ?>uploads/<?php echo $pekerjaan['file_selesai'] ?>">Download</a> <br> <?php } ?>
<?php if(!empty($po['id_po'])){?> Purchase Order : <a href="<?php echo base_url(); ?>uploads/<?php echo $po['id_po'] ?>.pdf">Download</a> <br> <?php } ?>
<?php if(!empty($i['id_invoice'])){?> Invoice : <a href="<?php echo base_url(); ?>uploads/<?php echo $i['id_invoice'] ?>.pdf">Download</a> <br> <?php } ?>
</p>
</div>