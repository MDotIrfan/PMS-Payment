<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purchase Order</title>
    <style type="text/css">
    .bold {
        font-weight: bold;
    }
  </style>
  </head>
  <body>   
    <table border="0" style="width: 100%">
        <tr>
            <td></td>
            <td></td>
            <td><?php foreach ($fl as $fl) : echo $fl['nama'];?> <br>
                    Freelance translator <br>
                    (<?php echo $fl['bahasa_awal'];?> - <?php echo $fl['bahasa_akhir'];?>) <br>
                    <?php echo $fl['no_hp_fl'].",".$fl['no_telp_fl'];?> <br>
                    <?php echo $fl['email_fl']; endforeach;?></td>
        </tr>
        <tr>
            <td><br>Bill To : <br>
                   <?php 
                    foreach($pm as $pm) {
                        echo $pm['nama'].",";
                    }
                   ?><br></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><p>
            PT.STAR Software Indonesia <br>
            CityLofts Sudirman, Unit 2109 <br>
            Jalan K.H Mas Mansyur No.121 <br>
            Jakarta 10220 <br>
            INDONESIA
            </p></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td class="bold" style="text-decoration-line: underline">Invoice</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="font-style: italic"><?php echo $inv['id_invoice'];  $a = 1;
                      $total = 0; ?></td>
            <td></td>
        </tr>
        <tr>
            <td><br></td>
            <td style="font-style: italic"></td>
            <td></td>
        </tr>
    </table>
    <table border="1" style="width: 100%">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($i as $i) { 
                    ?>
                    <tr>
                        <th><?php echo $a;?></th>
                        <td><?php echo $i['nama_pekerjaan'];?></td>
                        <td><?php echo $i['total_bayar'];?></td>
                    </tr>
                    <?php 
                    $total = $total + $i['total_bayar'];
                    $a++;
                } ?>
                    <tr>
                        <td></td>
                        <th>Total</th>
                        <th><?php echo $total;?></th>
                    </tr>
                </tbody>
            </table>
            <tr>
            <td><br></td>
            <td style="font-style: italic"></td>
            <td></td>
        </tr>
            <table style="width: 100%">
                <tr>
                    <td><br>Please Send your payment to<br>
                    Name            : <?php echo $fl['nama'];?><br>
                    Bank            : <?php echo $i['bank'];?><br>
                    <br>account number  : <?php echo $i['no_akun'];?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="bold"><p>Thank you for your cooperation.</p><br></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><br>Yogyakarta, <?php echo $i['tgl'];?><br>
                    <br>
                    <?php echo $i['nama'];?></td>
                </tr>
            </table>
  </body>
</html>