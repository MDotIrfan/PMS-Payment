        <!-- MAIN -->
        <div class="col">
            
            <h1>
                Siap Invoice
            </h1>
            <br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Task Name</th>
      <th scope="col">Total Kata</th>
      <th scope="col">PM</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pekerjaan as $p) : ?>
      <tr data-href="<?php echo site_url('fl/view/'.$p['id_pekerjaan'])?>">
        <th scope="row"><?php echo $p['id_pekerjaan']?></th>
        <td><?php echo $p['nama_pekerjaan']?></td>
        <td><?php echo $p['wc_xtranslated'] + $p['wc_repetition'] + $p['wc_fuzzy100'] + $p['wc_fuzzy95'] + $p['wc_fuzzy85'] + $p['wc_fuzzy75'] + $p['wc_fuzzy50'] + $p['wc_nomatch']?></td>
        <?php $fl = $this->db->get_where('freelance',['id' =>  $p['id_fl']])->row_array();
        ?>
        <td><?php echo $fl['nama']?></td>
        <td><?php echo $p['status']?></td>
        <td></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const rows = document.querySelectorAll("tr[data-href]");
    
    rows.forEach(row=>{
      row.addEventListener("click", () =>{
        window.location.href = row.dataset.href;
      });
    });
  });

</script>

        </div>
