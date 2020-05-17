<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css"> -->
</head>
<body>
<img src="./images/sslogostar.PNG">
    <table border="0" style="width: 100%">
        <tr>
            <td></td>
            <td></td>
            <td>
            PT.STAR Software Indonesia <br>
            CityLofts Sudirman, Unit 2109 <br>
            Jalan K.H Mas Mansyur No.121 <br>
            Jakarta 10220 <br>
            INDONESIA</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
            Tel : +62 21 2555-8856 <br>
            Fax : +62 21 2555-8767  <br>
            e-mail: sigit.wibisono@star-indonesia.co.id <br>
            web : www.star-group.net</td>
        </tr>
        <tr>
            <td>Project Name: </td>
            <td><?php echo $p['nama_pekerjaan'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Project Name: </td>
            <td><?php echo $p['nama_pekerjaan'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Date Issued: </td>
            <td><?php echo $po['tgl'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Vendor: </td>
            <td><?php echo $fl['nama'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Phone: </td>
            <td><?php echo $fl['no_telp_fl'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Mobile: </td>
            <td><?php echo $fl['no_hp_fl'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Contact: </td>
            <td><?php echo $fl['email_fl'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Project Details: </td>
            <td><?php echo $p['detail'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Project Manager: </td>
            <td><?php echo $pm['nama'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Telephone Number: </td>
            <td><?php echo $pm['no_telp_pm'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Fax: </td>
            <td><?php echo $pm['fax_pm'];?></td>
            <td></td>
        </tr>
        <tr>
            <td>Activity Being Purchase: </td>
            <td>(Currency:<?php echo $p['currency'];?>) </td>
            <td></td>
        </tr>
    </table>
            <table border="1" style="width: 100%">
                    <tr>
                        <th scope="col">Match</th>
                        <th scope="col">Word Count</th>
                        <th scope="col">Weighting</th>
                        <th scope="col">Weighted word count</th>
                    </tr>
                <tr>
                        <th>XTranslated</th>
                        <td><?php echo $p['wc_xtranslated'] ?></td>
                        <td><?php echo $p['w_xtranslated'], '%'?></td>
                        <td><?php echo $p['wc_xtranslated'] * $p['w_xtranslated'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Repetition</th>
                        <td><?php echo $p['wc_repetition'] ?></td>
                        <td><?php echo $p['w_repetition'], '%'?></td>
                        <td><?php echo $p['wc_repetition'] * $p['w_repetition'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 100%</th>
                        <td><?php echo $p['wc_fuzzy100'] ?></td>
                        <td><?php echo $p['w_fuzzy100'], '%'?></td>
                        <td><?php echo $p['wc_fuzzy100'] * $p['w_fuzzy100'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 95 - 99%</th>
                        <td><?php echo $p['wc_fuzzy95'] ?></td>
                        <td><?php echo $p['w_fuzzy95'], '%'?></td>
                        <td><?php echo $p['wc_fuzzy95'] * $p['w_fuzzy95'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 85 - 94%</th>
                        <td><?php echo $p['wc_fuzzy85'] ?></td>
                        <td><?php echo $p['w_fuzzy85'], '%'?></td>
                        <td><?php echo $p['wc_fuzzy85'] * $p['w_fuzzy85'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 75 - 84%</th>
                        <td><?php echo $p['wc_fuzzy75'] ?></td>
                        <td><?php echo $p['w_fuzzy75'], '%'?></td>
                        <td><?php echo $p['wc_fuzzy75'] * $p['w_fuzzy75'] / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 50 - 74%</th>
                        <td><?php echo $p['wc_fuzzy50'] ?></td>
                        <td><?php echo $p['w_fuzzy50'], '%'?></td>
                        <td><?php echo $p['wc_fuzzy50'] * $p['w_fuzzy50'] / 100?></td>
                    </tr>
                    <tr>
                        <th>No Match</th>
                        <td><?php echo $p['wc_nomatch'] ?></td>
                        <td><?php echo $p['w_nomatch'], '%'?></td>
                        <td><?php echo $p['wc_nomatch'] * $p['w_nomatch'] / 100?></td>
                    </tr>
                    <?php  $totalw = ($p['wc_xtranslated'] * $p['w_xtranslated']/ 100) + ( $p['wc_repetition'] * $p['w_repetition']/ 100) + ($p['wc_fuzzy100'] * $p['w_fuzzy100']/ 100) 
                        + ($p['wc_fuzzy95'] * $p['w_fuzzy95']/ 100) + ($p['wc_fuzzy85'] * $p['w_fuzzy85']/ 100) 
                        + ($p['wc_fuzzy75'] * $p['w_fuzzy75']/ 100) + ($p['wc_fuzzy50'] * $p['w_fuzzy50']/ 100) + ($p['wc_nomatch'] * $p['w_nomatch']/ 100);?>
                    <tr>
                        <th>Total</th>
                        <td><?php echo $p['wc_xtranslated'] + $p['wc_repetition'] + $p['wc_fuzzy100'] + $p['wc_fuzzy95'] + $p['wc_fuzzy85'] + $p['wc_fuzzy75'] + $p['wc_fuzzy50'] + $p['wc_nomatch']?></td>
                        <td></td>
                        <td><?php echo $totalw ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <th>Total</th>
                        <td><?php echo $totalw * $fl['rate'] ?></td>
                    </tr>
            </table>
        <table border="0" style="width: 100%">
        <tr>
            <td>Delivery By:</td>
            <td>Email</td>
            <td>Regards</td>
        </tr>
        <tr>
            <td>Deadline:</td>
            <td><?php echo $p['deadline'];?></td>
            <td><?php echo $pm['nama'];?></td>
        </tr>
        </table>
</body>
</html>