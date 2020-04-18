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
    <img class="pt-3 mx-auto d-block" src="<?php echo base_url(); ?>images/sslogostar.PNG">
    <br>
    <div class="container mr-5">
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm"></div>
            <div class="col-sm">
                <p class="mr-lg-5 font-weight-bold">
                    PT.STAR Software Indonesia <br>
                    CityLofts Sudirman, Unit 2109 <br>
                    Jalan K.H Mas Mansyur No.121 <br>
                    Jakarta 10220 <br>
                    INDONESIA
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm"></div>
            <div class="col-sm">
                <p class="mr-lg-5 font-weight-bold">
                    Tel : +62 21 2555-8856 <br>
                    Fax : +62 21 2555-8767  <br>
                    e-mail: sigit.wibisono@star-indonesia.co.id <br>
                    web : www.star-group.net
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Project Name: </p></div>
            <div class="col-sm"><p class="font-weight-bold"><?php echo $p['nama_pekerjaan'];?></p></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Date Issued: </p></div>
            <div class="col-sm"><?php echo $po['tgl'];?></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Vendor: </p></div>
            <div class="col-sm"><?php echo $fl['nama'];?></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Phone: </p></div>
            <div class="col-sm"><?php echo $fl['no_telp_fl'];?></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Mobile: </p></div>
            <div class="col-sm"><?php echo $fl['no_hp_fl'];?></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Contact: </p></div>
            <div class="col-sm"><?php echo $fl['email_fl'];?></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Project Details: </p></div>
            <div class="col-sm"><?php echo $p['detail'];?></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Project Manager: </p></div>
            <div class="col-sm"><?php echo $pm['nama'];?></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Telephone Number: </p></div>
            <div class="col-sm"><?php echo $pm['no_telp_pm'];?></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Fax: </p></div>
            <div class="col-sm"><?php echo $pm['fax_pm'];?></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Activity Being Purchase: </p></div>
            <div class="col-sm"><p class="font-weight-bold">(Currency:<?php echo $p['currency'];?>) </p></div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
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
                    <?php $totalw = ($p['wc_xtranslated'] * $p['w_xtranslated']) + ( $p['wc_repetition'] * $p['w_repetition']) + ($p['wc_fuzzy100'] * $p['w_fuzzy100']) 
                        + ($p['wc_fuzzy95'] * $p['w_fuzzy95']) + ($p['wc_fuzzy85'] * $p['w_fuzzy85']) 
                        + ($p['wc_fuzzy75'] * $p['w_fuzzy75']) + ($p['wc_fuzzy50'] * $p['w_fuzzy50']) + ($p['wc_nomatch'] * $p['w_nomatch']) / 100?>
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
                </tbody>
            </table>
            </div>
            <div class="col-sm"></div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Delivery By:</p></div>
            <div class="col-sm">Email</div>
            <div class="col-sm">Regards</div>
        </div>
        <div class="row">
            <div class="col-sm"><p class="font-weight-bold">Deadline</p></div>
            <div class="col-sm"><p class="font-weight-bold"><?php echo $p['deadline'];?></p></div>
            <div class="col-sm"><?php echo $pm['nama'];?></div>
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