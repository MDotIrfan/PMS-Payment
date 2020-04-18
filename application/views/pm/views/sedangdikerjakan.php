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
      <tr data-href="<?php echo site_url('pm/view/'.$p['id_pekerjaan'])?>">
        <th scope="row"><?php echo $p['id_pekerjaan']?></th>
        <td><?php echo $p['nama_pekerjaan']?></td>
        <td><?php echo $p['total_kata']?></td>
        <td><?php echo $p['id_fl']?></td>
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
