        <!-- MAIN -->
        <div class="col">
            
            <h1>
                List Pekerjaan
            </h1>
            <?= $this->session->flashdata('message');
            ?>
            <br>
            <a href="<?php echo site_url('admin/tambahdata/')?>"><button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
  Tambah Data
        </button></a>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Task Name</th>
      <th scope="col">Total Kata</th>
      <th scope="col">PM</th>
      <th scope="col">FL</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pekerjaan as $p) : ?>
      <tr data-href="<?php echo site_url('admin/view/'.$p['id_pekerjaan'])?>">
        <th scope="row" ><?php echo $p['id_pekerjaan']?></th>
        <td><?php echo $p['nama_pekerjaan']?></td>
        <td><?php echo $p['wc_xtranslated'] + $p['wc_repetition'] + $p['wc_fuzzy100'] + $p['wc_fuzzy95'] + $p['wc_fuzzy85'] + $p['wc_fuzzy75'] + $p['wc_fuzzy50'] + $p['wc_nomatch']?></td>
        <td><?php echo $p['id_pm']?></td>
        <td><?php echo $p['id_fl']?></td>
        <td><?php echo $p['status']?></td>
        <td><a href="<?php echo site_url('admin/ubahdata/'.$p['id_pekerjaan'])?>"><button type="button" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off">
        <i class="fa fa-edit"></i>
        </button></a><a href="<?php echo site_url('admin/hapusdata/'.$p['id_pekerjaan'])?>"><button type="button" class="btn btn-danger" data-toggle="button" aria-pressed="false" autocomplete="off">
        <i class="fa fa-trash"></i>
        </button></a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

        </div>

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
