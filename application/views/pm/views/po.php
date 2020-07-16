<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
    .bold {
        font-weight: bold;
    }

    body {
        font-size: 11px;
    }
    .center{
        height: 75px;
        width: 200px;
    }
  </style>
</head>
<body>
<img src="./images/sslogostar.PNG" class="center">
    <table border="0" style="width: 100%">
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><p class="bold">
            PT.STAR Software Indonesia <br>
            CityLofts Sudirman, Unit 2109 <br>
            Jalan K.H Mas Mansyur No.121 <br>
            Jakarta 10220 <br>
            INDONESIA
            </p></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><div class="bold"> Tel : +62 21 2555-8856 <br>
            Fax : +62 21 2555-8767  <br>
            e-mail: sigit.wibisono@star-indonesia.co.id <br>
            web : www.star-group.net</div>
           </td>
        </tr>
        <tr>
            <td class="bold"><br>Project Name: </td>
            <td class="bold"><br><?php echo $p['nama_pekerjaan'];?></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold"><br>Date Issued: </td>
            <td><br><?php echo $po['tgl'];?></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold"><br>Vendor: </td>
            <td><br><?php echo $fl['nama'];?></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold"><br><br>Phone: </td>
            <td><br><br><?php echo $fl['no_telp_fl'];?></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">Mobile: </td>
            <td><?php echo $fl['no_hp_fl'];?></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">Contact: </td>
            <td><?php echo $fl['email_fl'];?></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">Project Details: </td>
            <td><?php echo $p['detail'];?></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">Project Manager: </td>
            <td><?php echo $pm['nama'];?></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">Telephone Number: </td>
            <td><?php echo $pm['no_telp_pm'];?></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">Fax: </td>
            <td><?php echo $pm['fax_pm'];?></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">Activity Being Purchase: </td>
            <td class="bold">(Currency:<?php echo $p['currency'];?>) </td>
            <td></td>
        </tr>
        <tr>
            <td class="bold"><br></td>
            <td class="bold"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><table border="1" style="width: 80%;">
                    <tr>
                        <th scope="col">Match</th>
                        <th scope="col">Word Count</th>
                        <th scope="col">Weighting</th>
                        <th scope="col">Weighted word count</th>
                    </tr>
                <tr>
                        <th>XTranslated</th>
                        <td><?php echo $p['wc_xtranslated'] ?></td>
                        <td><?php echo '0%'?></td>
                        <td><?php echo $p['wc_xtranslated'] * 0 / 100?></td>
                    </tr>
                    <tr>
                        <th>Repetition</th>
                        <td><?php echo $p['wc_repetition'] ?></td>
                        <td><?php echo '0%'?></td>
                        <td><?php echo $p['wc_repetition'] * 0 / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 100%</th>
                        <td><?php echo $p['wc_fuzzy100'] ?></td>
                        <td><?php echo '0%'?></td>
                        <td><?php echo $p['wc_fuzzy100'] * 0 / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 95 - 99%</th>
                        <td><?php echo $p['wc_fuzzy95'] ?></td>
                        <td><?php echo '30%'?></td>
                        <td><?php echo $p['wc_fuzzy95'] * 30 / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 85 - 94%</th>
                        <td><?php echo $p['wc_fuzzy85'] ?></td>
                        <td><?php echo '50%'?></td>
                        <td><?php echo $p['wc_fuzzy85'] * 70 / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 75 - 84%</th>
                        <td><?php echo $p['wc_fuzzy75'] ?></td>
                        <td><?php echo '70%'?></td>
                        <td><?php echo $p['wc_fuzzy75'] * 70 / 100?></td>
                    </tr>
                    <tr>
                        <th>Fuzzy 50 - 74%</th>
                        <td><?php echo $p['wc_fuzzy50'] ?></td>
                        <td><?php echo '100%'?></td>
                        <td><?php echo $p['wc_fuzzy50'] * 100 / 100?></td>
                    </tr>
                    <tr>
                        <th>No Match</th>
                        <td><?php echo $p['wc_nomatch'] ?></td>
                        <td><?php echo '100%'?></td>
                        <td><?php echo $p['wc_nomatch'] * 100 / 100?></td>
                    </tr>
                    <?php $totalw = 0;  
                    $totalw = ($p['wc_xtranslated'] * 0/ 100) + ( $p['wc_repetition'] * 0/ 100) + ($p['wc_fuzzy100'] * 0/ 100) 
                        + ($p['wc_fuzzy95'] * 30/ 100) + ($p['wc_fuzzy85'] * 50/ 100) 
                        + ($p['wc_fuzzy75'] * 70/ 100) + ($p['wc_fuzzy50'] * 100/ 100) + ($p['wc_nomatch'] * 100/ 100);?>
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
            </table></td>
        </tr>
        <tr>
            <td class="bold"><br><br><br></td>
            <td class="bold"></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold">Delivery By:</td>
            <td>Email</td>
            <td>Regards</td>
        </tr>
        <tr>
            <td class="bold"><br>Deadline:</td>
            <td class="bold"><br><?php echo $p['deadline'];?></td>
            <td> <br><?php echo $pm['nama'];?></td>
        </tr>
    </table>
</body>
</html>