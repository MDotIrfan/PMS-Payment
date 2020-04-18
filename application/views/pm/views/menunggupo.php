        <!-- MAIN -->
        <div class="col">
            
            <h1>
                Daftar Pekerjaan
            </h1>
            <br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama Pekerjaan</th>
      <th scope="col">Total Kata</th>
      <th scope="col">FL</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pekerjaan as $p) : ?>
      <tr>
        <th scope="row"><?php echo $p['id_pekerjaan']?></th>
        <td><?php echo $p['nama_pekerjaan']?></td>
        <td><?php echo $p['wc_xtranslated'] + $p['wc_repetition'] + $p['wc_fuzzy100'] + $p['wc_fuzzy95'] + $p['wc_fuzzy85'] + $p['wc_fuzzy75'] + $p['wc_fuzzy50'] + $p['wc_nomatch']?></td>
        <?php $fl = $this->db->get_where('freelance',['id' =>  $p['id_fl']])->row_array();
        ?>
        <td><?php echo $fl['nama']?></td>
        <td><?php echo $p['status']?></td>
        <td><?php if($p['status']=='Menunggu PO'){?><a href="<?php echo site_url('pm/buatpo/'.$p['id_pekerjaan'])?>"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Buat Purchase Order
        </button></a><?php } ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

        </div>