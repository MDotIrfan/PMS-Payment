<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0003364c64.js" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Purchase Order</title>
  </head>
  <body>
    <br>
    <div class="container mr-5">
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <p class="mr-lg-5 font-weight-bold">
                    <?php echo $fl['nama'];?> <br>
                    Freelance translator <br>
                    (<?php echo $fl['bahasa_awal'];?> - <?php echo $fl['bahasa_akhir'];?>) <br>
                    <?php echo $fl['no_hp_fl'].",".$fl['no_telp_fl'];?> <br>
                    <?php echo $fl['email_fl'];?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <p class="ml-lg-5 font-weight-bold">
                    Bill To : <br>
                   <?php 
                    foreach($pm as $pm) {
                        echo $pm['nama'].",";
                    }
                   ?><br>
                </p>
            </div>
            <div class="col-sm"></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm">
                <p class="ml-lg-5 font-weight-bold">
                    PT.STAR Software Indonesia <br>
                    CityLofts Sudirman, Unit 2109 <br>
                    Jalan K.H Mas Mansyur No.121 <br>
                    Jakarta 10220 <br>
                    INDONESIA
                </p>
            </div>
            <div class="col-sm"><p class="font-weight-bold"></p></div>
            <div class="col-sm"></div>
        </div>
    </div>

    <p class="text-center font-weight-bold">Invoice<br>
    <span class="text-center"><?php echo $invoice['id_invoice'];?></span></p><br>
    <table class="table table-bordered m-5">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($p as $p) {
                      $a = 1;
                      $total = 0;  
                    ?>
                    <tr>
                        <th><?php echo $a;?></th>
                        <td><?php echo $p['nama_pekerjaan'];?></td>
                        <td><?php echo $po['total_bayar'];?></td>
                    </tr>
                    <?php 
                    $total = $total + $po['total_bayar'];
                    $a++;
                } ?>
                    <tr>
                        <td></td>
                        <th>Total</th>
                        <th><?php echo $total;?></th>
                    </tr>
                </tbody>
            </table>
    
    <div class="container mr-5">
        <div class="row">
            <div class="col-sm">
                <p class="mr-lg-5 font-weight-bold">
                    Please Send your payment to<br>
                    Name            : <?php echo $fl['nama'];?><br>
                    Bank            : <?php echo $fl['bank'];?><br>
                    account number  : <?php echo $fl['no_akun'];?>
                </p>
            </div>
            <div class="col-sm"></div>
        </div>
    </div>

    <br><p class="text-center font-weight-bold">Thank you for your cooperation.<br></p><br>

    <div class="container mr-5">
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <p class="mr-lg-5 font-weight-bold">
                    Yogyakarta, <?php echo $invoice['tgl'];?><br>
                    <br>
                    <?php echo $fl['nama'];?>
                </p>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>css/style.css" type=""></script>
  </body>
</html>