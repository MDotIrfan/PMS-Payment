<div class="col">
<h1>Invoice : <?php foreach ($i as $i) : echo $i['id_invoice'];?></h1> <?php if($i['status']=="Sudah Invoice"){?><a href="<?php echo base_url('finance/konfirmasi/'.$i['id_invoice'])?>"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Lakukan Pembayaran
</button></a> <?php ;} ?>
        <?php   endforeach; ?>
<hr>
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
                   $j = 0;
                   $j_pm = count($pm); 
                    foreach($pm as $pm) {
                        if($j==0){
                            echo $pm['nama']; 
                        } else if ($j==$j_pm -1) {
                            echo " and ".$pm['nama'].".";
                        } else {
                            echo ", ".$pm['nama']; 
                        }
                        $j++;
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
            <td class="bold" style="text-decoration-line: underline; text-align: center">Invoice</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="font-style: italic; text-align: center"><?php echo $inv['id_invoice'];  $a = 1;
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
                    <?php $i = $this->db->query("SELECT * FROM invoice i JOIN po JOIN freelance f JOIN pm JOIN pekerjaan p WHERE i.id_po = po.id_po AND p.id_pekerjaan = po.id_pekerjaan AND f.id = po.id_fl AND pm.id = po.id_pm and i.id_invoice='".$i['id_invoice']."'")->result_array(); 
                    foreach($i as $i) { 
                    ?>
                    <tr>
                        <th><?php echo $a;?></th>
                        <td><a href="<?php echo base_url(); ?>uploads/<?php echo $i['id_po'] ?>.pdf"><?php echo $i['nama_pekerjaan'];?></a></td>
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
</div>